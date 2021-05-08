<?php

declare(strict_types=1);


namespace GhInfo\Infrastructure;


interface Result
{
    public function isSuccessful(): bool;
    public function value(): array;
    public function error(): array;
}