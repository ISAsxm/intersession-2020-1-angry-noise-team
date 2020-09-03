<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Project;
use App\Services\CodeParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function parse(CodeParser $codeParser, Request $request): string
    {
        $project = $this->getProjectFromRequest($request, $codeParser);

        $report = $codeParser->doFullRun($project);

        return json_encode($report->getReportData(), JSON_THROW_ON_ERROR);
    }

    public function mail(Request $request): string
    {
        $request->validate([
            'reportData' => ['required', 'json'],
            'mail' => ['required', 'email'],
        ]);

        $reportDataJson = $request->input('reportData');
        $userEmail = $request->input('mail');

        $reportData = json_decode($reportDataJson, true, 512, JSON_THROW_ON_ERROR);

        Mail::to($userEmail)->send(new ReportMail($reportData));

        return response(null, 204);
    }

    public function mailTest(Request $request, CodeParser $codeParser): string
    {
        $project = $this->getProjectFromRequest($request);
        $report = $codeParser->doFullRun($project);

        Mail::to('foo@example.com')->send(new ReportMail($report->getReportData()));

        return 'Test mail sent.';
    }

    private function getProjectFromRequest(Request $request, CodeParser $codeParser): Project
    {
        $request->validate([
            'repoUrl' => ['required', 'url'],
        ]);

        $repoUrl = $request->input('repoUrl');

        return new Project($repoUrl);
    }
}
