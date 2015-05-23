<?php
namespace Mobius\Components\Router;

use Mobius\Components\Router\Route;
use Mobius\Components\Controller;

class RouteCollection
{
	private $routes = [];

	public function __construct() {}

	public function add($method, $path, Controller $controller) {
		$this->routes[] = new Route($method, $path, $controller);
	}

	public function run($method, $path) {
		foreach ($this->routes as $route) {
			if ($method === $route->method && $path === $route->path) {
				$route->controller->run();
			}
		}
	}
}
