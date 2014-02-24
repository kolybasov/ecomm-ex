<?php

/**
* Specification Controller
*/
class SpecificationController extends BaseController
{
	function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
		$this->beforeFilter('admin');
	}


	public function getIndex()
	{
		return View::make('specifications.index')
		  ->with('specifications', Specification::all());
	}

	/**
	* Create a new specification
	* @return Response
	*/
	public function postCreate() {
		$validator = Validator::make(Input::all(), Specification::$rules);

		if($validator->passes()) {
		  $specification = new Specification;
		  $specification->name = Input::get('name');
		  $specification->save();

		  return Redirect::to('admin/specifications/index')
		    ->with('message', 'Specification created!');
		}

		return Redirect::to('admin/specifications/index')
		  ->with('message', 'Something went wrong')
		  ->withErrors($validator)
		  ->withInput();
	}

	/**
	* Delete selected specification
	* @return Response
	*/
	public function postDestroy() {
		$specification = Specification::find(Input::get('id'));

		if($specification) {

		  $specification->delete();

		  return Redirect::to('admin/specifications/index')
		    ->with('message', 'Specification deleted!');
		}

		return Redirect::to('admin/specifications/index')
		  ->with('message', 'Something went wrong. Try again!');
		}