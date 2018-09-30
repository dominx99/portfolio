<?php

namespace App\Twig;

use Slim\Container;

class Filters extends \Twig_Extension
{
    /**
     * @var \Slim\Container
     */
    protected $container;

    /**
     * @param \Slim\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return [
            new \Twig_Filter('trans', [$this, 'translate']),
        ];
    }

    /**
     * @param string $key
     * @param array|string|integer $args
     * @param integer $num
     * @return string
     */
    public function translate(string $key, $args = [], int $num = 0): string
    {
        return $this->container->get('translator')->translate($key, $args, $num);
    }
}
