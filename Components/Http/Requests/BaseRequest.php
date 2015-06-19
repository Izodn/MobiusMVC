<?php
namespace Mobius\Components\Http\Requests;

use Mobius\Interfaces\Http\Request;

abstract class BaseRequest implements Request
{
	private $method;
	private $path;
	private $body;
	private $clientIP;
	private $variables = [];

	/**
	 * Create the BaseRequest
	 */
	public function __construct() {

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
	 * Get the body of the request
	 *
	 * @return string The body of the request
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Get the IP of the requester
	 *
	 * @return string The IP of the requester
	 */
	public function getClientIP() {
		return $this->clientIP;
	}

	/**
	 * Set the request method
	 *
	 * @param string $newMethod The HTTP method of the request
	 * @return self
	 */
	public function setMethod($newMethod) {
		$this->method = $newMethod;
		return $this;
	}

	/**
	 * Set the request path
	 *
	 * @param string $newPath The url path of the request
	 * @return self
	 */
	public function setPath($newPath) {
		$this->path = $newPath;
		return $this;
	}

	/**
	 * Set the body of the request
	 *
	 * @param string $newBody The body of the request
	 * @return self
	 */
	public function setBody($newBody) {
		$this->body = $newBody;
		return $this;
	}

	/**
	 * Set the IP of the requester
	 *
	 * @param string $newClientIP The IP of the requester
	 * @return self
	 */
	public function setClientIP($newCleintIP) {
		$this->clientIP = $newCleintIP;
		return $this;
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
		return null;
	}
}
