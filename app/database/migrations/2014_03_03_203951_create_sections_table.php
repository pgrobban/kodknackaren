<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sections', function($table)
		{
			$table->increments('sectionID');
			$table->unsignedInteger('lessonID');
		 	$table->foreign('lessonID')->references('lessonID')->on('lessons');
		    $table->integer('orderInLesson');
		    $table->string('name');
		    $table->text('contentsHTML');

		    $table->text('code')->nullable();
		    $table->text('showImage')->nullable();
		    
		     // scripts
		    $table->text('beforeSectionLoadedEval')->nullable();
		    $table->text('afterSectionLoadedEval')->nullable();

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
		 Schema::drop('sections');
	}

}