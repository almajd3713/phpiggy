<?php
declare(strict_types = 1);

namespace Framework;

class Router {
  private array $routes = [];
  
  public function add(string $method, string $path, $controller) {
    $this->routes[] = [
      'path' => $this->normalizePath($path),
      'method' => $method,
      'controller' => $controller
    ];
  }

  private function normalizePath(string $path) : string {
    $path = trim($path, '/');
    $path = "/{$path}/";
    $path = preg_replace("#[/]{2,}#", '/', $path);
    return $path;
  }

  public function dispatch(string $path, string $method, Container $container = null) {
    $path = $this->normalizePath($path);
    $method = strtoupper($method);
    foreach ($this->routes as $route) {
      if(
        $route['method'] !== $method ||
        !preg_match("#^{$route['path']}$#", $path)
      ) continue;
      [$class, $function] = $route['controller'];
      $controllerInterface = $container ? 
        $container->resolve($class) :
        new $class;
      $controllerInterface->$function();
    }
  }
}