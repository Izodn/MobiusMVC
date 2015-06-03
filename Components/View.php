<?php
namespace Mobius\Components;

use Mobius\Interfaces\Controller;
use Mobius\Interfaces\Http\Response;

/**
 * A view's backend
 */
class View
{
	public $raw;

	/**
	 * @param string $path The path of the view to create
	 * @todo We need to properly handle the exception when the file doens't exist
	 */
	public function __construct($path = NULL) {
		if (is_readable($path) && !is_dir($path)) {
			$file = fopen($path, 'r');
			$this->raw = fread($file, filesize($path));
		}
	}

	/**
	 * Modify a response object before it's given to the client
	 *
	 * @param Response $response The response to modify
	 * @param Controller $controller (should be model)
	 * @todo We should pass a model containing view data
	 */
	public function modifyResponse(Response $response, Controller $controller) {
		$response->setData($this->raw);
		return $response;
	}
}
