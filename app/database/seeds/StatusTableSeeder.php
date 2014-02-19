<?php

class StatusTableSeeder extends Seeder
{
	public function run()
	{
		$statuses = array(
			array(
				'title' => 'Pending',
				'description' => 'Your order is pending'),
			array(
				'title' => 'Canceled',
				'description' => 'Your order was canceled'),
		);
		DB::table('statuses')->insert($statuses);
	}
}