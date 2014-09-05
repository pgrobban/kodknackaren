/* create a controller for an exercise with the ID exerciseID */
function ExerciseController(exerciseJSON) {
	
    var outer = this;

    this.exerciseJSON = exerciseJSON;
    this.pointsForCompletion = null;
    this.pointsCostForFailure = null;
    this.currentExerciseWorth = null;

    this.numberOfHints = null;
    this.numberOfBoughtHints = 0;

    this.hasError = false;

    this.userPassedExercise = false;


    this.setup = function() {

        outer.pointsForCompletion = parseInt(exerciseJSON['pointsForCompletion']);
        outer.currentExerciseWorth = outer.pointsForCompletion;

        outer.setStatusText();
         // reset requirements and hints
        $("#requirements-table").empty();
        $("#hints-table").empty();

        outer.numberOfHints = outer.exerciseJSON['hints'].length;

        outer.createRequirementsTable();
        outer.createHintsTable();

        $("#grade-code-button").prop("disabled", true);

        // user needs to run the code at least once to grade the exericse
        this.hasUserRunCode = false;
        $("#run-code-button").click(function() { 
            outer.hasUserRunCode = true;
            $("#grade-code-button").prop("disabled", false);
        });

        $("#grade-code-button").off("click");
        $("#grade-code-button").on("click", outer.gradeCode);

        $("#get-hint-button").off("click"); // replace previous exercise controllers
        $("#get-hint-button").on("click", outer.checkHint);
    };

    this.setStatusText = function() {
        var exerciseStatusText = null;
        if (userController.hasUserPassedExercise(parseInt(outer.exerciseJSON['exerciseID'])))
            exerciseStatusText = "<span class='orange'>Klart!</span> Du har redan klarat den här övningen och kan därför inte få fler poäng."
        else {
            exerciseStatusText = sprintf("Den här övningen är just nu värd <strong>%d</strong> poäng.", outer.currentExerciseWorth);
            outer.pointsCostForFailure = parseInt(exerciseJSON['pointsCostForFailure']);

            if (outer.pointsCostForFailure === 0) {
                exerciseStatusText = sprintf("%s Den här övningen ger inga poängavdrag för underkända rättningar.", exerciseStatusText);
            }
            else {
                exerciseStatusText = sprintf("%s En underkänd rättning ger dig %d poängs avdrag.", exerciseStatusText, outer.pointsCostForFailure);
            }
        }
        $("#exercise-status").html(exerciseStatusText);
    }

    this.createRequirementsTable = function() {
        $("#requirements-li").text(sprintf("Krav (%d)", outer.exerciseJSON['requirements'].length));
        for (var i in outer.exerciseJSON['requirements']) {
            var tr = $("<tr></tr>");

            tr.append($("<td class='requirement-check requirement-not-graded'></td>"));
            var td = $("<td class='requirement-description'></td>");
            td.html(exerciseJSON['requirements'][i]['descriptionHTML']);
            tr.append(td);

            $("#requirements-table").append(tr);
        }
    }

    this.createHintsTable = function() {
        $("#hints-li").text(sprintf("Ledtrådar", outer.numberOfHints));

        if (outer.numberOfHints == 0) {
            $("#get-hint-button").prop("disabled", true);
            $("#get-hint-button").text(sprintf("Ledtråd"));
            $("#hints-table").append($("<tr><td>Det finns inga ledtrådar för denna övning.</td></tr>"));
        }
        else {
            $("#get-hint-button").prop("disabled", false);
            var hintCost = parseInt(outer.exerciseJSON['hints'][outer.numberOfBoughtHints]['hintCost']);
            $("#get-hint-button").attr("title", sprintf("Klicka här för att byta en ledtråd mot %d poäng av övningens poängvärde.", hintCost));
            $("#get-hint-button").text(sprintf("Ledtråd (%d)", outer.numberOfHints));
            $("#hints-table").append($(sprintf('<tr><td>Det finns %d ledtrådar till denna övning. Klicka på knappen Ledtråd ovan om du vill byta poäng mot en ledtråd.</td></tr>', outer.numberOfHints)));
        }
    }

    this.checkHint = function() {
        $("#hints-li").trigger('click'); // set the hints tab
        $(".tipsy").remove(); 

        var hintCost = parseInt(outer.exerciseJSON['hints'][outer.numberOfBoughtHints]['hintCost']);
        var c = confirm(sprintf("Att köpa nästa ledtråd kommer att minska övningens totala poängantal med %d poäng. Vill du fortsätta?", hintCost));
        if (c)
            outer.buyHint(hintCost);
    }

    this.buyHint = function(hintCost) {
        if (outer.numberOfBoughtHints == 0) {
            $("#hints-table").empty();
        }
        var nextHint = outer.exerciseJSON['hints'][outer.numberOfBoughtHints++]['hintHTML'];
        $("#hints-table").append($(sprintf("<tr><td>%s</td></tr>", nextHint)));
        $("#get-hint-button").text(sprintf("Ledtråd (%d)", (outer.numberOfHints - outer.numberOfBoughtHints)));

        if (outer.numberOfBoughtHints == outer.numberOfHints) {
            $("#get-hint-button").prop("disabled", true);
        }
        else {
            var hintCost = parseInt(outer.exerciseJSON['hints'][outer.numberOfBoughtHints]['hintCost']);
            $("#get-hint-button").attr("title", sprintf("Klicka här för att byta en ledtråd mot %d poäng av övningens poängvärde.", hintCost));
        }
        outer.currentExerciseWorth -= hintCost;
        outer.setStatusText();
    }



    this.gradeCode = function() {
        $(".tipsy").remove(); 

        var allRequirementsMet = true;

        for (var i in outer.exerciseJSON['requirements']) {
            var requirementMet = null;
            eval(outer.exerciseJSON['requirements'][i]['requirementMetEval']);
            var requirementCell = $(".requirement-check:eq(" + i + ")");

            requirementCell.removeClass("requirement-not-graded");
            requirementCell.removeClass("requirement-met");
            requirementCell.removeClass("requirement-not-met");


            if (requirementMet) {
                requirementCell.addClass("requirement-met");
            }
            else {
                requirementCell.addClass("requirement-not-met");
                allRequirementsMet = false;
            }
        }
        $("#grade-code-button").prop("disabled", true);
        if (allRequirementsMet) {
            $("#next-section-button").prop("disabled", false);
            $("#section-contents").html("<p class='green'>Bra jobbat :)</p><p>Tryck på <span class='icon-floppy'> om du vill spara den här koden eller </span> <span class='icon-right-outline'></span> för att fortsätta.</p>");
            outer.passExercise();
            outer.hasError = false; // not that it matters, but..
        }
        else {
            if (!outer.hasError) {
                $("#section-contents").html("<p class='red'>Tyvärr uppfylldes inte ett eller flera av kraven på checklistan. Fixa koden och kör den igen. Tryck sedan på <span class='icon-ok green'>Rätta</span> för att rätta övningen igen.</p><hr/>"
                 + $("#section-contents").html());
                outer.hasError = true;
            }
        }
    }

    this.passExercise = function() {
        if (outer.userPassedExercise)
            return; 

        var exerciseID = parseInt(outer.exerciseJSON['exerciseID']);
        if (userController.hasUserPassedExercise(exerciseID)) {
            return;
        }
        outer.userPassedExercise = true;
        sectionController.markExerciseAsPassed();

        // add points
        var currentPoints = parseInt($("#current-user-points").text());
        var newPoints = currentPoints + outer.currentExerciseWorth;

        $("#current-user-points").addClass("big-points", 1000, function() {
            $("#current-user-points").countTo({
                from: currentPoints,
                to: newPoints,
                speed: 1000,
                onComplete: function() { $("#current-user-points").removeClass("big-points", 1000); }
            });
        });
        $("#exercise-status").html(sprintf("<span class='green'>Klart!</span> Du är godkänd på denna övning och har blivit tilldelad %s poäng.", outer.currentExerciseWorth));

        userController.markExerciseAsPassed(exerciseID);
        userController.addPointsToUser(outer.currentExerciseWorth);
    }


}