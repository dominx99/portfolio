<?php

namespace App\Controllers;

use Slim\Container;

class Controller
{
    /**
     * @var \Slim\Container $container
     */
    protected $container;

    /**
     * @param \Slim\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $property
     */
    public function __get(string $property)
    {
        return $this->container->get($property);
    }
}
