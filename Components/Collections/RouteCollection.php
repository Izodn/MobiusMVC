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
			if ($request->getMethod() === $route->method) {
				if ($request->getPath() === $route->path && $controllers->has($route->controller)) {
					return $controllers->get($route->controller);
				} elseif (strpos($route->path, '%') !== false) {
					$routeSplit = explode('/', $route->path);
					$routeSplitLen = count($routeSplit);
					$requestURLSplit = explode('/', $request->getPath());
					$requestURLSplitLen = count($requestURLSplit);
					if ($routeSplitLen > 1 && $routeSplitLen === $requestURLSplitLen) {
						$vars  = [];
						$controllerPath = '';
						for ($routePart = 1; $routePart < $routeSplitLen; $routePart++) {
							if (strpos($routeSplit[$routePart], '%') !== false) {
								$vars[
									substr(
										$routeSplit[$routePart],
										1,
										strlen($routeSplit[$routePart]) - 2
									)
								] = $requestURLSplit[$routePart];
								$controllerPath .= '/' . $requestURLSplit[$routePart];
							} else {
								$controllerPath .= '/' . $routeSplit[$routePart];
							}
						}
						if ($controllerPath === $request->getPath() && $controllers->has($route->controller)) {
							$controller = $controllers->get($route->controller);
							foreach ($vars as $key => $val) {
								$controller->set($key, $val);
							}
							return $controller;
						}
					}
				}
			}
		}

		return null;
	}
}
