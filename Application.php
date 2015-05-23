<?php
namespace Mobius;

use Mobius\Components\Router\RouteCollection;
use Mobius\Components\Http\RequestInfo;
use Mobius\Interfaces\Http\Request;
use Mobius\Components\Http\Requests\BasicRequest;

/**
 * An applicaiton container
 */
class Application
{
	private $routes;

	public function __construct() {}

	/**
	 * Generate a request object
	 *
	 * @return Request An instance of the Request interface
	 */
	public function generateRequest() {
		$method = $_SERVER['REQUEST_METHOD'];
		$path = preg_split("/\/$/", preg_split("/\?/", $_SERVER['REQUEST_URI'])[0])[0];
		return new BasicRequest($method, $path);
	}

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
		$this->routes->handle($this->generateRequest());
	}
}
