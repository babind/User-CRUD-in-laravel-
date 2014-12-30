<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',255);
			$table->text('description');
			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->integer('user_id');
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
		Schema::table('quizzes',function($table)
		{
			$table->dropForeign('quizzes_course_id_foreign');
		});
		Schema::drop('quizzes');
	}

}
