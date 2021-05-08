<?php

declare(strict_types=1);


namespace GhInfo\Infrastructure;

interface Request
{
    public function method(): string;

    public function url(): string;

    public function headers(): array;
}