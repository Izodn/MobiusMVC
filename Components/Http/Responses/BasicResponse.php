<?php
namespace Mobius\Components\Http\Responses;

use Mobius\Components\Http\Responses\BaseResponse;

class BasicResponse extends BaseResponse
{
	/**
	 * Create the Response
	 *
	 * @param string $text The text to respond with
	 */
	public function __construct($text) {
		$this->setCode(200);
		$this->setContentType('text/html');
		$this->setData($text);
	}
}
