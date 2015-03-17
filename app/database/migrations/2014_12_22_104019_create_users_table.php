subl<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id', 11);
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->string('password', 60);
			$table->string('street_address', 100);
			$table->string('city', 100);
			$table->string('state', 100);
			$table->string('zip_code', 20);
			$table->string('country', 100);
			$table->string('mobile_phone', 100);
			$table->string('verification_code', 60);
			$table->boolean('is_verified');
			$table->timestamps();
			$table->rememberToken();
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
	}

}
