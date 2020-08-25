<?php

namespace App\Services;

use App\Models\Project;

class CodeParser
{
    public function usePhpCsFixer(Project $project, $withDryRun = false)
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $executable = 'php-cs-fixer.bat';
        } else {
            $executable = 'php-cs-fixer';
        }

        $sprintf = sprintf(
            '%s/vendor/bin/%s fix %s/app/Repositories/%s/ -vvv %s --using-cache=false --format=json',
            base_path(),
            $executable,
            storage_path(),
            escapeshellcmd($project->getName()),
            $withDryRun ? '--dry-run' : ''
        );
        exec($sprintf, $output);

        return $output[0];
    }
}
