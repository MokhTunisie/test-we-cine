<?php

namespace App\Infrastructure\Http\Client;

use Psr\Http\Message\ResponseInterface;

interface HttpClientInterface
{
    public function sendRequest(): ResponseInterface;

    public function getOptions(): array;

    public function getMethode(): string;

    public function setMethode(string $method): void;

    public function setDefaultMethode(string $method): void;

    public function getUrl(): string;

    public function getUri(): string;
}