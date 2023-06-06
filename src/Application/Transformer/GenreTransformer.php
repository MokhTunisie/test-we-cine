<?php

namespace App\Application\Transformer;

use App\Domain\Genre;

class GenreTransformer
{
    public static function Transformer(array $dataArray): array
    {
        $genreList = [];

        $genres = $dataArray['genres'] ?? [];
        foreach ($genres as $genreData) {
            $genre = new Genre(
                $genreData['id'] ?? 0,
                $genreData['name'] ?? '',
            );
            $genreList[] = $genre;
        }

        return [
            'genres' => $genreList
        ];
    }
}
