<?php

namespace Core;

class Router
{
    private static array $routes = [];

    public static function addRoute(string $uri, array $controllerAction): void
    {
        static::$routes[$uri] = $controllerAction;
    }

    public static function dispatch(string $requestUri): bool
    {
        if (isset(static::$routes[$requestUri])) {
            $controllerAction = static::$routes[$requestUri];
            $controllerName = $controllerAction[0];
            $controller = new $controllerName();

            method_exists($controller, '__invoke')
                ? $controller()
                : $controller->{$controllerAction[1]}();

            return true;
        }

        foreach (Config::get('SERVE_DIRS') as $serveDir) {
            if (str_starts_with($requestUri, $serveDir)) {
                return false;
            }
        }

        http_response_code(404);

        return true;
    }
}
