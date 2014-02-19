<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_product', function($table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
			$table->integer('order_id')->unsigned();
			$table->foreign('order_id')->references('id')->on('orders');
			$table->smallinteger('count');
			$table->decimal('price', 6, 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_product');
	}

}
