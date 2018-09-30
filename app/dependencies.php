<?php

$container = $app->getContainer();

$container['config'] = function () {
    return require 'app/config/app.php';
};

$container['languageRecognizer'] = function ($container) {
    return new \App\Services\Translation\LanguageRecognizer($container);
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('resources/views', [
        'cache' => false,
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
    $view->addExtension(new \App\Twig\Extensions($container));
    $view->addExtension(new \App\Twig\Filters($container));

    return $view;
};
