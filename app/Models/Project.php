<?php

namespace App\Models;

use App\Services\CodeParser;

class Project
{
    private string $name;

    private string $gitHubRepository;

    public function __construct(string $gitHubRepository, $name)
    {
        $this->name = $name;
        $this->gitHubRepository = $gitHubRepository;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Project
    {
        $this->name = $name;

        return $this;
    }

    public function getGitHubRepository(): string
    {
        return $this->gitHubRepository;
    }

    public function setGitHubRepository(string $gitHubRepository): Project
    {
        $this->gitHubRepository = $gitHubRepository;

        return $this;
    }

}
