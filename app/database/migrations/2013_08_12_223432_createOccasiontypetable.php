<?php

use Illuminate\Database\Migrations\Migration;

class CreateOccasiontypetable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occasion-types', function($table){
			$table->increments('id');
			$table->string('occasion_type');
			$table->text('description');
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
		Schema::drop('occasion-types');
	}

}