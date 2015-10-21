<?php
namespace Mobius\Components\Http\Responses;

use Mobius\Components\Http\Responses\BaseResponse;

class JsonResponse extends BaseResponse
{
	/**
	 * Create the Response
	 *
	 * @param array $data The JSON data to respond with
	 */
	public function __construct($data) {
		$this->setCode(200);
		$this->setHeader('Content-Type', 'application/json');
		$this->setData(json_encode($data));
	}
}
