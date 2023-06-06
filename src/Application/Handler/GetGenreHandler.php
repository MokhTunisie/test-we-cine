<?php

namespace App\Application\Handler;

use App\Application\Transformer\GenreTransformer;
use App\Infrastructure\Repository\GenreApiRepositoryInterface;

class GetGenreHandler
{
    public function __construct(private readonly GenreApiRepositoryInterface $genreRepository)
    {
    }

    public function handle(): array
    {
        $genresList = $this->genreRepository->findAllGenres();

        return GenreTransformer::Transformer($genresList);
    }
}
