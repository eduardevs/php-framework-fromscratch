<?php

namespace EduarDev\Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (
            RouteCollector $routeCollector
        ) {

            $routes = include BASE_PATH . '/routes/web.php';

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });
        // dd($request);
        // dd($dispatcher);
        // Dispatch a URI, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo(),
        );

        [$status, [$controller, $method], $vars] = $routeInfo;

        $response = (new $controller())->$method($vars);
        return $response;
    }
}
