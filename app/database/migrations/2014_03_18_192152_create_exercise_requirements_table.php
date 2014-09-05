<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exerciseRequirements', function($table)
		{
			$table->increments('requirementID');
			$table->unsignedInteger('exerciseID');
		 	$table->foreign('exerciseID')->references('exerciseID')->on('exercises');
		 	$table->string("descriptionHTML");
		    $table->text('requirementMetEval');

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
		 Schema::drop('exerciseRequirements');
	}

}
?>