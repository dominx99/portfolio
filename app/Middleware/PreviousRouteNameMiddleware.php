<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class PreviousRouteNameMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        $route = $request->getAttribute('route');

        setcookie('routeBack', $route->getName(), time() + 3600, '/');

        return $next($request, $response);
    }
}
