<?php
namespace Mobius\Components\Router;

use Mobius\Components\Router\Route;

/**
 * A collection of routes
 */
class RouteCollection
{
	private $routes = [];

	public function __construct() {}

	/**
	 * Add a route to the collection
	 *
	 * @param Route $route A route to handle
	 */
	public function add(Route $route) {
		$this->routes[] = $route;
	}

	/**
	 * Handle a request
	 *
	 * @param string $method The request method to handle
	 * @param string $path The url path to handle
	 * @todo handle() should be passed a request object, maybe even return a
	 *		response object
	 */
	public function handle($method, $path) {
		foreach ($this->routes as $route) {
			if ($method === $route->method && $path === $route->path) {
				$route->controller->run();
			}
		}
	}
}
