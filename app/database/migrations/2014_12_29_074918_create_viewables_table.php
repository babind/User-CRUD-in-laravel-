<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('viewables',function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('resource_id');
			$table->integer('user_id');
			$table->string('ip_address',255);
			$table->timestamp();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('viewables');
	}

}
