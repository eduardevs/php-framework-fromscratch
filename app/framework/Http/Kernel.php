<?php

namespace EduarDev\Framework\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        // $content = '<h1>Hello this comes from kernel</h1>';

        // return new Response($content);


        // Create a dispatcher


        $dispatcher = simpleDispatcher(function (
            RouteCollector $routeCollector
        ) {
            // $route->addRoute('GET', '/users', 'get_all_users_handler');
            // {id} must be a number (\d+)
            $routeCollector->addRoute('GET', '/', function () {
                $content = "Hello world";

                return new Response($content);
            });
            // * Route parameters

            $routeCollector->addRoute('GET', '/posts/{id:\d+}', function ($routeParams) {
                $content = "<h1>This is Post {$routeParams['id']}</h1>";

                return new Response($content);
            });
        });
        // dd($request);
        // dd($dispatcher);
        // Dispatch a URI, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo(),
        );
        dd($request->getPathInfo());
 
        [$status, $handler, $vars] = $routeInfo;
        return $handler($vars); 
    }
}
