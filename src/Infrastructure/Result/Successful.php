<?php

declare(strict_types=1);

namespace GhInfo\Infrastructure\Result;

use GhInfo\Infrastructure\Result;
use Exception;

class Successful implements Result
{
    /**
     * @var array
     */
    private $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function isSuccessful(): bool
    {
        return true;
    }

    public function value(): array
    {
        return $this->value;
    }

    public function error(): array
    {
        throw new Exception('Successful result does not have an error');
    }
}