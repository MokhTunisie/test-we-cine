<?php

namespace App\Application\Transformer;

use App\Domain\Movie;

class MovieTransformer
{
    private const IMAGES_BASE_URL = 'https://image.tmdb.org/t/p/w500';

    public static function Transformer(array $dataArray): array
    {
        $movieList = [];

        $movies = $dataArray['results'] ?? [];
        foreach ($movies as $movieData) {
            $movie = new Movie(
                $movieData['id'] ?? 0,
                $movieData['title'] ?? '',
                $movieData['poster_path'] ? self::IMAGES_BASE_URL . $movieData['poster_path'] : '',
                $movieData['overview'] ?? '',
            );
            $movieList[] = $movie;
        }

        return [
            'page' => $dataArray['page'] ?? 0,
            'total_pages' => $dataArray['total_pages'] ?? 0,
            'total_results' => $dataArray['total_results'] ?? 0,
            'movies' => $movieList
        ];
    }
}
