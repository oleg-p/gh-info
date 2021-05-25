<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

use GhInfo\Infrastructure\Result;
use GhInfo\Infrastructure\Transport;
use GhInfo\UserStory\Site\GetUserRepositories\UserRepositoriesFromGithub;
use yii\caching\CacheInterface;

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

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var int
     */
    private $cacheDuration;

    public function __construct(
        ListUsersLogin $listLogins,
        Transport $transport,
        CacheInterface $cache,
        int $cacheDuration
    ) {
        $this->listLogins = $listLogins;
        $this->transport = $transport;
        $this->cache = $cache;
        $this->cacheDuration = $cacheDuration;
    }

    public function value(): array
    {
        $repositories = [];

        foreach ($this->listLogins->value() as $login) {
            $userRepositoriesResult = $this->cache->get($this->keyForCache($login));

            if ($userRepositoriesResult === false) {
                $userRepositoriesResult = $this->resultByLogin($login);

                if ($userRepositoriesResult->isSuccessful()) {
                    $this->cache->set($this->keyForCache($login), $userRepositoriesResult, $this->cacheDuration);
                }
            }

            if ($userRepositoriesResult->isSuccessful()) {
                $repositories = array_merge($repositories, $userRepositoriesResult->value());
            }
        }

        return $repositories;
    }

    private function keyForCache(string $login): string
    {
        return 'gh-' . $login;
    }

    private function resultByLogin(string $login): Result
    {
        return (new UserRepositoriesFromGithub(
            $login,
            $this->transport
        ))
            ->result();
    }
}