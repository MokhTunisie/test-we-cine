<?php

namespace App\Infrastructure\Repository;

use App\Application\Exception\MovieDbException;
use App\Infrastructure\Http\Client\VideoApiClient;
use GuzzleHttp\Exception\GuzzleException;

final class VideoApiRepository implements VideoApiRepositoryInterface
{
    public function __construct(private readonly VideoApiClient $videoApiClient)
    {
    }

    /**
     * @throws MovieDbException
     * @throws GuzzleException
     */
    public function findVideoByMovieId(int $movieId): array
    {
        return $this->videoApiClient->findVideoByMovieId($movieId);
    }
}
