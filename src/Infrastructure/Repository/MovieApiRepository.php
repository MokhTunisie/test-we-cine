<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Http\Client\MovieApiClient;

final class MovieApiRepository implements MovieApiRepositoryInterface
{
    public function __construct(private readonly MovieApiClient $movieApiClient)
    {
    }

    public function discoverMovies(): array
    {
        return $this->movieApiClient->discoverMovies();
    }
}
