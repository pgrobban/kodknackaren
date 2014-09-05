<?


class CourseController extends BaseController {


	public function getLessonWithID($courseID, $lessonID) {
		return Lesson::with('sections.exercise.requirements', 'sections.exercise.hints')->
        where('courseID', '=', $courseID)->
        where('orderInCourse','=',$lessonID)->firstOrFail();
	}


}

?>