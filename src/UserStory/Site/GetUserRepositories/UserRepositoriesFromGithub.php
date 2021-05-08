<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUserRepositories;

use GhInfo\Infrastructure\Result;
use GhInfo\Infrastructure\Result\Failed;
use GhInfo\Infrastructure\Result\Successful;
use GhInfo\Infrastructure\Transport;
use GhInfo\UserStory\Site\GetUserRepositories\Request\UserRepositories;
use yii\helpers\Json;

class UserRepositoriesFromGithub
{
    /**
     * @var string
     */
    private $userLogin;

    /**
     * @var Transport
     */
    private $transport;

    public function __construct(string $userLogin, Transport $transport)
    {
        $this->userLogin = $userLogin;
        $this->transport = $transport;
    }

    public function result(): Result
    {
        $result = $this->transport->response(new UserRepositories($this->userLogin));

        if (!$result->isSuccessful()) {
            return new Failed($result->error());
        }

        return new Successful(Json::decode($result->value()[0]));
    }
}