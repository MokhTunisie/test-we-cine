<?php

namespace App\Domain;

class Video
{
    public function __construct(private string $id, private string $key, private string $site)
    {
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }
}
