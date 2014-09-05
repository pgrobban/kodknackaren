<?php

class UserController extends BaseController {

	public function __construct() {
	}


	public function getOrCreateLatestSectionIDForLesson($lessonID) {
		if(Auth::check()) {
	        $maybeUserHasLesson = Auth::user()->lessonStatuses()->where('users_lessons_status.lessonID', '=', $lessonID)->first();
	        if ($maybeUserHasLesson)
	            return $maybeUserHasLesson->pivot->latestSectionID;
	        else
	            return Lesson::find($lessonID)->sections()->first()->sectionID;
	    }
	    else {
	        return -1;
		}
	}

	public function markExerciseAsPassed($userID, $exerciseID) {
		if (!Auth::check())
			return "USER NOT LOGGED IN";

		$user = User::find($userID);
		if ($user) {
			$exercise = Exercise::find($exerciseID);
			if ($exercise) {
    			$exercise->usersWhoPassed()->save($user);
			}
			else {
				return "Exercise with ID $exerciseID not found.";
			}
		}
		else {
			return "User with ID $userID not found.";
		}

	}

	public function getLessonProgressForAllLessons($userID) {
		$user = User::find($userID);
	    if ($user)
	        return $user->lessonStatuses()->get();
	    else {
	        //return "User with ID $userID not found.";
	        return -1;
	    }
	}


	public function postLatestSectionAndProgress() {
		$user = User::find(Input::get('userID'));
		if (!$user) {
			return  "User with ID $userID not found.";
		}
    	$lesson = Lesson::find(Input::get('lessonID'));
    	if (!$lesson) {
    		return "Lesson with ID $lessonID not found.";
    	}
    	$us = $user->lessonStatuses();
    	$us->attachOrUpdate($lesson->lessonID, 
        	["latestSectionID" => Input::get('latestSectionID'), "percentComplete" => Input::get('percentComplete')] );
	}

	public function addPoints() {
		$user = User::find(Input::get('userID'));
    	$user->points += Input::get('points');
    	$user->save();
	}

	public function getLatestLessonID() {
		if (Auth::user())
			return Auth::user()->latestLessonID;
	}

	public function postLatestLessonID($lessonID) {
		$user = Auth::user();
		$user->latestLessonID = $lessonID;
		$user->save();
	}

}

?>