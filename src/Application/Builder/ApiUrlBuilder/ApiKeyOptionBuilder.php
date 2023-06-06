<?php

namespace App\Application\Builder\ApiUrlBuilder;

class ApiKeyOptionBuilder implements OptionBuilderInterface
{
    private const OPTION_NAME = 'api_key';

    private string $apiKey;

    /**
     * @param string $apiKey
     * @auto
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function buildOption(): string
    {
        return \sprintf('%s=%s', self::OPTION_NAME, $this->apiKey);
    }
}
