<?php

namespace App\Infrastructure\Helper;

use App\Domain\Video;

class VideoBuilder
{
    private const SITES_URLS = [
        'YouTube' => 'https://www.youtube.com/embed/',
        'Vimeo' => 'https://player.vimeo.com/video/'
    ];

    public static function buildVideoUrl(Video $video): string
    {
        return in_array($video->getSite(), array_keys(self::SITES_URLS))
            ? sprintf('%s%s', self::SITES_URLS[$video->getSite()], $video->getKey())
            : '';
    }
}
