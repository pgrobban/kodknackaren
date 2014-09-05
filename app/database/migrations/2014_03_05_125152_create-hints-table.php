<?php

use Illuminate\Database\Migrations\Migration;

class CreateHintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hints', function($table)
		{
			$table->increments('hintID');
			$table->unsignedInteger('exerciseID');
		 	$table->foreign('exerciseID')->references('exerciseID')->on('exercises');
			$table->integer('hintCost');
			$table->text('hintHTML');

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
		 Schema::drop('hints');
	}

}