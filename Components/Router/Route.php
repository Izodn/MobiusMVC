<?php
namespace Mobius\Components\Router;

use Mobius\Interfaces\Controller;

/**
 * A route between a request and method, and a controller to handle the request
 */
class Route
{
	public $method;
	public $path;
	public $controller;

	/**
	 * @param string $method A HTTP method (GET, POST, OPTION, etc)
	 * @param string $path The url path to access the controller (i.e. "/about-us")
	 * @param Controller $controller The controller to handle the request
	 * @todo __construct() shouldn't take a Controller, it should take a "path" to one
	 */
	public function __construct($method, $path, Controller $controller) {
		$this->method = $method;
		$this->path = $path;
		$this->controller = $controller;
	}
}
