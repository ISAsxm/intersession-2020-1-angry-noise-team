<?php

namespace App\Models;


class Project
{
    private string $name;

    private string $repoUrl;

    public function __construct(string $repoUrl, string $name)
    {
        $this->name = $name;
        $this->repoUrl = $repoUrl;
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

    public function getRepoUrl(): string
    {
        return $this->repoUrl;
    }

    public function setRepoUrl(string $repoUrl): Project
    {
        $this->repoUrl = $repoUrl;

        return $this;
    }

}
