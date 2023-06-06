<?php

namespace App\Infrastructure\Repository;

use App\Application\Exception\MovieDbException;
use App\Infrastructure\Http\Client\GenreApiClient;
use GuzzleHttp\Exception\GuzzleException;

final class GenreApiRepository implements GenreApiRepositoryInterface
{
    public function __construct(private readonly GenreApiClient $genreApiClient)
    {
    }

    /**
     * @throws MovieDbException
     * @throws GuzzleException
     */
    public function findAllGenres(): array
    {
        return $this->genreApiClient->findAllGenres();
    }
}
