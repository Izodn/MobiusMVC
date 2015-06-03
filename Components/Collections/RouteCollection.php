<?php
namespace Mobius\Components\Collections;

use Mobius\Components\Route;
use Mobius\Interfaces\Http\Request;
use Mobius\Components\Http\Responses\BasicResponse;

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
	 * @param ControllerCollection $controllers The available controllers for the request
	 * @param Request $request The request to handle
	 * @return Response A response to send to the client
	 */
	public function handle(ControllerCollection $controllers, Request $request) {
		foreach ($this->routes as $route) {
			if ($request->getMethod() === $route->method && $request->getPath() === $route->path && $controllers->has($route->controller)) {
				return $controllers->get($route->controller)->run($request);
			}
		}

		$response = new BasicResponse('Page not found');
		$response->setCode(404);
		$response->setContentType('text/plain');
		return $response;
	}
}
