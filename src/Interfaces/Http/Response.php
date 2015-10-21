<?php
namespace Mobius\Interfaces\Http;

/**
 * The base Response interface
 */
interface Response
{
	/**
	 * Create the Response
	 *
	 * @param string $text The text to respond with
	 */
	public function __construct($text);

	/**
	 * Set the response code
	 *
	 * @param int $code The code to respond with
	 */
	public function setCode($code);

	/**
	 * Set a response header
	 *
	 * @param string $header The name of the header
	 * @param string $value The value of the header
	 */
	public function setHeader($header, $value);

	/**
	 * Set the response data
	 *
	 * @param any $data The data to respond with
	 */
	public function setData($data);

	/**
	 * Get the response code
	 *
	 * @return int The code to respond with
	 */
	public function getCode();

	/**
	 * Get a response header
	 *
	 * @return string The value of the header
	 */
	public function getHeader($header);

	/**
	 * Get the response data
	 *
	 * @return any The data to respond with
	 */
	public function getData();

	/**
	 * Get all response headers
	 *
	 * @return array The response headers
	 */
	public function getHeaders();
}
