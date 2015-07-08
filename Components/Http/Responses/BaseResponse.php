<?php
namespace Mobius\Components\Http\Responses;

use Mobius\Interfaces\Http\Response;

class BaseResponse implements Response
{
	private $code;
	private $headers;
	private $data;

	/**
	 * Create the Response
	 *
	 * @param any $data The data to respond with
	 */
	public function __construct($data) {
		$this->data = $data;
		$this->headers = [];
	}

	/**
	 * Set the response code
	 *
	 * @param int $code The code to respond with
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * Set a response header
	 *
	 * @param string $header The name of the header
	 * @param string $value The value of the header
	 */
	public function setHeader($header, $value) {
		$this->headers[$header] = $value;
	}

	/**
	 * Set the response data
	 *
	 * @param any $data The data to respond with
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * Get the response code
	 *
	 * @return int The code to respond with
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * Get a response header
	 *
	 * @param string $header The name of the header
	 * @return string The value of the header
	 */
	public function getHeader($header) {
		return $this->headers[$header];
	}

	/**
	 * Get the response data
	 *
	 * @return any The data to respond with
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Get all response headers
	 *
	 * @return array The response headers
	 */
	public function getHeaders() {
		return $this->headers;
	}
}
