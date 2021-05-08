<?php

declare(strict_types=1);

namespace GhInfo\Infrastructure\Result;

use GhInfo\Infrastructure\Result;
use Exception;

class Failed implements Result
{
    /**
     * @var array
     */
    private $error;

    public function __construct(array $error)
    {
        $this->error = $error;
    }

    public function isSuccessful(): bool
    {
        return false;
    }

    public function value(): array
    {
        throw new Exception('Cannot get value of failed result');
    }

    public function error(): array
    {
        return $this->error;
    }
}