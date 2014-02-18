<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->tinyinteger('payment');
			$table->integer('status_id')->unsigned()->default(1);
			$table->foreign('status_id')->references('id')->on('statuses');
			$table->integer('delivery_id')->unsigned();
			$table->foreign('delivery_id')->references('id')->on('deliveries');
			$table->string('address');
			$table->string('comment');
			$table->decimal('total', 6, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
