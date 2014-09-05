function EditorController(editor)
{
	var outer = this;
	this.editor = editor;

	this.editor.setTheme("ace/theme/xcode");
	this.editor.getSession().setMode("ace/mode/javascript");
	this.editor.resize();

	this.searchBoxStatus = 0; // 0 = hidden, 1 = search, 2 = replace

	this.noOutputMsg = "Inget att visa";
	$("#run-output").text(this.noOutputMsg);
	this.copiedText = "";



	// quick fix to remove stuck tooltips on clicks
	$("button").click(function() { $(".tipsy").remove(); } );
	// force focus on editor except when notepad is open
	$("body").click(function(){
	    if (!$("#notepad").is(":focus")) {
	        $(".ace_text-input").focus();
	    }
	});



	// returns true if the code editor has errors
	this.codeHasErrors = function()
	{
		var annot = editor.getSession().getAnnotations();
	    if (annot.length > 0) {
	    	for (k in annot) {
	    		if (annot[k]["type"] == "error") {
	    			$("#run-code-button").prop('disabled', true);
	    			return true;
	    		}
	    	}
	    }
	    return false;
	}


	// disable run button on errors
	editor.getSession().on("changeAnnotation", function(){

	    if (outer.codeHasErrors())
	    	$("#run-code-button").prop('disabled', true);
	    else {
	    	$("#run-code-button").prop('disabled', false);
	    }

	});


	/* Bind shortcuts and actions to buttons */
			// initial setup to handle focus on iput fields
	Mousetrap.stopCallback = function () { return false; }

	function bindAction(shortcut, button, fn) {
		Mousetrap.bind(shortcut, function(e) {
			button.addClass("button-activated");
			setTimeout(function() {button.removeClass("button-activated")}, 250);
		    fn();
		    return false; //stop browser default actions
		});
		button.click(function() {
			fn();
		});
	}

	bindAction("mod+enter", $("#run-code-button"), codeRunnerController.runCode);
	bindAction("mod+shift+enter", $("#stop-code-button"), codeRunnerController.stopCode);
	bindAction("mod+c", $("#copy-button"), copy);
	bindAction("mod+x", $("#cut-button"), cut);
	bindAction("mod+v", $("#paste-button"), paste);
	bindAction("mod+z", $("#undo-button"), undo);
	bindAction("[ctrl+y], [cmd+shift+z]", $("#redo-button"), redo);
	bindAction("mod+f", $("#search-button"), search);
	bindAction("mod+f+f", $("#replace-button"), replace);
	bindAction("mod+m", $("#memo-button"), openMemo);
	bindAction("mod+s", $("#save-button"), saveCode);
	bindAction("", $("#trash-button"), resetCode);
	



	function cut() {
		var range = editor.getSelectionRange();
        editor._emit("cut", range);

        if (!editor.selection.isEmpty()) {
        	outer.copiedText = editor.session.getTextRange(editor.getSelectionRange());
			$("#paste-button").prop("disabled", false);

            editor.session.remove(range);
            editor.clearSelection();
        }
	}

	function copy() {
		var range = editor.getSelectionRange();
        editor._emit("copy", range);

        if (!editor.selection.isEmpty()) {
        	outer.copiedText = editor.session.getTextRange(editor.getSelectionRange());
			$("#paste-button").prop("disabled", false);
        }
	}


	function paste() {
		editor.insert(outer.copiedText);
		 $(".ace_text-input").focus();
	}



	function saveCode() {
		var code = editor.getValue();
	    $.post("/saver", { data: code }).done(function() { window.location.assign("/saver") });
	}

	function undo() {
		var um = editor.getSession().getUndoManager();
		um.undo();
		$("#redo-button").prop({'disabled': false});

		if (!um.hasUndo())
		{
			$("#undo-button").prop({'disabled': true});
		}
	}

	function redo() {
		var um = editor.getSession().getUndoManager();
		um.redo();
		$("#undo-button").prop({'disabled': false});

		if (!um.hasRedo())
		{
			$("#redo-button").prop({'disabled': true});
		}
	}

	function search() {
		if (this.searchBoxStatus == 1)
		{
			editor.searchBox.hide();
			this.searchBoxStatus = 0;
		}
		else
		{
			editor.execCommand("find");
			this.searchBoxStatus = 1;
		}
	}
	function replace() {
		if (this.searchBoxStatus == 2)
		{
			editor.searchBox.hide();
			this.searchBoxStatus = 0;
		}
		else
		{
			editor.execCommand("replace");
			this.searchBoxStatus = 2;
		}	
	}


	function openMemo() {
		$.colorbox({inline:true, width:"50%", height: "50%", close:"stäng", href: $("#memo-div"),   
			onClosed: function() {
                 $('#memo-div').hide();
                 editor.focus();
            },
            onOpen: function() {
                 $('#memo-div').show();
            },
            onComplete: function() {
                 $("#notepad").focus();
            }
           }); 
	}

	function resetCode() {
		editor.setValue(sectionController.getDefaultCode());
	}




	/*
	// listen to changes in text to enable undo button
	editor.getSession().on('change', function(e) {
	    // e.type, etc
	    $("#undo-button").prop({'disabled': false});
	});
	*/
	$("#undo-button").prop({'disabled': false});



	// listen to selection changes 
	editor.getSession().selection.on('changeSelection', function(e) {
		var selectedLength = editor.session.getTextRange(editor.getSelectionRange()).length;
		if (selectedLength > 0) {
			$("#copy-button").prop('disabled', false);
			$("#cut-button").prop('disabled', false);
		}
		else {
			$("#copy-button").prop('disabled', true);
			$("#cut-button").prop('disabled', true);
		}
	});

}
