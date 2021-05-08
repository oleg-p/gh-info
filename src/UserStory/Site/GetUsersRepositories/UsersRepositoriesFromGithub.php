<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

use GhInfo\Infrastructure\Transport;
use GhInfo\UserStory\Site\GetUserRepositories\UserRepositoriesFromGithub;

class UsersRepositoriesFromGithub implements ArrayAvailable
{
    /**
     * @var ListUsersLogin
     */
    private $listLogins;

    /**
     * @var Transport
     */
    private $transport;

    public function __construct(ListUsersLogin $listLogins, Transport $transport)
    {
        $this->listLogins = $listLogins;
        $this->transport = $transport;
    }

    public function value(): array
    {
        $repositories = [];

        foreach ($this->listLogins->value() as $login) {
            $userRepositoriesResult = (new UserRepositoriesFromGithub(
                $login,
                $this->transport
            ))
                ->result();

            if ($userRepositoriesResult->isSuccessful()) {
                $repositories = array_merge($repositories, $userRepositoriesResult->value());
            }
        }

        return $repositories;
    }
}