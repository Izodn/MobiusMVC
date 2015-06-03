<?php
namespace Mobius\Interfaces\Http;

/**
 * The request interface
 */
interface Request
{
	/**
	 * Create the Request
	 *
	 * @param string $method The HTTP method of the request
	 * @param string $path The url path of the request
	 */
	public function __construct($method, $path);

	/**
	 * Get the request method
	 */
	public function getMethod();

	/**
	 * Get the request path
	 */
	public function getPath();

	/**
	 * Store a variable
	 *
	 * @param string $key The key to store the variable as
	 * @param any $variable The variable to store
	 */
	public function set($key, $variable);

	/**
	 * Get a stored variable
	 *
	 * @param string $key The key containing the variable
	 */
	public function get($key);
}
