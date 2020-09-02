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
        $phpLoc = $this->usePhpLoc($project);
        $phpCsFixer = $this->usePhpCsFixer($project, true);
        $phpMessDetector = $this->usePhpMessDetector($project, (new RuleSetFactory())->listAvailableRuleSets());

        return new Report([$phpCsFixer, $phpMessDetector, $phpLoc]);
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
            throw new \LogicException(sprintf("%s gave invalid JSON as output%s", IndividualReport::PHP_CS_FIXER, $e->getMessage()));
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
            throw new \LogicException(sprintf("%s gave invalid JSON as output%s", IndividualReport::PHP_MESS_DETECTOR, $e->getMessage()));
        }

        return $individualReport;
    }

    public function usePhpLoc(Project $project): IndividualReport
    {
        $command = sprintf('%s/phploc.phar', base_path());
        $arguments = sprintf(' %s/app/Repositories/%s/ | grep -i "Lines of Code (LOC)" | grep -Po "[\d]+"',
            storage_path(),
            escapeshellcmd($project->getName()),
        );

        $json = json_encode([
            'numberOfLines' => $this->doExec($command, $arguments),
        ], JSON_THROW_ON_ERROR);

        try {
            $individualReport = new IndividualReport($json, IndividualReport::PHP_LOC);
        } catch (\JsonException $e) {
            throw new \LogicException(sprintf("%s gave invalid JSON as output%s", IndividualReport::PHP_MESS_DETECTOR, $e->getMessage()));
        }

        return $individualReport;
    }

    private function doExec(string $command, string $arguments): string
    {
        if (PHP_OS_FAMILY === 'Windows' && file_exists($command . '.bat')) {
            $command .= '.bat';
        }

        exec($command . $arguments, $output);

        return !empty($output) ? implode($output) : json_encode('No output');
    }
}
