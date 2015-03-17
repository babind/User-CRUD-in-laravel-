<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizAttemptAnswers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_attempt_answers',function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_id')->unsigned();
			$table->foreign('question_id')->references('id')
														->on('questions')
														->onDelete('cascade');

			$table->integer('option_id')->unsigned();
			$table->foreign('option_id')->references('id')
															->on('options')
															->onDelete('cascade');

			$table->integer('quiz_attempt_id')->unsigned();
			$table->foreign('quiz_attempt_id')->references('id')
																->on('quiz_attempts')
																->onDelete('cascade');
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
		Schema::table('quiz_attempt_answers',function($table)
		{
			$table->dropForeign('quiz_attempt_answers_question_id_foreign');
			$table->dropForeign('quiz_attempt_answers_option_id_foreign');
			$table->dropForeign('quiz_attempt_answers_quiz_attempt_id_foreign');

		});
		Schema::drop('quiz_attempt_answers');
		
	}

}
