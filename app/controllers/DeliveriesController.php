<?php

/**
* Deliveries Controller
*/
class DeliveriesController extends BaseController
{
	function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex()
	{
		return View::make('deliveries.index')
		  ->with('deliveries', Delivery::all());
	}

	/**
	* Create a new delivery
	* @return Response
	*/
	public function postCreate() {
		$validator = Validator::make(Input::all(), Delivery::$rules);

		if($validator->passes()) {
		  $delivery = new Delivery;
		  $delivery->title = Input::get('title');
		  $delivery->description = Input::get('description');
		  $delivery->save();

		  return Redirect::to('admin/deliveries/index')
		    ->with('message', 'Delivery created!');
		}

		return Redirect::to('admin/deliveries/index')
		  ->with('message', 'Something went wrong')
		  ->withErrors($validator)
		  ->withInput();
	}

	/**
	* Delete selected delivery
	* @return Response
	*/
	public function postDestroy() {
		$delivery = Delivery::find(Input::get('id'));

		if($delivery) {

		  $delivery->delete();

		  return Redirect::to('admin/deliveries/index')
		    ->with('message', 'Delivery deleted!');
		}

		return Redirect::to('admin/deliveries/index')
		  ->with('message', 'Something went wrong. Try again!');
		}
}