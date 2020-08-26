<?php

namespace App\Services;

use App\Models\Project;

class CodeParser
{
    public function usePhpCsFixer(Project $project, $withDryRun = false): string
    {
        $command = sprintf('%s/vendor/bin/php-cs-fixer', base_path());
        $arguments = sprintf(' fix %s/app/Repositories/%s/ -vvv %s --using-cache=false --format=json',
            storage_path(),
            escapeshellcmd($project->getName()),
            $withDryRun ? '--dry-run' : '',
        );

        return $this->doExec($command, $arguments);
    }

    /**
     * @param string[] $ruleSets every RuleSets available can be fetched with PHPMD\RuleSetFactory::listAvailableRuleSets()
     */
    public function usePhpMessDetector(Project $project, array $ruleSets): string
    {
        $command = sprintf('%s/vendor/bin/phpmd', base_path(),);
        $arguments = sprintf(' %s/app/Repositories/%s/ json %s',
            storage_path(),
            escapeshellcmd($project->getName()),
            implode(',', $ruleSets),
        );

        return $this->doExec($command, $arguments);
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
