<?php
namespace Mobius\Components;

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
	public function __construct($path = null) {
		if (is_readable($path) && !is_dir($path)) {
			$file = fopen($path, 'r');
			$this->raw = fread($file, filesize($path));
			fclose($file);
		}
	}

	/**
	 * Generate response text given a model
	 *
	 * @param Model $model The data structure to set in the view
	 * @return string The text of a rendered view
	 * @todo This should throw a file not found exception
	 */
	public function render(Model $model) {
		$responseData = $this->raw;

		//Include files
		while (preg_match('/(\%include )(.*?)(%)/', $responseData, $matches)) {
			$fullPath = $_SERVER['DOCUMENT_ROOT'] . $matches[2];
			if (is_readable($fullPath) && !is_dir($fullPath)) {
				$file = fopen($fullPath, 'r');
				$responseData = str_replace('%include ' . $matches[2] . '%', fread($file, filesize($fullPath)), $responseData);
				fclose($file);
			} else {
				break;
			}
		}

		//Populate variables
		$modelData = $model->getAll();
		foreach ($modelData as $key => $value) {
			$responseData = str_replace('%' . $key . '%', $value, $responseData);
		}

		return $responseData;
	}
}
