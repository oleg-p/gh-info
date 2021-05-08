<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

class LimitedArray implements ArrayAvailable
{
    /**
     * @var ArrayAvailable
     */
    private $arrayAvailable;

    /**
     * @var int
     */
    private $limit;

    public function __construct(ArrayAvailable $arrayAvailable, int $limit)
    {
        $this->arrayAvailable = $arrayAvailable;
        $this->limit = $limit;
    }

    public function value(): array
    {
        $array = $this->arrayAvailable->value();
        return array_splice($array, 0, $this->limit);
    }
}