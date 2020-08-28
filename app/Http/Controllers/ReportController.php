<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Project;
use App\Services\CodeParser;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function test(CodeParser $codeParser): string
    {
        $project = new Project('ClairiereEtCanopee', 'https://github.com/Corenbla/ClairiereEtCanopee.git');

        return $codeParser->doFullRun($project);
    }

    public function mail(CodeParser $codeParser): string
    {
        $project = new Project('Exam-Wordpress', 'https://github.com/Corenbla/Exam-Wordpress.git');

        $report = $codeParser->doFullRun($project);
        Mail::to('foo@bar.test')->send(new ReportMail($report));

        return 'Mail sent.';
    }
}
