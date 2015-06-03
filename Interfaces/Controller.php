<?php
namespace Mobius\Interfaces;

use Mobius\Interfaces\Http\Request;

/**
 * A controller interface to modify views and models
 */
interface Controller
{
	/**
	 * Initialize the controller
	 */
	public function __construct();

	/**
	 * Run the controller. This is the main entry point for controllers
	 *
	 * @param Request $request The request to handle
	 * @return Response A response to send to the client
	 */
	public function run(Request $request);
}
