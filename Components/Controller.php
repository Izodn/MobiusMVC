<?php
namespace Mobius\Components;

use Mobius\Interfaces\Controller as ControllerInterface;
use Mobius\Components\Model;
use Mobius\Interfaces\Http\Request;
use Mobius\Components\Http\Responses\BasicResponse;

/**
 * An extendable base for Controller
 */
abstract class Controller implements ControllerInterface
{
	private $view;
	public $model;

	/**
	 * Initialize the object and set view and model
	 */
	public function __construct() {
		$this->view = '';
		$this->model = new Model();
	}

	/**
	 * Run the controller
	 *
	 * @param Request $request The request to respond to
	 * @return Response An instance of Response
	 */
	public function run(Request $request) {
		return new BasicResponse(NULL);
	}
}
