<?php
declare(strict_types = 1);

namespace Framework;


/**
 * App
 */
class App {
  private Router $router;
  private Container $container;

  public function __construct(string $containerDefsPath = null) {
    $this->router = new Router();
    $this->container = new Container();
    if($containerDefsPath) $containerDefs = include $containerDefsPath;
    $this->container->addDefinition($containerDefs);
  }
  /**
   * run
   * Starts the Application
   *
   * @return void
   */
  public function run() {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];
    $this->router->dispatch($path, $method, $this->container);
  }

  public function get(string $path, array $controller) {
    $this->router->add('GET', $path, $controller);
  }
}