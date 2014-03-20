<?php

class UsersController extends BaseController
{
	
	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function getNewaccount()
	{
		return View::make('users.newaccount');
	}

	public function postCreate()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->phone = Input::get('phone');
			$user->save();

			return Redirect::to('users/signin')
				->with('message', 'Дякуємо за створення нового акаунту. Будь ласка, увійдіть!');
		}

		return Redirect::to('users/newaccount')
			->with('message', 'Щось пішло не так!')
			->withErrors($validator)
			->withInput();
	}

	public function getSignin()
	{		
		return View::make('users.signin');
	}

	public function postSignin()
	{
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
			return Redirect::to('/')
				->with('message', 'Доброго дня!');
		}

		return Redirect::to('users/signin')
			->with('message', 'Неправильні дані!');
	}

	public function getSignout()
	{
		Auth::logout();
		return Redirect::to('users/signin')
			->with('message', 'Ви успішно вийшли!');
	}
}