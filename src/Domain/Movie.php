<?php

namespace App\Domain;

class Movie
{
    public function __construct(private int $id, private string $title, private string $poster, private string $overview)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }
}