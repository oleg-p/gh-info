<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUserRepositories\Request;

use Yii;
use GhInfo\Infrastructure\Request;

class UserRepositories implements Request
{
    /**
     * @var string
     */
    private $userLogin;

    public function __construct(string $userLogin)
    {
        $this->userLogin = $userLogin;
    }

    public function method(): string
    {
        return 'GET';
    }

    public function url(): string
    {
        return "https://api.github.com/users/{$this->userLogin}/repos?per_page=10&sort=updated&direction=desc";
    }

    public function headers(): array
    {
        return [
            'Accept' => 'application/vnd.github.v3+json',
            'content-type' => 'application/json',
            'User-Agent' => 'gh-info',
            'Authorization' => 'Token ' . Yii::$app->params['github-token'],
        ];
    }
}