<?php

namespace App\Application\Builder\ApiUrlBuilder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class PaginationOptionBuilder implements OptionBuilderInterface
{
    private const OPTION_NAME = 'page';


    private ?Request $request;
    /**
     * @param string $page
     */
    public function __construct(RequestStack $request)
    {
        $this->request = $request->getCurrentRequest();
    }

    public function buildOption(): string
    {
        if (null == $this->request) {
            return '';
        }

        return sprintf(
            '%s=%s',
            self::OPTION_NAME,
            (int)$this->request->query->get('page', 1)
        );
    }
}
