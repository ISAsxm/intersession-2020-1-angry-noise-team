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
        $request->validate([
            'repoUrl' => ['required', 'url'],
        ]);
        $repoUrl = $request->input('repoUrl');

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
        $request->validate([
            'user' => ['required', 'string'],
            'type' => ['required', 'string'],
        ]);
        $user = $request->input('user');
        $type = $request->input('type');
        $githubClient = new Client();
        $userRepos = $githubClient->api($type)->repositories($user);
        $userRepoList = [];
        foreach ($userRepos as $repo) {
            array_push($userRepoList, ['name' => $repo['name'], 'url' => $repo['clone_url']]);
        }

        return json_encode($userRepoList);
    }

    /**
     * Get repository php files.
     */
    private function getPhpFiles(Request $request): array
    {
        $request->validate([
            'repoUrl' => ['required', 'url'],
        ]);
        $repoUrl = $request->input('repoUrl');
        $githubClient = new Client();
        $repo = $this->getUserRepoSlashName($repoUrl);

        return $githubClient->search()->code("repo:$repo extension:php");
    }

    /**
     * Get user repo name like user/repoName.
     */
    private function getUserRepoSlashName(string $repoUrl): string
    {
        return preg_replace('/(.*\/\/)(.*?\/)([^\.\s]*)(.*)/', '$3', $repoUrl);
    }
}
