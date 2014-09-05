function CodeRunnerController() 
{
	var outer = this;
        // latest code run statuses
    var CODE_NOT_RUN = -1, CODE_RUN_SUCCESS = 0, CODE_RUN_ERROR = 1;
        // the status of the latest run code:
   	this.codeRunStatus = CODE_NOT_RUN;
    		// if codeRunStatus is set to 1, this will hold the latest error message
	this.errorMessage = null;

	this.worker = null;
	this.outputFromLatestRun = null;
	this.userDefinedVariablesFromLatestRun = null;
	this.userDefinedVariableValuesFromLatestRun = null;

	this.NO_OUTPUT_MESSAGE = "Inget att visa";
	$("#run-output").text(this.noOutputMsg);

	// in case we will use our canvas stuff in other classes
	this.context = null;


	this.runCode = function() {

		if (editorController.codeHasErrors()) {
			alert("Du måste fixa felen (röda kryss) i koden innan du kan köra den.");
			outer.codeRunStatus = outer.CODE_NOT_RUN;
			return;
		}
	
		$("#run-output").text(outer.NO_OUTPUT_MESSAGE);
		// disable run button while running 
		$("#stop-code-button").prop('disabled', false);
		$("#run-code-button").prop('disabled', true);

		outer.userDefinedVariablesFromLatestRun = null;
		outer.userDefinedVariableValuesFromLatestRun = null;

		// reset the canvas when the code is run
		var canvas = document.createElement("canvas");
		var canvasJQuery = $(canvas);
		outer.context = canvas.getContext("2d");
        canvasJQuery.attr({
        	width: 1000,
        	height: 1000
        });
        $("#canvas-tab").empty();
        $("#canvas-tab").append(canvasJQuery);

		var userCode = editor.getValue();
		// prepend functions and variables for drawing on Canvas
		var codeWithMessages = '\n\
    function print  (data) { postMessage(["print", data.toString()]); } \n\
    function println(data) { postMessage(["print", data.toString() + "\\n"]); } \n\
    function alert  (data) { postMessage(["alert", data.toString()]); } \n\
    function confirm(data) { return postMessage(["confirm", data.toString()]); } \n\
    function prompt (data) { return postMessage(["prompt", data.toString()]); } \n\
    \n\
    var CanvasRenderingContext2D = function() { \n\
        this.fillStyle   = "black"; \n\
        this.font = "10px sans-serif"; \n\
        this.globalAlpha = 1.0; \n\
        this.lineCap = "butt"; \n\
        this.lineJoin = "miter"; \n\
        this.lineWidth = 1.0; \n\
        this.miterLimit = 10; \n\
        this.shadowBlur = 0; \n\
        this.shadowOffsetX = 0; \n\
        this.shadowOffsetY = 0; \n\
        this.strokeStyle = "black"; \n\
        this.textAlign = "start"; \n\
        this.textBaseline = "alphabetic"; \n\
    }; \n\
    ["arc", "arcTo", "beginPath", "bezierCurveTo", "clearRect", "clip", "closePath", "createLinearGradient", \n\
    "createPattern", "drawCustomFocusRing", "drawSystemFocusRing", "fill", "fillRect", "fillStyle", "fillText", "getLineDash", \n\
    "isPointInPath", "isPointInStroke", "lineTo", "moveTo", "quadraticCurveTo", "rect", "restore", "save", "scale", \n\
    "scrollPathIntoView", "setLineDash", "setTransform", "stroke", "strokeRect", "strokeText", "transform", "translate"] \n\
    .forEach(function(methodName) { \n\
        CanvasRenderingContext2D.prototype[methodName] = function() { \n\
    		var self = this; \n\
    		postMessage(["canvas", {called: methodName, args: Array.prototype.slice.call(arguments), currentObjectAttributes: this}]); \n\
		};\n\
    });\n\
	var myCanvas = new CanvasRenderingContext2D(); \n\
' + userCode;
		var codeWithMessagesAndExitValues = codeWithMessages + "\n\n\ \
var userDefinedVariables = Object.keys(self); \n\
var userDefinedVariableValues = Object.keys(self).map(function (key) { \n\
    if (typeof(self[key]) == 'function') \n\
    	return self[key].toString(); \n\
    else \n\
    	return self[key]; \n\
});\n\
\n\
		postMessage(['exit', userDefinedVariables, JSON.stringify(userDefinedVariableValues)]);";

		console.log("Running code:");
		console.log(codeWithMessagesAndExitValues);

		var blob = new Blob([codeWithMessagesAndExitValues], {type: 'application/javascript'});
		// Obtain a blob URL reference to our worker 'file'.
		var blobURL = window.URL.createObjectURL(blob);
		outer.worker = new Worker(blobURL);
		outer.worker.onerror = function(e) {
			var error = sprintf("<span class='red'>\nProgrammets körning avbröts med följande felmeddelande:\n%s</span>", e.message);
			outer.errorMessage = e.message;

			if ($("#run-output").text() == editorController.noOutputMsg)
    			$("#run-output").text("");
    		$("#run-output").append(error);
    		outer.codeRunStatus = outer.CODE_RUN_ERROR;

    		this.outputFromLatestRun = null;
    		outer.worker.terminate();
    		outer.worker = null;

    		enableButtons();
		}
		// handle messagest, calling window functions or exit and handle user return vars
		outer.worker.addEventListener('message', function (event) {
		    var method = event.data[0] || null;
		    var data   = event.data[1] || null;

		    if (method == "canvas") {
		        // Refreshing context attributes
		        var attributes = data.currentObjectAttributes;
		        for(var k in attributes) {
		            outer.context[k] = attributes[k];
		        }
			     // Calling method
		        var method = outer.context[data.called];
		        method.apply(outer.context, data.args);
		    } 
		    else if(method == "exit") {
		    	// close the worker 
		        outer.worker.terminate();
		        outer.worker = null;
		        // set statuses
		        outer.codeRunStatus = outer.CODE_RUN_SUCCESS;
		        outer.errorMessage = null;
		        outer.outputFromLatestRun = $("#run-output").text();
		        $("#run-output").append("<span class='code-run-success'>\nKörning klar</span>");
		        // set user variables
		        outer.userDefinedVariablesFromLatestRun = event.data[1];
		        console.log("Variables in latest run: ");
		        console.log(outer.userDefinedVariablesFromLatestRun);
		        outer.userDefinedVariableValuesFromLatestRun = JSON.parse(event.data[2]);
		        console.log("Values in latest run: ");
		        console.log(outer.userDefinedVariableValuesFromLatestRun);
		        enableButtons();
		    } 
		    else if(method == "alert") {
		        alert(data);
		    } 
		    else if(method == "confirm") {
		        confirm(data);
		    }
		    else if(method == "prompt") {
		        prompt(data);
		    } 
		    else if(method == "print") {
		    	if ($("#run-output").text() == editorController.noOutputMsg)
    				$("#run-output").text("");
		        $("#run-output").append(data);
		    } 
		}, false);
		// start the worker
    	outer.worker.postMessage();
	}


	this.stopCode = function() {
		if (outer.worker == null) {
			alert("Ingen kod körs just nu.");
		}
		else {
			$("#run-output").append("<span class='code-error'>\nKörning avbruten</span>");
			outer.worker.terminate();
			outer.worker = null;
			enableButtons();
		}
	}

	this.getOutputFromLatestRun = function() {
		return outer.outputFromLatestRun;
	}

	this.getUserVariableIndexFromLatestRun = function(variableName) {
		for (var i in outer.userDefinedVariablesFromLatestRun)
			if (outer.userDefinedVariablesFromLatestRun[i] == variableName)
				return parseInt(i);
		return -1;
	}

	this.getUserVariableValueFromLatestRun = function(variableName) {
		var foundIndex = outer.getUserVariableIndexFromLatestRun(variableName);
		return outer.userDefinedVariableValuesFromLatestRun[foundIndex];
	}

	function enableButtons() {
		$("#stop-code-button").prop('disabled', true);
		$("#run-code-button").prop('disabled', false);
	}

}