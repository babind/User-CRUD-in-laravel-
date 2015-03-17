<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',255);
			$table->integer('quiz_id')->unsigned();
			$table->foreign('quiz_id')->references('id')
														->on('quizzes')
														->onDelete('cascade');


			
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions',function($table)
		{
			$table->dropForeign('questions_quiz_id_foreign');

		});
		Schema::drop('questions');
		
	}

}
