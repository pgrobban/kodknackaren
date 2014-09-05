<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('userID');
			$table->string('username', 16)->unique();
			$table->string('password', 255);
			$table->string('email');
			$table->integer('points');
			$table->text('memo');
			$table->integer('latestLessonID')->default(-1);

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
		 Schema::drop('users');
	}

}