<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizAttempts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_attempts',function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('quiz_id');
			$table->timestamp();
			
			
		})
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quiz_attempts');
	}

}
