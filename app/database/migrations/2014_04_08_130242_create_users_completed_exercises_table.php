<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersCompletedExercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_completed_exercises', function($table)
		{
			$table->increments('id')->unique();
			$table->unsignedInteger('exerciseID');
		 	$table->foreign('exerciseID')->references('exerciseID')->on('exercises');
			$table->unsignedInteger('userID');
		 	$table->foreign('userID')->references('userID')->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('users_completed_exercises');
	}

}
