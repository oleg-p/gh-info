<?php

declare(strict_types=1);

namespace GhInfo\UserStory\Site\GetUsersRepositories;

class IndexedUpdatedAndIdArray implements ArrayAvailable
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
        $result = [];
        foreach ($this->arrayAvailable->value() as $item) {
            $result[$item['updated_at'] . '-' . $item['id']] = $item;
        }

        return $result;
    }
}