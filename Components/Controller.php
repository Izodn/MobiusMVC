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
	protected $view;
	protected $model;

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
		return new BasicResponse(null);
	}

	/**
	 * Get the view associated with this controller
	 *
	 * @return string The name of then view
	 */
	public function getView() {
		return $this->view;
	}

	/**
	 * Get the model associated with this controller
	 *
	 * @return Model This Controller's Model
	 */
	public function getModel() {
		return $this->model;
	}
}
