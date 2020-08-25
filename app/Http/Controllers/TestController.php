<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\CodeParser;

class TestController extends Controller
{
    public function test(CodeParser $codeParser)
    {
        $project = new Project('ClairiereEtCanopee', 'https://github.com/Corenbla/ClairiereEtCanopee.git');

        return $codeParser->usePhpCsFixer($project);
    }
}
