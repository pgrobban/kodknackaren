<?php

use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('lessons', function($table)
		 {
		        $table->increments('lessonID');
		 		$table->unsignedInteger('courseID');
		 		$table->foreign('courseID')->references('courseID')->on('courses');
		        $table->integer('orderInCourse');
		        $table->string('lessonName', 50);

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
		 Schema::drop('lessons');
	}

}