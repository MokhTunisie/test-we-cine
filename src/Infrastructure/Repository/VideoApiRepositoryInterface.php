<?php

namespace App\Infrastructure\Repository;

interface VideoApiRepositoryInterface
{
    public function findVideoByMovieId(int $movieId): array;
}
