<?php
namespace Mobius\Interfaces\Http;

/**
 * The request interface
 */
interface Request
{
	/**
	 * Create the Request
	 */
	public function __construct();

	/**
	 * Get the request method
	 */
	public function getMethod();

	/**
	 * Get the request path
	 */
	public function getPath();

	/**
	 * Get the body of the request
	 */
	public function getBody();

	/**
	 * Get the IP of the requester
	 */
	public function getClientIP();

	/**
	 * Set the request method
	 *
	 * @param string $newMethod The HTTP method of the request
	 */
	public function setMethod($newMethod);

	/**
	 * Set the request path
	 *
	 * @param string $newPath The url path of the request
	 */
	public function setPath($newPath);

	/**
	 * Set the body of the request
	 *
	 * @param string $newBody The body of the request
	 */
	public function setBody($newBody);

	/**
	 * Set the IP of the requester
	 *
	 * @param string $newClientIP The IP of the requester
	 */
	public function setClientIP($newCleintIP);

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
