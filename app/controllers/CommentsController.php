<?php

class CommentsController extends BaseController {
	public function __construct() {
		parent::__construct();
	    $this->beforeFilter('csrf', array('on' => 'post'));
	    $this->beforeFilter('admin', array('only'=>'postDelete'));
	    $this->beforeFilter('auth');
	}

	public function postCreate(){
		$validator = Validator::make(Input::all(), Comment::$rules);

		if($validator->passes()) {
			$comment = new Comment;
			$comment->user_id = Auth::user()->id;
			$comment->product_id = Input::get('product_id');
			$comment->body = Input::get('body');
			$comment->save();

			return Redirect::back()
				->with('message','Comment was added!');
		}

		return Redirect::back()
			->with('message', 'Something went wrong!');
	}

	public function postDelete() {
		$comment = Comment::find(Input::get('id'));

		if($comment) {
			$comment->delete();
			return Redirect::back()
				->with('message','Comment was deleted!');
		}
		return Redirect::back()
			->with('message', 'Something went wrong!');
	}
}