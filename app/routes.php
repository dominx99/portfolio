<?php

use App\Controllers\LanguageController;
use App\Controllers\PagesController;
use App\Middleware\PreviousRouteNameMiddleware;
use App\Middleware\TranslationMiddleware;

$app->get('/', LanguageController::class . ':index');

$app->group('/{lang}', function () use ($app, $container) {
    $app->get('', PagesController::class . ':home')->setName('home');
    $app->get('/about', PagesController::class . ':about')->setName('about');
})->add(new TranslationMiddleware($container))
    ->add(new PreviousRouteNameMiddleware($container));

$app->get('/change/{lang}', LanguageController::class . ':change')->setName('lang.change');
