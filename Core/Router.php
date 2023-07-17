<?php 

namespace Core;

use App\Http\Middleware\Middleware;

class Router 
{
    protected array $routes = [];

    // append to reduce duplications
    protected function append(string $method, string $uri, callable|array $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null,
        ];

        return $this;
    }

    // register GET method
    public function get(string $uri, callable|array $controller)
    {
        return $this->append('GET', $uri, $controller);
    }

    // register POST method
    public function post(string $uri, callable|array $controller)
    {
        return $this->append('POST', $uri, $controller);
    }

    // register PUT method
    public function put(string $uri, callable|array $controller)
    {
        return $this->append('PUT', $uri, $controller);
    }

    // register PATCH method
    public function patch(string $uri, callable|array $controller)
    {
        return $this->append('PATCH', $uri, $controller);
    }

    // register DELETE method
    public function delete(string $uri, callable|array $controller)
    {
        return $this->append('DELETE', $uri, $controller);
    }

    
    // resolve routes to controller
    public function resolve(string $uri, string $method)
    {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method) {
                // middleware layer 
                Middleware::resolve($route['middleware']);

                $this->routeToController($route['controller']);
                exit;
            }
        }

        echo "404 not found";
        return abort(404);
    }

    private function routeToController(callable|array $controller)
    {
        // if controller is callback, invoke
        if(is_callable($controller)) {
            call_user_func($controller);

            exit;
        }

        // otherwise, is array, 
        if(is_array($controller)) {
            // destructure
            [$class, $method] = $controller;

            // if class does not exist, throw exception
            if(!class_exists($class)) {
                throw new \Exception("Class {$class} not found for the given route in router/routes.php");
            }

            // instantiate
            $class = new $class;

            // throw exception if the method not found
            if(!method_exists($class, $method)) {
                throw new \Exception("Method {$method} not found for the class{$class} in router/routes.php");
            }

            // if everything ok, invoke method from the given class with no arguments
            call_user_func_array([$class, $method], []);

        }
    }

    // to guard route | middleware 
    public function guard(string $key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }
}