<?php

namespace App\Infrastructure\Http\Client;

use App\Application\Exception\MovieDbException;
use GuzzleHttp\Exception\GuzzleException;

class VideoApiClient extends AbstractHttpClient
{
    protected const URI = 'movie/{movie_id}/videos';

    /**
     * @throws MovieDbException
     * @throws GuzzleException
     */
    public function findVideoByMovieId($movieId): array
    {
        $url = str_replace('{movie_id}', $movieId, $this->getUrl());
        $response = $this->sendRequest($url);

        if (200 !== $response->getStatusCode()) {
            throw new MovieDbException();
        }

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getOptions(): array
    {
        return [];
    }

    public function getUri(): string
    {
        return self::URI;
    }
}
