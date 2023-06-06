<?php

namespace App\Infrastructure\Http\Client;

use App\Application\Exception\MovieDbException;
use GuzzleHttp\Exception\GuzzleException;

class GenreApiClient extends AbstractHttpClient
{
    protected const URI = 'genre/movie/list';

    /**
     * @throws MovieDbException
     * @throws GuzzleException
     */
    public function findAllGenres(): array
    {
        $response = $this->sendRequest();

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
