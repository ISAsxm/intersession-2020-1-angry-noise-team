<?php

namespace App\Services;

use App\Models\IndividualReport;
use App\Models\Project;
use App\Models\Report;
use PHPMD\RuleSetFactory;

class CodeParser
{
    private string $repositoryPath;

    public function doFullRun(Project $project): Report
    {
        set_time_limit(120);

        $this->repositoryPath = sprintf(
            '%s/app/Repositories/%s/',
            storage_path(),
            escapeshellcmd($project->getName()),
        );

        $phpLoc = $this->usePhpLoc();
        $phpCsFixer = $this->usePhpCsFixer(true);
        $phpMessDetector = $this->usePhpMessDetector((new RuleSetFactory())->listAvailableRuleSets());

        $this->deleteLocalRepository($this->repositoryPath);

        return new Report([$phpCsFixer, $phpMessDetector, $phpLoc]);
    }

    public function createNameFromRepoUrl(string $repoUrl): string
    {
        $repoNameWithGit = strrchr($repoUrl, '/');
        $lastDotPosition = strrpos($repoNameWithGit, '.');

        return trim(
            substr($repoNameWithGit, 0, $lastDotPosition ?: strlen($repoNameWithGit)),
            '/.'
        );
    }

    /**
     * @param string $url GitHub repository url
     * @param string $path Absolute path where the repository is store
     */
    public function cloneRepository(string $url, string $path): void
    {
        $cmd = sprintf('git -C %s clone %s',
            $path,
            escapeshellcmd($url),
        );
        exec($cmd, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \LogicException("Error while cloning repository. Error code: $returnValue");
        }
    }

    private function usePhpCsFixer(bool $withDryRun = false): IndividualReport
    {
        $command = sprintf('%s/vendor/bin/php-cs-fixer', base_path());
        $arguments = sprintf('fix %s -vv %s --using-cache=false --format=json',
            $this->repositoryPath,
            $withDryRun ? '--dry-run' : '',
        );

        $json = $this->doExec($command, $arguments);

        try {
            $individualReport = new IndividualReport($json, IndividualReport::PHP_CS_FIXER);
        } catch (\JsonException $e) {
            throw new \LogicException(sprintf('%s gave invalid JSON as output%s', IndividualReport::PHP_CS_FIXER, $e->getMessage()));
        }

        return $individualReport;
    }

    /**
     * @param string[] $ruleSets every RuleSets available can be fetched with PHPMD\RuleSetFactory::listAvailableRuleSets()
     */
    private function usePhpMessDetector(array $ruleSets): IndividualReport
    {
        $command = sprintf('%s/vendor/bin/phpmd', base_path());
        $arguments = sprintf('%s json %s',
            $this->repositoryPath,
            implode(',', $ruleSets),
        );

        $json = $this->doExec($command, $arguments);

        try {
            $individualReport = new IndividualReport($json, IndividualReport::PHP_MESS_DETECTOR);
        } catch (\JsonException $e) {
            throw new \LogicException(sprintf('%s gave invalid JSON as output%s', IndividualReport::PHP_MESS_DETECTOR, $e->getMessage()));
        }

        return $individualReport;
    }

    private function usePhpLoc(): IndividualReport
    {
        $command = sprintf('%s/phploc.phar', base_path());
        $arguments = sprintf('%s | grep -i "Lines of Code (LOC)" | grep -Po "[\d]+"',
            $this->repositoryPath,
        );

        $phplocOutput = $this->doExec($command, $arguments);
        $json = json_encode(['numberOfLines' => $phplocOutput], JSON_THROW_ON_ERROR);

        return new IndividualReport($json, IndividualReport::PHP_LOC);
    }

    private function doExec(string $command, string $arguments): string
    {
        if (PHP_OS_FAMILY === 'Windows' && file_exists($command . '.bat')) {
            $command .= '.bat';
        }

        exec(sprintf("%s %s", $command, $arguments), $output);

        return !empty($output) ? implode($output) : json_encode('No output');
    }

    private function deleteLocalRepository(string $repositoryPath)
    {
        if (is_dir($repositoryPath)) {
            $objects = scandir($repositoryPath);
            foreach ($objects as $object) {
                if ($object !== "." && $object !== "..") {
                    if (is_dir($repositoryPath . DIRECTORY_SEPARATOR . $object) && !is_link($repositoryPath . "/" . $object)) {
                        $this->deleteLocalRepository($repositoryPath . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($repositoryPath . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }
            rmdir($repositoryPath);
        }
    }
}
