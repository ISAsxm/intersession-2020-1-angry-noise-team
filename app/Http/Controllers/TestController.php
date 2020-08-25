<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\CodeParser;
use App\Services\PhpCsFixer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(CodeParser $codeParser)
    {
        $project = new Project('ClairiereEtCanopee', 'https://github.com/Corenbla/ClairiereEtCanopee.git');

        $codeParser->usePhpCsFixer($project);
    }
}
