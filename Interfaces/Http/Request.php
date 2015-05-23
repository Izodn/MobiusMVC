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
}
