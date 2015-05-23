<?php
namespace Mobius\Components\Http\Requests;

use Mobius\Interfaces\Http\Request;

abstract class BaseRequest implements Request
{
	private $method;
	private $path;

	/**
	 * Create the BaseRequest
	 *
	 * @param string $method The HTTP method of the request
	 * @param string $path The url path of the request
	 */
	public function __construct($method, $path) {
		$this->method = $method;
		$this->path = $path;
	}

	/**
	 * Get the request method
	 *
	 * @return string The HTTP method of the request
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Get the request path
	 *
	 * @return string The url path of the request
	 */
	public function getPath() {
		return $this->path;
	}
}
