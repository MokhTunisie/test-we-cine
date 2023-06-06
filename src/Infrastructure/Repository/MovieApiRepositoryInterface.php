<?php

namespace App\Infrastructure\Repository;

interface MovieApiRepositoryInterface
{
    public function discoverMovies(): array;
}
