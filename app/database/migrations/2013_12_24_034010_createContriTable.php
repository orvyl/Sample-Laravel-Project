<?php

use Illuminate\Database\Migrations\Migration;

class CreateContriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invited-contributors', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('registry_id');
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
		Schema::drop('invited-contributors');
	}

}