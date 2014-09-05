<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersLessonsStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_lessons_status', function($table)
		{
			$table->increments('id');
			$table->unsignedInteger('userID');
		 	$table->foreign('userID')->references('userID')->on('users');
			$table->unsignedInteger('lessonID');
		 	$table->foreign('lessonID')->references('lessonID')->on('lessons');
		 	
		 	$table->integer('latestSectionID')->default(-1); // should be a references to sectionID on sections
		 	$table->unsignedInteger('percentComplete');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		 Schema::drop('users_lessons_status');
	}

}