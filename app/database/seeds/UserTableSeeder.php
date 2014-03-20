<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$user = new User;
		$user->firstname = 'John';
		$user->lastname = 'Doe';
		$user->email = 'john@doe.com';
		$user->password = Hash::make('password');
		$user->phone = '099999999';
		$user->admin = '1';
		$user->save();
	}
}