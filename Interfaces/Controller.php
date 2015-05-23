<?php
namespace Mobius\Interfaces;

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
	 * @return Response A response to send to the client
	 */
	public function run();
}
