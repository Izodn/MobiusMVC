<?php
namespace Mobius\Components\Collections;

use Mobius\Interfaces\Controller;

/**
 * A collection of controllers
 */
class ControllerCollection
{
	private $controllers = [];

	/**
	 * Add a controller to the collection
	 *
	 * @param string $name The name to store the controller as
	 * @param Controller $controller The controller to store
	 */
	public function add($name, Controller $controller) {
		$this->controllers[$name] = $controller;
	}

	/**
	 * Check for existence of a controller given its name
	 *
	 * @param string $name The name of the controller to search for
	 * @return bool True if the specified name exists
	 */
	public function has($name) {
		if (isset($this->controllers[$name])) {
			return true;
		}
		return false;
	}

	/**
	 * Get a controller with a given name
	 *
	 * @param string $name The name of the controller to get
	 * @return Controller A controller registered as the name
	 */
	public function get($name) {
		if ($this->has($name)) {
			return $this->controllers[$name];
		}
		return new Controller();
	}
}
