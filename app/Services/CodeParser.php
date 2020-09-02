<?php

namespace App\Services;

use App\Models\IndividualReport;
use App\Models\Project;
use App\Models\Report;
use PHPMD\RuleSetFactory;

class CodeParser
{
    public function doFullRun(Project $project): Report
    {
        $phpCsFixer = $this->usePhpCsFixer($project, true);
        $phpMessDetector = $this->usePhpMessDetector($project, (new RuleSetFactory())->listAvailableRuleSets());

        return new Report([$phpCsFixer, $phpMessDetector]);
    }

    public function usePhpCsFixer(Project $project, $withDryRun = false): IndividualReport
    {
        $command = sprintf('%s/vendor/bin/php-cs-fixer', base_path());
        $arguments = sprintf(' fix %s/app/Repositories/%s/ -vv %s --using-cache=false --format=json',
            storage_path(),
            escapeshellcmd($project->getName()),
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
    public function usePhpMessDetector(Project $project, array $ruleSets): IndividualReport
    {
        $command = sprintf('%s/vendor/bin/phpmd', base_path());
        $arguments = sprintf(' %s/app/Repositories/%s/ json %s',
            storage_path(),
            escapeshellcmd($project->getName()),
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

    public function cloneRepository($url, $path)
    {
        $cmd = sprintf('git -C %s clone %s', $path, escapeshellcmd($url));
        exec($cmd, $output, $return_value);
        return  $return_value === 0 ;
    }

    private function doExec(string $command, string $arguments): string
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $command .= '.bat';
        }

        exec($command . $arguments, $output);

        return !empty($output) ? implode($output) : json_encode('No output');
    }

}
