<?php

namespace App\Services;

use App\Models\Project;

class CodeParser
{
    public function usePhpCsFixer(Project $project, $withDryRun = false): string
    {
        $command = sprintf('%s/vendor/bin/php-cs-fixer', base_path(), );
        $arguments = sprintf(' fix %s/app/Repositories/%s/ -vvv %s --using-cache=false --format=json',
            storage_path(),
            escapeshellcmd($project->getName()),
            $withDryRun ? '--dry-run' : '',
        );

        return $this->doExec($command, $arguments);
    }

    private function doExec(string $command, string $arguments): string
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $command .= '.bat';
        }


        exec($command . $arguments, $output);

        return $output[0];
    }
}
