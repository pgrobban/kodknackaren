<?php

class ExerciseTableSeeder extends Seeder {

	public function run()
    {
    	DB::table('exercises')->delete();
    	
    	Exercise::create(array(
    		'exerciseID' => 1,
    		'sectionID' => 109,
    		'mandatory' => true,
    		'pointsForCompletion' => 10,
    		'pointsCostForFailure' => 0
    		));
        Exercise::create(array(
            'exerciseID' => 2,
            'sectionID' => 126,
            'mandatory' => true,
            'pointsForCompletion' => 10,
            'pointsCostForFailure' => 0
            ));
        Exercise::create(array(
            'exerciseID' => 3,
            'sectionID' => 208,
            'mandatory' => true,
            'pointsForCompletion' => 15,
            'pointsCostForFailure' => 0
            ));
    	Exercise::create(array(
            'exerciseID' => 4,
            'sectionID' => 213,
            'mandatory' => true,
            'pointsForCompletion' => 10,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 5,
            'sectionID' => 313,
            'mandatory' => true,
            'pointsForCompletion' => 20,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 6,
            'sectionID' => 416,
            'mandatory' => true,
            'pointsForCompletion' => 10,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 7,
            'sectionID' => 418,
            'mandatory' => true,
            'pointsForCompletion' => 20,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 8,
            'sectionID' => 517,
            'mandatory' => true,
            'pointsForCompletion' => 20,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 9,
            'sectionID' => 522,
            'mandatory' => true,
            'pointsForCompletion' => 20,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 10,
            'sectionID' => 523,
            'mandatory' => true,
            'pointsForCompletion' => 50,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 11,
            'sectionID' => 604,
            'mandatory' => true,
            'pointsForCompletion' => 15,
            'pointsCostForFailure' => 0
        ));
        Exercise::create(array(
            'exerciseID' => 12,
            'sectionID' => 609,
            'mandatory' => true,
            'pointsForCompletion' => 30,
            'pointsCostForFailure' => 0
        ));
    }
}

?>