<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Project;
use App\Services\CodeParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function test(CodeParser $codeParser, Request $request): string
    {
        abort_unless($repoUrl = $request->input('repoUrl'), 400, 'Please provide a "repoUrl" key as a GET or POST request');
        $project = new Project($repoUrl);
        $report = $codeParser->doFullRun($project);

        return 'report generated.';
    }

    public function mail(CodeParser $codeParser, Request $request): string
    {
        $project = new Project('https://github.com/Mangata-Dev/projetSgbd');

        $report = $codeParser->doFullRun($project);
        Mail::to('foo@bar.test')->send(new ReportMail($report));

        return 'Mail sent.';
    }
}
