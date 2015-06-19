<?php
namespace Mobius\Components\Collections;

use Mobius\Components\Route;
use Mobius\Interfaces\Http\Request;

/**
 * A collection of routes
 */
class RouteCollection
{
	private $routes = [];

	/**
	 * Add a route to the collection
	 *
	 * @param Route $route A route to handle
	 */
	public function add(Route $route) {
		$this->routes[] = $route;
	}

	/**
	 * Return a controller for a given request
	 *
	 * @param ControllerCollection $controllers The available controllers for the request
	 * @param Request $request The request to handle
	 * @return Controller An instance of a controller
	 */
	public function getController(ControllerCollection $controllers, Request $request) {
		foreach ($this->routes as $route) {
			if ($request->getMethod() === $route->method && $request->getPath() === $route->path && $controllers->has($route->controller)) {
				return $controllers->get($route->controller);
			}
		}

		return NULL;
	}
}
