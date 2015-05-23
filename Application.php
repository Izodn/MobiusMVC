<?php
namespace Mobius;

use Mobius\Components\Router\RouteCollection;
use Mobius\Components\Http\RequestInfo;

class Application
{
	private $routes;

	public function __construct() {}

	public function registerRoutes(RouteCollection $routes) {
		$this->routes = $routes;
	}

	public function run() {
		$this->routes->run(RequestInfo::requestMethod(), RequestInfo::requestPath());
	}
}
