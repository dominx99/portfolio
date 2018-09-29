<?php

namespace App\Controllers;

use App\Services\Translation\LanguageRecognizer;
use Psr\Http\Message\ResponseInterface;
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
}
