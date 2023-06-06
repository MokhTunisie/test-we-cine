<?php

namespace App\Domain;

class Genre
{
    public function __construct(private int $id, private string $name)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
