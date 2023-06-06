<?php

namespace App\Application\Builder\ApiUrlBuilder;

use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class UrlDirector
{
    private iterable $optionsBuilder;
    public function __construct(#[TaggedIterator('movies_db_api.url.option-builder')] iterable $optionsBuilder)
    {
        $this->optionsBuilder = $optionsBuilder;
    }
    public function getOptions()
    {
        $options = '';

        foreach ($this->optionsBuilder as $optionBuilder) {
            $options = \sprintf('%s&%s&', $options, $optionBuilder->buildOption());
        }

        return $options;
    }
}
