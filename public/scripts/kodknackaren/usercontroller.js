function UserController(userID) {
	var outer = this;
	var USER_NOT_LOGGED_IN = -1;

	this.markExerciseAsPassed = function(exerciseID) {
		$.ajax({
		    url: sprintf('dbm/users/%d/exercises/%d/markAsPassed', userID, exerciseID),
		    type: 'POST',
		    success: function(result) {
		    }
		});
	}

	this.hasUserPassedExercise = function(exerciseID) {
		var ret = -1;

		$.ajax({
			type: 'GET',
			url: sprintf("dbm/exercises/passed-users/%d/%d", exerciseID, userID),
			async: false,
			success: function(data) {
				if (data === "User has passed")
					ret = true;
				else
					ret = false;
			}
		});
		return ret;
	}


	this.addPointsToUser = function(pointsToAdd) {
		var ret = -1;

		$.ajax({
			type: 'POST',
			url: "dbm/users/addPoints",
			async: false,
			data: {
				userID: userID,
				points: pointsToAdd
			},
			success: function(data) {
				console.log(sprintf("Added %d points to user with ID %d.", pointsToAdd, userID));
				ret = 0;
			}
		});
		return ret;
	}

	this.setLatestSectionID = function(latestSectionID, lessonID, percentComplete) {
		if (userID == USER_NOT_LOGGED_IN)
			return;

		$.ajax({
			type: 'POST',
			url: "dbm/users/latest-section-and-progress",
			data: {
				userID: userID,
				latestSectionID: latestSectionID,
				lessonID: lessonID,
				percentComplete: percentComplete
			},
			success: function(data) {
				console.log(sprintf("Set max sectionID to %d", latestSectionID));
				console.log(sprintf("Set percentage on lesson with lessonID %d to %d", lessonID, percentComplete));
			}
		});
	}

	this.getOrCreateLatestSectionIDForLesson = function(lessonID) {
		var ret = -1;
		$.ajax({
			type: 'GET',
			url: sprintf("dbm/users/getOrCreateLatestSectionIDForLesson/%d", lessonID),
			async: false,
			success: function(data) {
				ret = parseInt(data);
			}
		});
		console.log(sprintf("Maximum section ID for this lesson: %d", ret));
		return ret;
	}

	this.getLessonProgressForAllLessons = function() {
		if (userID == USER_NOT_LOGGED_IN)
			sectionController.setDropdownProgress();

		$.ajax({
			type: 'GET',
			url: sprintf("dbm/users/lesson-progress-for-all-lessons/%d", userID),
			async: false,
			success: sectionController.setDropdownProgress
		});
	}

	this.getLatestLessonID = function() {
		if (userID == USER_NOT_LOGGED_IN)
			return -1;

		var ret;

		$.ajax({
			type: 'GET',
			url: "dbm/users/latest-lesson-id",
			async: false,
			success: function(data) {
				ret = data;
			}
		});
		return ret;
	}

	this.setLatestLessonID = function(lessonID) {
		if (userID == USER_NOT_LOGGED_IN)
			return -1;

		$.ajax({
			type: 'POST',
			url: sprintf("dbm/users/latest-lesson-id/%d", lessonID),
		});
	}

}