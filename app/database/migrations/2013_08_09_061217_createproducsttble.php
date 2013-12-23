<?php

use Illuminate\Database\Migrations\Migration;

class Createproducsttble extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id');
			$table->string('product_name');
			$table->text('short_description');
			$table->text('product_details');
			$table->string('tags');
			$table->decimal('price',5,2);
			$table->string('validity');
			$table->boolean('free_exchange');
			$table->date('delivery_date');
			$table->decimal('delivery_cost',5,2);
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
		Schema::drop('products');
	}

}