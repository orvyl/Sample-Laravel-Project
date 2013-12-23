<?php

use Illuminate\Database\Migrations\Migration;

class Createregistrytable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registry', function($table){
			$table->increments('id');
			$table->string('user_id');
			$table->string('occasion_type');
			$table->string('adress');
			$table->string('suburb');
			$table->string('state_id');
			$table->string('postcode');
			$table->string('country_id');
			$table->string('contact');
			$table->string('email');
			$table->date('party_date');
			$table->string('currency');
			$table->boolean('another_address');
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
		Schema::drop('registry');
	}

}