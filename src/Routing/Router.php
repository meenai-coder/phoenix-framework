<?php
namespace Phoenix\Routing;

use ReflectionClass;
use ReflectionMethod;
use App\Attributes\Route;

class Router
{
    private array $routes = [];

    public function registerController(string $controllerClass): void
    {
        $reflection = new ReflectionClass($controllerClass);

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $attributes = $method->getAttributes(Route::class);

            foreach ($attributes as $attr) {
                $route = $attr->newInstance();
                $this->routes[$route->method][$route->path] = [
                    'controller' => $controllerClass,
                    'action' => $method->getName()
                ];
            }
        }
    }

    public function dispatch(string $uri, string $method = 'GET'): void
    {
        $uri = rtrim($uri, '/') ?: '/';
        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $controller = new $route['controller']();
            echo $controller->{$route['action']}();
        } else {
            echo "404 Not Found";
        }
    }
}