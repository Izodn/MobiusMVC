<?php
namespace Mobius\Components\Http\Responses;

use Mobius\Components\Http\Responses\BaseResponse;

class RedirectResponse extends BaseResponse
{
	/**
	 * Create the Response
	 *
	 * @param array $location The address to redirect to
	 */
	public function __construct($location) {
		$this->setCode(301);
		$this->setHeader('Location', $location);
	}
}
