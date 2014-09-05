<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
    	Eloquent::unguard();

        $this->call('CourseTableSeeder');

        $this->call('LessonTableSeeder');

        $this->call('SectionTableSeeder');

        $this->call('ExerciseTableSeeder');

        $this->call('ExerciseRequirementsTableSeeder');
        $this->call('ExerciseHintsTableSeeder');

        $this->call('UserTableSeeder');
    }
}


class CourseTableSeeder extends Seeder {

	public function run()
    {
        DB::table('courses')->delete();
        Course::create(array(
        	'courseID' => 1,
        	'courseName' => 'Programmering för nybörjare'
        ));
    }

}

class LessonTableSeeder extends Seeder {

	public function run()
    {
        DB::table('lessons')->delete();
        Lesson::create(array(
        	'courseID' => 1,
        	'orderInCourse' => 1,
        	'lessonName' => 'Allt har sin början'
        ));
        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 2,
            'lessonName' => 'Canvas - Datorn är en målarduk'
        ));
        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 3,
            'lessonName' => 'Variabler - När du behöver komma ihåg'
        ));
        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 4,
            'lessonName' => 'Visst funkar funktioner'
        ));
        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 5,
            'lessonName' => 'Villkor: När du ska fatta beslut'
        ));
        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 6,
            'lessonName' => 'Loopar - Måste jag upprepa mig själv?'
        ));

        Lesson::create(array(
            'courseID' => 1,
            'orderInCourse' => 7,
            'lessonName' => 'Praktikfall: Pong'
        ));
    }
    
}


class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        for ($i = 1; $i <= 10; $i++)
        {
	        User::create(array(
	        	'username' => 'user'.$i,
	        	'password' => Hash::make('test'),
	        	'email' => 'foo@bar.com'
	        ));
    	}
    }

}

