<?php
namespace Mobius\Components\Router;

use Mobius\Components\Controller;

class Route
{
	public $method;
	public $path;
	public $controller;

	public function __construct($method, $path, Controller $controller) {
		$this->method = $method;
		$this->path = $path;
		$this->controller = $controller;
	}
}
