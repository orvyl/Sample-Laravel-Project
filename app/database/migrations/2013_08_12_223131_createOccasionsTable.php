<?php

use Illuminate\Database\Migrations\Migration;

class CreateOccasionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occasions', function($table){
			$table->increments('id');
			$table->string('occasion_name');
			$table->string('occasion_type');
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
		Schema::drop('occasions');
	}

}