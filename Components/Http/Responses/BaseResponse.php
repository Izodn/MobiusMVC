<?php
namespace Mobius\Components\Http\Responses;

use Mobius\Interfaces\Http\Response;

class BaseResponse implements Response
{
	private $code;
	private $contentType;
	private $text;

	/**
	 * Create the Response
	 *
	 * @param any $data The data to respond with
	 */
	public function __construct($data) {}

	/**
	 * Set the response code
	 *
	 * @param int $code The code to respond with
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * Set the response Content-Type
	 *
	 * @param string $contentType The Content-Type to respond with
	 */
	public function setContentType($contentType) {
		$this->contentType = $contentType;
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
	 * Get the response Content-Type
	 *
	 * @return string The Content-Type to respond with
	 */
	public function getContentType() {
		return $this->contentType;
	}

	/**
	 * Get the response data
	 *
	 * @return any The data to respond with
	 */
	public function getData() {
		return $this->data;
	}
}
