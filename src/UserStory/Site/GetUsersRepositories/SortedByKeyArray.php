<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

class SortedByKeyArray implements ArrayAvailable
{
    /**
     * @var ArrayAvailable
     */
    private $arrayAvailable;

    public function __construct(ArrayAvailable $arrayAvailable)
    {
        $this->arrayAvailable = $arrayAvailable;
    }

    public function value(): array
    {
        $array = $this->arrayAvailable->value();
        krsort($array);

        return $array;
    }
}