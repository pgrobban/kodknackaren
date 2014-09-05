<?php

use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exercises', function($table)
		{
			$table->increments('exerciseID');
			$table->unsignedInteger('sectionID');
		 	$table->foreign('sectionID')->references('sectionID')->on('sections');
			$table->boolean('mandatory');
			$table->integer('pointsForCompletion');
			$table->integer('pointsCostForFailure');

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
		 Schema::drop('exercises');
	}

}