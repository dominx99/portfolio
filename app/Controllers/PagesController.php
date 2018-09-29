<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;

class PagesController extends Controller
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function home(): ResponseInterface
    {
        return $this->view->render(new Response(), 'home.twig');
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function about(): ResponseInterface
    {
        return $this->view->render(new Response(), 'about.twig');
    }
}
