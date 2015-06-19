<?php
namespace Mobius\Components\Collections;

use Mobius\Components\View;

/**
 * A collection of views
 */
class ViewCollection
{
	private $views = [];

	/**
	 * Add a view to the collection
	 *
	 * @param string $name The name to store the view as
	 * @param string $path The absolute path of the view
	 */
	public function add($name, $path) {
		$this->views[$name] = $path;
	}

	/**
	 * Check for existence of a view given its name
	 *
	 * @param string $name The name of the view to search for
	 * @return bool True if the specified name exists
	 */
	public function has($name) {
		if (isset($this->views[$name])) {
			return true;
		}
		return false;
	}

	/**
	 * Get a view with a given name
	 *
	 * @param string $name The name of the view to get
	 * @return View A view registered as the name
	 */
	public function get($name) {
		if ($this->has($name)) {
			return new View($this->views[$name]);
		}
		return new View();
	}
}
