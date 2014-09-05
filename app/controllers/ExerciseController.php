<?php

class ExerciseController extends BaseController {

	public function getPassedUsers($exerciseID, $userID) {
		$exercise = Exercise::find($exerciseID);
	    if (!$exercise)
	        return "No such exercise";

	    if ($exercise->usersWhoPassed()
	        ->where('Users.userID', '=', $userID)->count()) {
	       return 'User has passed';
	    }
	    return 'User has failed';
	}


}

?>