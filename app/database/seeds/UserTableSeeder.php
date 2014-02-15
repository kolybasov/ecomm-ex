<?php

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$user = new User;
		$user->firstname = 'Mykola';
		$user->lastname = 'Basov';
		$user->email = 'kolybasov@yandex.ru';
		$user->password = Hash::make('kalyan');
		$user->phone = '0988881089';
		$user->admin = '1';
		$user->save();
	}
}