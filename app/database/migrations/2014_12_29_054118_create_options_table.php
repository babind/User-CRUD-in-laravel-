<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('options',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name',255);
			$table->tinyint('is_correct');
			$table->integer('question_id')->unsigned();
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

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
		Schema::table('options',function($table)
		{
			$table->dropForeign('options_question_id_foreign');

		});
		Schema::drop('options');

	}

}
