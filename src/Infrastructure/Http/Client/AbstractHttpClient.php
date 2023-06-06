<?php

namespace App\Infrastructure\Http\Client;

use App\Application\Builder\ApiUrlBuilder\UrlDirector;
use App\Infrastructure\Helper\UrlGeneratorHelper;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractHttpClient implements HttpClientInterface
{
    protected const HTTP_METHODE = 'GET';
    private Client $client;
    private string $methode;
    private string $defaultMethode;

    private string $apiBaseUrl;
    private UrlDirector $urlDirector;

    public function __construct(UrlDirector $urlDirector)
    {
        $this->client = new Client();
        $this->setDefaultMethode(self::HTTP_METHODE);
        $this->urlDirector = $urlDirector;
    }

    /**
     * @param string|null $url
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendRequest(string $url = null): ResponseInterface
    {
        $url = $url ?? $this->getUrl();
        return $this->client->request($this->getMethode(), $this->apiBaseUrl . $url, $this->getOptions());
    }

    /**
     * @return string
     */
    public function getMethode(): string
    {
        return $this->methode ?? $this->defaultMethode;
    }

    /**
     * @param string $method
     * @return void
     */
    public function setMethode(string $method): void
    {
        $this->methode = $method;
    }

    /**
     * @param string $method
     * @return void
     */
    public function setDefaultMethode(string $method): void
    {
        $this->defaultMethode = $method;
    }

    public function getUrl(): string
    {
        $urlGeneratorHelper = new UrlGeneratorHelper();
        $urlGeneratorHelper->setUrl($this->getUri())
            ->setQueryParams($this->urlDirector->getOptions());

        return $urlGeneratorHelper->__toString();
    }

    /**
     * @param $apiBaseUrl
     * @return $this
     */
    public function setApiBaseUrl($apiBaseUrl)
    {
        $this->apiBaseUrl = $apiBaseUrl;

        return $this;
    }
}