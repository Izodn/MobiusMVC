<?php
namespace Mobius;

use Mobius\Components\Collections\RouteCollection;
use Mobius\Components\Collections\ControllerCollection;
use Mobius\Components\Http\Requests\BasicRequest;
use Mobius\Interfaces\Http\Response;
use Mobius\Components\Http\Responses\BasicResponse;

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
		$request = new BasicRequest();
		$request
			->setMethod($method)
			->setPath($path)
			->setBody(file_get_contents('php://input'))
			->setClientIP($_SERVER['REMOTE_ADDR']);
		return $request;
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
		foreach ($response->getHeaders() as $header => $value) {
			header($header . ': ' . $value);
		}
		echo $response->getData();
	}

	/**
	 * Start the application
	 * @todo This method should handle requests and responses
	 */
	public function run() {
		$request = $this->generateRequest();
		$response = new BasicResponse(null);
		$controller = $this->routes->getController($this->controllers, $request);
		if ($controller !== null) {
			$response = $controller->run($request);
		} else {
			$response->setData('Page not found');
			$response->setCode(404);
			$response->setHeader('Content-Type', 'text/plain');
		}
		$this->respond($response);
	}
}
