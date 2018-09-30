<?php

namespace App\Twig;

use Slim\Container;

class Extensions extends \Twig_Extension
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

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('route', [$this, 'route']),
        ];
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function route(string $route, array $params = []): string
    {
        $params['lang'] = $this->container->get('lang');

        return $this->container->router->pathFor($route, $params);
    }
}
