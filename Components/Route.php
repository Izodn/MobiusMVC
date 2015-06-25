<?php
namespace Mobius\Components;

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
	 * @param string $controller The controller to handle the request
	 */
	public function __construct($method, $path, $controller) {
		$this->method = $method;
		$this->path = $path;
		$this->controller = $controller;
	}
}
