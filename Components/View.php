<?php
namespace Mobius\Components;

use Mobius\Interfaces\Controller;
use Mobius\Interfaces\Http\Response;

/**
 * A view's backend
 */
class View
{
	private $raw;

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
	 * @param Model $model The data structure to set in the view
	 */
	public function modifyResponse(Response $response, Model $model) {
		$responseData = $this->raw;
		$modelData = $model->getAll();
		foreach ($modelData as $key => $value) {
			$responseData = preg_replace('/\%' . $key . '\%/', $value, $responseData);
		}
		$response->setData($responseData);
		return $response;
	}
}
