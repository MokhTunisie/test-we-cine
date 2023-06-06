<?php

namespace App\Application\Handler;

use App\Application\Transformer\MovieTransformer;
use App\Infrastructure\Repository\MovieApiRepositoryInterface;

class GetMovieHandler
{
    public function __construct(private readonly MovieApiRepositoryInterface $movieRepository)
    {
    }

    public function handle(): array
    {
        $moviesList = $this->movieRepository->discoverMovies();

        return MovieTransformer::Transformer($moviesList);
    }
}
