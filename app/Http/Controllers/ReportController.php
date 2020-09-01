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
        $project = $this->getProjectFromRequest($request);

        $report = $codeParser->doFullRun($project);

        return json_encode($report->getReportData(), JSON_THROW_ON_ERROR);
    }

    public function mail(Request $request): string
    {
        abort_unless(
            $reportDataJson = $request->input('reportData'),
            400,
            'Please provide a "reportData" key as a GET or POST request',
        );

        abort_unless(
            $userEmail = $request->input('mail'),
            400,
            'Please provide a "mail" key as a GET or POST request'
        );

        $reportData = json_decode($reportDataJson, true, 512, JSON_THROW_ON_ERROR);

        Mail::to($userEmail)->send(new ReportMail($reportData));

        return 'Mail sent.';
    }

    private function getProjectFromRequest(Request $request): Project
    {
        abort_unless(
            $repoUrl = $request->input('repoUrl'),
            400,
            'Please provide a "repoUrl" key as a GET or POST request',
        );

        return new Project($repoUrl);
    }
}
