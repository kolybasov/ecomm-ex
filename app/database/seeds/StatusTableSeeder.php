<?php

class StatusTableSeeder extends Seeder
{
	public function run()
	{
		$statuses = array(
			array(
				'title' => 'Розглядається…',
				'description' => 'Ваше замовлення очікує розгляду!'),
			array(
				'title' => 'Відмінено',
				'description' => 'Ваше замовлення було відмінено!'),
		);
		DB::table('statuses')->insert($statuses);
	}
}