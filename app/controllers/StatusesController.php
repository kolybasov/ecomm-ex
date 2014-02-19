<?php

/**
* Statuses Controller
*/
class StatusesController extends BaseController
{
	function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('admin');
	}

	public function getIndex()
	{
		return View::make('statuses.index')
		  ->with('statuses', Status::all());
	}

	/**
	* Create a new status
	* @return Response
	*/
	public function postCreate() {
		$validator = Validator::make(Input::all(), Status::$rules);

		if($validator->passes()) {
		  $status = new Status;
		  $status->title = Input::get('title');
		  $status->description = Input::get('description');
		  $status->save();

		  return Redirect::to('admin/statuses/index')
		    ->with('message', 'Status created!');
		}

		return Redirect::to('admin/statuses/index')
		  ->with('message', 'Something went wrong')
		  ->withErrors($validator)
		  ->withInput();
	}

	/**
	* Delete selected status
	* @return Response
	*/
	public function postDestroy() {
		$status = Status::find(Input::get('id'));

		if($status) {

		  $status->delete();

		  return Redirect::to('admin/statuses/index')
		    ->with('message', 'Status deleted!');
		}

		return Redirect::to('admin/statuses/index')
		  ->with('message', 'Something went wrong. Try again!');
		}
}