<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class CodeParser
{
    public function usePhpCsFixer(Project $project)
    {
        $projectDirectory = Storage::allFiles('Repositories/' . $project->getName());

        exec(sprintf('%s/vendor/bin/php-cs-fixer.bat fix %s/app/Repositories/%s/ -vvv --dry-run', base_path(), storage_path(), escapeshellcmd($project->getName())), $output);

        dd($output);
    }
}
