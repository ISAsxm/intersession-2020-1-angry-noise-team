<?php

namespace App\Services;

use App\Models\Project;

class CodeParser
{
    public function usePhpCsFixer(Project $project)
    {
        if (PHP_OS_FAMILY === 'Windows') {
            $executable = 'php-cs-fixer.bat';
        } else {
            $executable = 'php-cs-fixer';
        }

        $sprintf = sprintf(
            '%s/vendor/bin/%s fix %s/app/Repositories/%s/ -vvv --dry-run --using-cache=false --format=json',
            base_path(),
            $executable,
            storage_path(),
            escapeshellcmd($project->getName())
        );
        exec($sprintf, $output);

        return $output[0];
    }
}
