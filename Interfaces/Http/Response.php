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
	 * Set the response Content-Type
	 *
	 * @param string $contentType The Content-Type to respond with
	 */
	public function setContentType($contentType);

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
	 * Get the response Content-Type
	 *
	 * @return string The Content-Type to respond with
	 */
	public function getContentType();

	/**
	 * Get the response data
	 *
	 * @return any The data to respond with
	 */
	public function getData();
}
