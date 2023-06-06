<?php

namespace App\Application\Builder\ApiUrlBuilder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class GenresOptionBuilder implements OptionBuilderInterface
{
    private const OPTION_NAME = 'with_genres';


    private ?Request $request;

    public function __construct(RequestStack $request)
    {
        $this->request = $request->getCurrentRequest();
    }

    public function buildOption(): string
    {
        if (null == $this->request || !$this->request->query->has('genres')) {
            return '';
        }

        $genres = $this->request->query->get('genres');
        return sprintf(
            '%s=%s',
            self::OPTION_NAME,
            is_array($genres) ? implode(',', $genres) : $genres
        );
    }
}
