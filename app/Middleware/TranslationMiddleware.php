<?php

namespace App\Middleware;

use App\Services\Translation\LanguageTranslator;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class TranslationMiddleware
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

    /**
     * @param \Slim\Http\Request $request
     * @param \Slim\Http\Response $response
     * @param $next
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(Request $request, Response $response, $next): ResponseInterface
    {
        $route = $request->getAttribute('route');
        $lang  = $route->getArgument('lang');

        if ($this->langIsNotAvaible($lang)) {
            return $response->withRedirect($this->container->router->pathFor(
                'home',
                [
                    'lang' => $this->container->languageRecognizer->recognize(),
                ]
            ));
        }

        $_SESSION['lang'] = $lang;

        $translator = new LanguageTranslator($this->container);
        $translator->boot($lang);

        $this->container['lang'] = function () use ($lang) {
            return $lang;
        };

        $this->container['translator'] = function () use ($translator) {
            return $translator;
        };

        return $next($request, $response);
    }

    /**
     * @param string $lang
     * @return boolean
     */
    protected function langIsNotAvaible(string $lang): bool
    {
        return !in_array($lang, $this->container->get('config')['avaibleLanguages']);
    }
}
