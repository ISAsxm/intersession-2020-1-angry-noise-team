<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Project;
use App\Services\CodeParser;
use Github\Client;
use GitWrapper\EventSubscriber\GitLoggerEventSubscriber;
use GitWrapper\GitWorkingCopy;
use GitWrapper\GitWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ReportController extends Controller
{
    public function getUserRepository(Request $request)
    {
        abort_unless($repoUrl = $request->input('repoUrl'), 400, 'Please provide a "repoUrl" key as a GET or POST request');
        $wrapper = new GitWrapper();
        $logger = new Logger('git');
        $logger->pushHandler(new StreamHandler('git.log', Logger::DEBUG));
        $wrapper->addLoggerEventSubscriber(new GitLoggerEventSubscriber($logger));
//        $cloneRepoUrl = str_replace('https','git',$repoUrl);
        $cloneRepoUrl = $repoUrl;
        $path = storage_path('app/Repositories/test');
        if(!is_dir($path)){
            mkdir($path);
        }
        $wrapper->setEnvVar('HOME', base_path());
        $wrapper->git('config --global user.name Angry-noise');
        $wrapper->git('config --global user.email mangata.tony@gmail.com');
        $gitWorkingCopy = new GitWorkingCopy($wrapper, $path);
        $gitWorkingCopy->config('user.name', 'Mangata');
        $gitWorkingCopy->config('user.email', 'mangata.tony@gmail.com');
        $git = $gitWorkingCopy->cloneRepository($cloneRepoUrl);


        return json_encode('ok');
    }

    public function test(CodeParser $codeParser, Request $request): string
    {
        abort_unless($repoUrl = $request->input('repoUrl'), 400, 'Please provide a "repoUrl" key as a GET or POST request');
        $project = new Project($repoUrl);
        $report = $codeParser->doFullRun($project);

        return 'report generated.';
    }

    public function isRepo()
    {
        //TODO check existed repository
        return true;
    }

    public function getUserRepositories(Request $request): string
    {
        abort_unless($user = $request->input('user'), 400, 'Please provide a "user" key as a GET or POST request');
        abort_unless($type = $request->input('type'), 400, 'Please provide a "type" key as a GET or POST request');
        $githubClient = new Client();
        $userRepos = $githubClient->api($type)->repositories($user);
        $userRepoList = [];
        foreach ($userRepos as $repo) {
            array_push($userRepoList, ['name' => $repo['name'], 'url' => $repo['clone_url']]);
        }

        return json_encode($userRepoList);
    }

    public function mail(CodeParser $codeParser, Request $request): string
    {
        $project = new Project('https://github.com/Mangata-Dev/projetSgbd');

        $report = $codeParser->doFullRun($project);
        Mail::to('foo@bar.test')->send(new ReportMail($report));

        return 'Mail sent.';
    }
}
