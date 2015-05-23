<?php
namespace Mobius;

use Mobius\Components\Router\RouteCollection;
use Mobius\Components\Http\RequestInfo;

/**
 * An applicaiton container
 */
class Application
{
	private $routes;

	public function __construct() {}

	/**
	 * Set the handled routes
	 *
	 * @param RouteCollection $routes The routes to set
	 * @todo This method should probably merge the collections
	 */
	public function registerRoutes(RouteCollection $routes) {
		$this->routes = $routes;
	}

	/**
	 * Start the application
	 * @todo This method should handle requests and responses
	 */
	public function run() {
		$this->routes->handle(RequestInfo::requestMethod(), RequestInfo::requestPath());
	}
}
