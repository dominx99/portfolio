<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class PreviousRouteNameMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $route = $request->getAttribute('route');

        $_SESSION['routeBack'] = $route->getName();

        return $next($request, $response);
    }
}
