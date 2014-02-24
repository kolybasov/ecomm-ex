<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificationProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specification_product', function($table) {
			$table->increments('id');
			$table->integer('specification_id')->unsigned();
			$table->foreign('specification_id')->references('id')->on('specifications');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specification_product');
	}

}
