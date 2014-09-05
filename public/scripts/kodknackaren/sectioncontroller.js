function SectionController(editor)
{

	// setup initial data

	// make inner functions have access to "global" vars
	var outer = this;
	this.editor = editor;
	this.lessonID = null;
	this.lessonNr = null;

    // the lesson contents and hints which we will retrieve from the database
    this.lessonJSON = null;

    this.sectionsWithExercisesIndexes = null;
    this.numberOfExercisesInLesson = null;
    this.numberOfCompletedExercises = null;
    this.progressBarDivClasses = null;
    this.progressPercent = null;

	// the 0-based index of the current section
    this.currentSection = null;
    // the furthest the user has reached in this lesson
    this.maxSection = 0;

    this.currentCode = null;
	this.currentImage = null;


    this.setup = function() {
    	var gotLessonID = parseInt(userController.getLatestLessonID());
    	if (gotLessonID == -1)
    		gotLessonID = 1;
    	outer.lessonID = gotLessonID;

		outer.getLessonJSON();
		outer.setLessonData();


	    var latestSectionID = userController.getOrCreateLatestSectionIDForLesson(outer.lessonID);
	    var sectionNrWithLatestID = outer.findSectionWithID(latestSectionID);
	    if (sectionNrWithLatestID === -1)
			outer.currentSection = 0;
		else
			outer.currentSection = sectionNrWithLatestID;
		outer.maxSection = outer.currentSection;

	    outer.handleNewSection(sectionNrWithLatestID);
	};


	// get ID and name for this lesson, and set the lesson name in the view. needs to be
	// synchronous to set lessonID before performing the next step.
	this.getLessonJSON = function() {
		$.ajax({
	        type: "GET",
	        url: sprintf("dbm/courses/lesson-with-id/%d/%d", 1, outer.lessonID),
	        async: false
	    }).done(function(data) {
	    	outer.lessonJSON = data;
	    });
	}

	this.setLessonData = function() {
		userController.setLatestLessonID(outer.lessonID);

		outer.lessonNr = parseInt(outer.lessonJSON['orderInCourse']);
		$("#lesson-nr").text(sprintf("Lektion %d", outer.lessonNr));
	    $("#lesson-name").text(outer.lessonJSON['lessonName']);
	    outer.numberOfSections = outer.lessonJSON['sections'].length;
		outer.sectionsWithExercisesIndexes = outer.getExerciseIndexes();
		outer.numberOfCompletedExercises = 0;
		outer.numberOfExercisesInLesson = 0;
	}


	this.handleNewSection = function() {

		outer.setProgressDivs();
	    outer.refreshProgress();

	    if (!outer.isSectionExercise(outer.currentSection)) {
	    	$("#exercise-box").hide();
	    }

	    outer.showNewSection();
	}



	this.setProgressDivs = function() {
 		// fill progress bar div with .future divs
	    outer.progressBarDivClasses = Array.apply(null, new Array(outer.numberOfSections)).map(String.prototype.valueOf,"future");

	    var i = 0;
	    	// set divs from section 0 to currentSection-1
		for (; i < outer.currentSection; i++) {
			if (outer.isSectionExercise(i)) {
				outer.numberOfExercisesInLesson++;
	    		outer.numberOfCompletedExercises++;
	    		outer.progressBarDivClasses[i] = "past-exercise";
			}
			else {
				outer.progressBarDivClasses[i] = "past";
			}
		}
		// set for current section
		if (outer.isSectionExercise(i)) {
			outer.numberOfExercisesInLesson++;
			var exerciseID = parseInt(outer.lessonJSON['sections'][i]['exercise']['exerciseID']);
		    if (userController.hasUserPassedExercise(exerciseID)) {
		    	outer.numberOfCompletedExercises++;
		    	outer.progressBarDivClasses[i] = "past-exercise";
		    }
		    else {
		    	outer.progressBarDivClasses[i] = "current-exercise";
		    }
		}
		else {
			outer.progressBarDivClasses[i] = "current";
		}
		// set for future sections 
		for (i=i+1; i < outer.lessonJSON['sections'].length; i++) {
			if (outer.isSectionExercise(i)) {
				outer.numberOfExercisesInLesson++;
				outer.progressBarDivClasses[i] = "future-exercise";
			}
		}
	}




	// returns an array with the indexes of sections that have exercises
	this.getExerciseIndexes = function() {
		var exerciseIndexes = [];

		for (var i = 0; i < outer.numberOfSections; i++) {
			var element = outer.lessonJSON['sections'][i]['exercise'];
			if (element != undefined)
				exerciseIndexes.push(i);
		}

		return exerciseIndexes;
	}


    // helper methods for setup

    this.isSectionExercise = function(sectionNr) {
    	return outer.sectionsWithExercisesIndexes.indexOf(sectionNr) != -1;
	}
	this.refreshProgress = function() {
		userController.getLessonProgressForAllLessons();
		// progress bar
    	$("#progress").html("");
    	for (var i = 0; i < outer.numberOfSections; i++)
    	{
    		var newDiv = outer.createDiv(outer.progressBarDivClasses[i]);
    		$("#progress").append(newDiv);
    	}
    	outer.refreshProgressTexts();
    	outer.setProgressPercent();
    }

    this.setDropdownProgress = function(lessonData) {
    	console.log("Got the following lesson and progress data: ");
    	console.log(lessonData);

    	$("#lessons-progress-list").empty();

    	if (lessonData == -1) {
    		$("#lessons-progress-list").append($("<li>Du kan inte se lektionslistan eftersom du inte är inloggad.</li>"));
    	}
    	else {
			for (var i in lessonData) {
				var a = $(sprintf("<li>%d. %s %d%%</li>", parseInt(lessonData[i]['orderInCourse']), lessonData[i]['lessonName'], parseInt(lessonData[i]['pivot']['percentComplete'])));
				$("#lessons-progress-list").append(a);
			}
		}
    }

    this.createDiv = function(type) {
    	var divStr = sprintf('<div class="progress-bar progress-bar-%s" style="width: %f%%"></div>', type, 100/outer.numberOfSections);
		return $(divStr);
    }
    this.refreshProgressTexts = function() {
    	$("#progress-sections").text(sprintf("Avsnitt %d/%d", outer.currentSection+1, outer.numberOfSections));
    	$("#progress-exercises").text(sprintf("%d/%d övningar klara", outer.numberOfCompletedExercises, outer.numberOfExercisesInLesson));
    }
    this.setProgressPercent = function() {
    	// weigh equally between section progress and completed exercises
    	var sectionsWeight = Math.round((outer.maxSection+1) / outer.numberOfSections * 50);
    	var exerciseWeight = 0;
    	if (outer.numberOfExercisesInLesson == 0)
    		sectionsWeight *= 2;
    	else
			exerciseWeight = Math.round(outer.numberOfCompletedExercises / outer.numberOfExercisesInLesson * 50)

		outer.progressPercent = sectionsWeight + exerciseWeight;
    	$("#progress-percent").text(sprintf("%d%%", outer.progressPercent));
    }
    /* methods */ 

    this.nextSection = function() {
    	$(".tipsy").remove(); 

    	if (outer.isSectionExercise(outer.currentSection))
    		outer.progressBarDivClasses[outer.currentSection] = "past-exercise";
    	else
			outer.progressBarDivClasses[outer.currentSection] = "past";

		outer.currentSection++;

		if (outer.currentSection > outer.maxSection) {
			outer.maxSection = outer.currentSection;
			outer.setProgressPercent();

			var currentSectionID = parseInt(outer.lessonJSON['sections'][outer.maxSection]['sectionID']);
			var currentLessonID = parseInt(outer.lessonJSON['lessonID']);
			var percentage = outer.progressPercent;
			userController.setLatestSectionID(currentSectionID, currentLessonID, percentage);
		}

		outer.showNewSection();
	    outer.refreshProgress();

	};

	this.previousSection = function() {
		 $(".tipsy").remove(); 
	   
		if (outer.isSectionExercise(outer.currentSection)) {
			if (!userController.hasUserPassedExercise(parseInt(outer.lessonJSON['sections'][outer.currentSection]['exercise']['exerciseID'])))
				outer.progressBarDivClasses[outer.currentSection] = "future-exercise";
			else
				outer.progressBarDivClasses[outer.currentSection] = "past-exercise";
		}
		else
			outer.progressBarDivClasses[outer.currentSection] = "past";
		outer.currentSection--;


		outer.showNewSection();


	    outer.refreshProgress();
	   
	}

	this.handleExerciseBox = function() {
		if (outer.isSectionExercise(outer.currentSection)) {
			if (userController.hasUserPassedExercise(parseInt(outer.lessonJSON['sections'][outer.currentSection]['exercise']['exerciseID'])) === false)
	    		$("#next-section-button").prop({'disabled' : true});
	    	$("#editor").css("height", "25pc");
	    	$("#exercise-box").fadeIn(1000);

	    	var exerciseController = new ExerciseController(outer.lessonJSON['sections'][outer.currentSection]['exercise']);
	    	exerciseController.setup();

	    	outer.editor.setAutoScrollEditorIntoView();
	    }
	    else {
	    	outer.progressBarDivClasses[outer.currentSection] = "current";
	        $("#next-section-button").prop({'disabled' : false});
	        $("#exercise-box").fadeOut(1000);
	        $("#editor").css("height", "700px");
	    	outer.editor.setAutoScrollEditorIntoView();
	    }
	}

	// assumes that exercise is at the current section
	this.markExerciseAsPassed = function() {
		outer.progressBarDivClasses[outer.currentSection] = "past-exercise";
		outer.numberOfCompletedExercises++;
		outer.refreshProgress();
	}


	this.showNewSection = function() {
		console.log(sprintf("Now on section %d, sectionID %d", outer.currentSection, parseInt(outer.lessonJSON['sections'][outer.currentSection]['sectionID'])));

	    eval(outer.lessonJSON['sections'][outer.currentSection]['beforeSectionLoadedEval']);

	    $("#run-output").text(codeRunnerController.NO_OUTPUT_MESSAGE);
	    $("#canvas-tab").empty().append($("<canvas width='1000' height='1000'/>"));


    	if (outer.isSectionExercise(outer.currentSection))
    		if (userController.hasUserPassedExercise(parseInt(outer.lessonJSON['sections'][outer.currentSection]['exercise']['exerciseID'])))
				outer.progressBarDivClasses[outer.currentSection] = "past-exercise";
			else
				outer.progressBarDivClasses[outer.currentSection] = "current";
    	else
			outer.progressBarDivClasses[outer.currentSection] = "current";

		// replace contents of section-contents
		$("#section-contents").stop().fadeOut(300, function() { 
			$(this).html(outer.lessonJSON['sections'][outer.currentSection]['contentsHTML']); 
			$(this).stop().fadeIn(300); 
		});

    	var sectionImage = outer.lessonJSON['sections'][outer.currentSection]['showImage'];
    	var sectionCode = outer.lessonJSON['sections'][outer.currentSection]['code'];

		if (sectionImage == null && sectionCode == null) {
			$("#middle-image, #section-middle, #section-right").stop().fadeOut(1000);
			outer.currentCode = null;
			outer.currentImage = null;
		}
		else if (sectionImage != null && sectionCode == null) {
			$("#section-middle, #section-right").stop().fadeOut(1000, function() {
				if (outer.currentImage == sectionImage)
					;
				else {
					$("#middle-image").fadeOut(1000, function() {
						$("#middle-image").empty();
						var img = $(sprintf("<img src='images/lessons/%s/'>", sectionImage));
						$("#middle-image").append(img);
						$("#middle-image").stop().fadeIn(2000);
					});
				}
				outer.currentImage = sectionImage;
				outer.currentCode = null;
			});	
		}
		else if (sectionImage == null && sectionCode != null)
		{
			$("#middle-image").stop().fadeOut(500, function() {
				$("#section-middle, #section-right").stop().fadeIn(1000, function() {
					if (sectionCode === 'EMPTY') {
						editor.setValue("");
					}
					else if (sectionCode === "SAME") {

					}
					else {
						editor.setValue(sectionCode);
						editor.selection.clearSelection();
					}
					$("#middle-image").hide(); // in case user went too fast
				});
			});

			outer.currentCode = sectionCode;
			outer.currentImage = null;
		}
		outer.handleExerciseBox();

		// special for some sections
        $("#canvas-li").off( "click", outer.nextSection );
        $("#run-code-button").off( "click", outer.nextSection );

        // override the next and previous buttons for beginning and end of lessons
        setPreviousAndNextButtons();


	    eval(outer.lessonJSON['sections'][outer.currentSection]['afterSectionLoadedEval']);
	}

	/* 
		Helpers 
	*/

	this.nextLesson = function() {
		outer.maxSection = ++outer.currentSection;
		outer.setProgressPercent();

		var currentSectionID = parseInt(outer.lessonJSON['sections'][outer.currentSection-1]['sectionID']);
		var currentLessonID = parseInt(outer.lessonJSON['lessonID']);
		var percentage = outer.progressPercent; 
		userController.setLatestSectionID(currentSectionID, currentLessonID, percentage);
		
		
		outer.lessonID++; // assuming that next lesson has next ID
		outer.getLessonJSON();
		outer.setLessonData();
		
		var lessonID = parseInt(outer.lessonJSON['lessonID']);
	    var latestSectionID = userController.getOrCreateLatestSectionIDForLesson(lessonID);
	    var sectionNrWithLatestID = outer.findSectionWithID(latestSectionID);
		outer.maxSection = sectionNrWithLatestID;
		outer.currentSection = 0;

	    outer.handleNewSection(outer.currentSection);

		setPreviousAndNextButtons();
	}

	this.previousLesson = function() {		
		outer.lessonID--; // assuming that prev lesson has prev ID
		outer.getLessonJSON();
		outer.setLessonData();
		
		var lessonID = parseInt(outer.lessonJSON['lessonID']);
	    var latestSectionID = userController.getOrCreateLatestSectionIDForLesson(lessonID);
	    var sectionNrWithLatestID = outer.findSectionWithID(latestSectionID);
		outer.maxSection = sectionNrWithLatestID;
		outer.currentSection = outer.maxSection;

	    outer.handleNewSection(outer.currentSection);

		setPreviousAndNextButtons();
	}

	function setPreviousAndNextButtons() {
	    if (outer.currentSection === 0 && outer.lessonID === 1) {
	    	$("#previous-section-button").prop({'disabled' : true});
	    }
	    else {
			$("#previous-section-button").prop({'disabled' : false});
	    }

		if (outer.currentSection == outer.lessonJSON['sections'].length -1) {
        	$("#next-section-button").removeClass("icon-right-outline");
        	$("#next-section-button").addClass("icon-fast-forward");
        	$("#next-section-button").attr("title", "Nästa lektion");

        	$("#next-section-button").off("click");
        	$("#next-section-button").on("click", sectionController.nextLesson );
        }
        else {
        	$("#next-section-button").removeClass("icon-fast-forward");
        	$("#next-section-button").addClass("icon-right-outline");
        	$("#next-section-button").attr("title", "Nästa avsnitt");

        	$("#next-section-button").off("click");
        	$("#next-section-button").on("click", sectionController.nextSection );
        }
        if (outer.currentSection == 0) {
        	$("#previous-section-button").removeClass("icon-left-outline");
        	$("#previous-section-button").addClass("icon-rewind");
        	$("#previous-section-button").attr("title", "Föregående lektion");

        	$("#previous-section-button").off("click");
        	$("#previous-section-button").on("click", sectionController.previousLesson );
        }
        else {
        	$("#previous-section-button").removeClass("icon-rewind");
        	$("#previous-section-button").addClass("icon-left-outline");
        	$("#previous-section-button").attr("title", "Föregående avsnitt");

        	$("#previous-section-button").off("click");
        	$("#previous-section-button").on("click", sectionController.previousSection );
        }
	}

	// gets the default code for the current section
	this.getDefaultCode = function() {
		return outer.lessonJSON['sections'][outer.currentSection]['code'];
	}

	// returns the ordinal(0-based) section in this lesson that has the given sectionID
	// or returns -1 if not found.
	this.findSectionWithID = function(sectionID) {
		for (var i = 0; i < outer.lessonJSON['sections'].length; i++) {
			if (outer.lessonJSON['sections'][i]['sectionID'] == sectionID) {
				return i;
			}
		}
		return -1;
	}




}