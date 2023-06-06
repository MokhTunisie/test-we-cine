<?php

namespace App\Application\Transformer;

use App\Domain\Video;
use App\Infrastructure\Helper\VideoBuilder;

class VideoTransformer
{
    public static function Transformer(array $dataArray): array
    {
        $videoData = $dataArray['results'] ? $dataArray['results'][0] : [];
        $video = new Video(
            $videoData['id'] ?? 0,
            $videoData['key'] ?? '',
            $videoData['site'] ?? '',
        );

        return [
            'video' => VideoBuilder::buildVideoUrl($video)
        ];
    }
}
