<?php

namespace App\Http\Controllers;

use App\Services\CodeParser;
use Github\Client;
use Illuminate\Http\Request;

class GitController extends Controller
{
    /**
     * Clone the repository.
     *
     * @return int
     */
    public function cloneRepository(Request $request, CodeParser $codeParser)
    {
        abort_unless($repoUrl = $request->input('repoUrl'), 400, 'Please provide a "repoUrl" key as a GET or POST request');

        $path = storage_path('app\Repositories\\');
        $codeParser->cloneRepository($repoUrl, $path);
        return response(null, 200);
    }

    /**
     * Return list of repo name and clone url.
     */
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
}