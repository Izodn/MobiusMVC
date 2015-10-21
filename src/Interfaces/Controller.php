<?php
namespace Mobius\Interfaces;

use Mobius\Interfaces\Http\Request;

/**
 * A controller interface to modify views and models
 */
interface Controller
{
	/**
	 * Run the controller. This is the main entry point for controllers
	 *
	 * @param Request $request The request to handle
	 */
	public function run(Request $request);

	/**
	 * Get a stored controller value
	 *
	 * @param string $name The name of the value to get
	 */
	public function get($name);

	/**
	 * Store a controller value
	 *
	 * @param string $name The name of the value to set
	 * @param any $value The value to set
	 */
	public function set($name, $value);
}
