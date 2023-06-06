<?php

namespace App\Infrastructure\Repository;

interface GenreApiRepositoryInterface
{
    public function findAllGenres(): array;
}
