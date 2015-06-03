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
			fclose($file);
		}
	}

	/**
	 * Modify a response object before it's given to the client
	 *
	 * @param Response $response The response to modify
	 * @param Model $model The data structure to set in the view
	 * @todo This should throw a file not found exception
	 */
	public function modifyResponse(Response $response, Model $model) {
		$responseData = $this->raw;

		//Include files
		while (preg_match('/(\%include )(.*?)(%)/', $responseData, $matches)) {
			$fullPath = $_SERVER['DOCUMENT_ROOT'] . $matches[2];
			if (is_readable($fullPath) && !is_dir($path)) {
				$file = fopen($fullPath, 'r');
				$responseData = preg_replace('_%include ' . $matches[2] . '%_', fread($file, filesize($fullPath)), $responseData);
				fclose($file);
			} else {
				break;
			}
		}

		//Populate variables
		$modelData = $model->getAll();
		foreach ($modelData as $key => $value) {
			$responseData = preg_replace('/\%' . $key . '\%/', $value, $responseData);
		}

		$response->setData($responseData);
		return $response;
	}
}
