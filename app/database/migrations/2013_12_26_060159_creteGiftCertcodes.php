<?php

use Illuminate\Database\Migrations\Migration;

class CreteGiftCertcodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('giftcerts-code', function($table){
			$table->increments('id');
			$table->string('user_id');
			$table->string('gc_id');
			$table->boolean('available');
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
		Schema::drop('giftcerts-code');
	}

}