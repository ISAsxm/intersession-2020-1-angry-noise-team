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
        $files = $this->getPhpFiles($request);
        if ($files['total_count'] === 0) {
            return response('Le dépot que vous voulez analyser ne contient aucun fichier PHP', 400);
        }
        $path = storage_path('app\Repositories\\');
        $name = $codeParser->createNameFromRepoUrl($repoUrl);
        $dir = $path . $name;
        if (!is_dir($dir)) {
            $codeParser->cloneRepository($repoUrl, $path);
        }

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

    private function getPhpFiles(Request $request): array
    {
        abort_unless($repoUrl = $request->input('repoUrl'), 400, 'Please provide a "repoUrl" key as a GET or POST request');
        $githubClient = new Client();
        $repo = $this->getUserRepoSlashName($repoUrl);

        return $githubClient->search()->code("repo:$repo extension:php");
    }

    private function getUserRepoSlashName($repoUrl): string
    {

        return str_replace('.git', '', str_replace('https://github.com/', '', $repoUrl));
    }
}
