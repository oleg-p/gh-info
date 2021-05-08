<?php

declare(strict_types=1);


namespace GhInfo\Infrastructure;

interface Transport
{
    public function response(Request $request): Result;
}