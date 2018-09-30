<?php

namespace App\Controllers;

use App\Services\Translation\LanguageRecognizer;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class LanguageController extends Controller
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(): ResponseInterface
    {
        $lang = $this->languageRecognizer->recognize();

        return (new Response())->withRedirect($this->router->pathFor('home', ['lang' => $lang]));
    }

    /**
     * @param \Slim\Http\Request $request
     * @param \Slim\Http\Response $response
     * @param array $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function change(Request $request, Response $response, array $args): ResponseInterface
    {
        $route = 'home';

        if (isset($_COOKIE['routeBack'])) {
            $route = $_COOKIE['routeBack'];
        }

        return $response->withRedirect($this->router->pathFor($route, [
            'lang' => $args['lang'],
        ]));
    }
}
