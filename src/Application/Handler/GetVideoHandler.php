<?php

namespace App\Application\Handler;

use App\Application\Transformer\VideoTransformer;
use App\Infrastructure\Repository\VideoApiRepositoryInterface;

class GetVideoHandler
{
    public function __construct(private readonly VideoApiRepositoryInterface $videoRepository)
    {
    }

    public function handle($movieId): array
    {
        $video = $this->videoRepository->findVideoByMovieId($movieId);

        return VideoTransformer::Transformer($video);
    }
}
