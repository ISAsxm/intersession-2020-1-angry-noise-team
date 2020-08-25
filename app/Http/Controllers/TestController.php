<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\CodeParser;
use PHPMD\RuleSetFactory;

class TestController extends Controller
{
    public function test(CodeParser $codeParser): string
    {
        $ruleSetFactory = new RuleSetFactory();
        $project = new Project('ClairiereEtCanopee', 'https://github.com/Corenbla/ClairiereEtCanopee.git');

        return $codeParser->usePhpMessDetector($project, $ruleSetFactory->listAvailableRuleSets());
    }
}
