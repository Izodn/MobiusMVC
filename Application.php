<?php
namespace Mobius;

use Mobius\Components\Collections\RouteCollection;
use Mobius\Components\Collections\ControllerCollection;
use Mobius\Interfaces\Http\Request;
use Mobius\Components\Http\Requests\BasicRequest;
use Mobius\Interfaces\Http\Response;

/**
 * An applicaiton container
 */
class Application
{
	private $routes;
	private $controllers;

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
	 * Set the application controllers
	 *
	 * @param ControllerCollection $controllers The controllers to set
	 */
	public function registerControllers(ControllerCollection $controllers) {
		$this->controllers = $controllers;
	}

	/**
	 * Send a response to the client
	 *
	 * @param Response $response The response to send
	 */
	public function respond(Response $response) {
		http_response_code($response->getCode());
		header("Content-Type:" . $response->getContentType());
		echo $response->getData();
	}

	/**
	 * Start the application
	 * @todo This method should handle requests and responses
	 */
	public function run() {
		$response = $this->routes->handle($this->controllers, $this->generateRequest());
		$this->respond($response);
	}
}
