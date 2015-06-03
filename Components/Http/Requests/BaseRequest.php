<?php
namespace Mobius\Components\Http\Requests;

use Mobius\Interfaces\Http\Request;

abstract class BaseRequest implements Request
{
	private $method;
	private $path;
	private $variables = [];

	/**
	 * Create the BaseRequest
	 *
	 * @param string $method The HTTP method of the request
	 * @param string $path The url path of the request
	 */
	public function __construct($method, $path) {
		$this->method = $method;
		$this->path = $path;

		foreach ($_REQUEST as $key => $variable) {
			$this->set($key, $variable);
		}
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

	/**
	 * Store a variable
	 *
	 * @param string $key The key to store the variable as
	 * @param any $variable The variable to store
	 */
	public function set($key, $variable) {
		$this->variables[$key] = $variable;
	}

	/**
	 * Get a stored variable
	 *
	 * @param string $key The key containing the variable
	 * @return any The requested variable, null if non-existent
	 */
	public function get($key) {
		if (isset($this->variables[$key])) {
			return $this->variables[$key];
		}
		return NULL;
	}
}
