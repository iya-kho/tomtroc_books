<?php

class Router {
  protected $routes = [];

  public function addRoute($route, $controller, $function) {
    $this->routes[$route] = ['controller' => $controller, 'function' => $function];
  }

  public function dispatch($uri) {
    if (array_key_exists($uri, $this->routes)) {
        $controller = $this->routes[$uri]['controller'];
        $function = $this->routes[$uri]['function'];

        $controller = new $controller();
        $controller->$function();
    } else {
        throw new \Exception("The requested page does not exist.");
    }
  }

}