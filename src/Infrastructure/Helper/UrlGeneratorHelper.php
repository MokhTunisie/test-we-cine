<?php

namespace App\Infrastructure\Helper;

class UrlGeneratorHelper implements \Stringable
{
    private string $url = '';
    private string $queryParams = '';

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): UrlGeneratorHelper
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param array|string $queryParams
     * @return $this
     */
    public function setQueryParams(array|string $queryParams): UrlGeneratorHelper
    {
        $this->queryParams = is_array($queryParams) && count($queryParams)
            ? '&' . http_build_query($this->queryParams, '', '&')
            : $queryParams;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            '%s?%s',
            $this->url,
            $this->queryParams
        );
    }
}