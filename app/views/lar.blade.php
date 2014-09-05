@extends('main')

@section('content')

<div class="separator-horizontal"></div>



<div id="learning-wrapper">

	<div id="section-left" class="column">

		<div id="section-left-right">
			<div class="dropdown" id="lessons-dropdown">
			  <a data-toggle="dropdown" href="#">&#9776; Lektionslista</a>
			  <ul class="dropdown-menu" id="lessons-progress-list" role="menu" aria-labelledby="dLabel">
			 	 <!-- populated dynamically with <li>s -->
			  </ul>
			</div>
			<br/>
			{{ HTML::image('images/kodknackaren/knacke_wave.png', 'Knacke', $attributes = array('id' => 'knacke-small')); }}

		</div>
		<h2 id="lesson-nr">Lektionsnummer</h2>
		<h3 id="lesson-name">Lektionsnamn</h3>

		<div id="section-contents" class="triangle-border top">
		</div>

		<div id="sections-div">
			<button id="previous-section-button" class="clean-gray icon-left-outline" title="Föregående avsnitt"></button>

			<button id="next-section-button" class="clean-gray icon-right-outline" title="Nästa avsnitt"></button>
						<button class="clean-gray icon-edit" id="memo-button" title="<div class='tooltip-top'><div class='tooltip-title'>Memo</div> <div class='shortcuts'><kbd>Ctrl+M</kbd>/<kbd>⌘Cmd+M</kbd></div></div> Öppnar ett anteckningsblock där du kan skriva ner saker du har lärt dig eller kod för att spara till senare.<br/><strong>OBS:</strong> Innehållet i anteckningsblocket försvinner när du stänger Kodknackaren.">
						</button>
		</div>


		<div id="lesson-progress-box">
			<h3>Framsteg i denna lektion</h3>
			<div id="progress-stats">
				<span id="progress-sections">Avsnitt</span>
				<span id="progress-percent">%</span>
				<span id="progress-exercises">Övningar klara:</span>
			</div>
			<div id="progress-div" title="<strong>Visar dina framsteg i lektionen.</strong><br/>
			<table>
				<tr>
					<td width='10%' class='progress-bar-current'></td>
					<td>avsnittet du är på nu</td>
				</tr>
				<tr>
					<td width='10%' class='progress-bar-past'></td>
					<td>avsnitt du läst tidigare</td>
				</tr>
				<tr>
					<td width='10%' class='progress-bar-future'></td>
					<td>kommande avsnitt</td>
				</tr>
				<tr>
					<td width='10%' class='progress-bar-past-exercise'></td>
					<td>klarade övningar</td>
				</tr>
				<tr>
					<td width='10%' class='progress-bar-current-exercise'></td>
					<td>aktuell övning</td>
				</tr>
				<tr>
					<td width='10%' class='progress-bar-future-exercise'></td>
					<td>framtida övning</td>
				</tr>
			</table>"> 
				<div id="progress">
				</div>
			</div>
	
		</div>
	</div>

	{{ HTML::image('images/kodknackaren/knacke_happy.png', 'Knacke', $attributes = array('id' => 'knacke-big')); }}
	<div id="middle-image">
	</div>




	<div id="section-middle" class="column">

		<div id="editor-menu">
			<nav class="toolbar">
				<ul>
					<li><button class="clean-gray icon-play big-button run-code" id="run-code-button" title="<div class='tooltip-top'><div class='tooltip-title'>Kör kod</div> <div class='shortcuts'><kbd>Ctrl+Enter</kbd>/<kbd>⌘Cmd+Enter</kbd></div></div>Kör koden som finns i kodrutan just nu. För att denna funktion ska fungera måste koden vara giltig (korrekt syntax), det vill säga inga röda varningskryss får finnas med. Resultatet visas i den högra sektionen. Om inget resultat syns har du troligen glömt några <code>print()</code>-satser.</div>" ></button></li>
					<li><button class="clean-gray icon-stop" id="stop-code-button" title="<div class='tooltip-top'><div class='tooltip-title'>Stoppar kodkörning</div> <div class='shortcuts'><kbd>Ctrl+Enter</kbd>/<kbd>⌘Cmd+Enter</kbd></div></div> Detta kan vara bra exempelvis om ditt program verkar ha fastnat i en oändlig loop." disabled></button></li>
				</ul>
			</nav>
			<nav class="toolbar">
				<ul>
					<li><button class="clean-gray icon-scissors" id="cut-button" title="<div class='tooltip-top'><div class='tooltip-title'>Klipp ut</div> <div class='shortcuts'><kbd>Ctrl+X</kbd>/<kbd>⌘Cmd+X</kbd></div></div> Flyttar den markerade texten till datorns minne så att den sedan kan <i>klistras in</i> någon annan stans där markören befinner sig." disabled></button></li>
					<li><button class="clean-gray icon-docs" id="copy-button" title="<div class='tooltip-top'><div class='tooltip-title'>Kopiera</div> <div class='shortcuts'><kbd>Ctrl+C</kbd>/<kbd>⌘Cmd+C</kbd></div></div>Kopierar den markerade texten till datorns minne så att den sedan kan <i>klistras in</i> någon annan stans där markören befinner sig." disabled></button></li>
					<li><button class="clean-gray icon-paste" id="paste-button" title="<div class='tooltip-top'><div class='tooltip-title'>Klistra in</div> <div class='shortcuts'><kbd>Ctrl+V</kbd>/<kbd>⌘Cmd+V</kbd></div></div>Klistrar in texten som finns i datorns minne till platsen där markören befinner sig." disabled></button></li>
				</ul>
			</nav>
			<nav class="toolbar">
				<ul>
				<li><button class="clean-gray icon-ccw" id="undo-button" title="<div class='tooltip-top'><div class='tooltip-title'>Ångra</div> <div class='shortcuts'><kbd>Ctrl+Z</kbd>/<kbd>⌘Cmd+Z</kbd></div></div>Ångrar den senaste gjorda åtgärden i kodrutan." disabled></button></li>
				<li><button class="clean-gray icon-cw" id="redo-button" title="<div class='tooltip-top'><div class='tooltip-title'>Gör om</div> <div class='shortcuts'><kbd>Ctrl+Y</kbd>/<kbd>⌘Cmd+Shift+Z</kbd></div></div> den senaste gjorda åtgärden i kodrutan." disabled></button></li>
				</ul>
			</nav>
			<nav class="toolbar">
				<ul>
					<li><button class="clean-gray icon-search" id="search-button" title="<div class='tooltip-top'><div class='tooltip-title'>Sök</div> <div class='shortcuts'><kbd>Ctrl+F</kbd>/<kbd>⌘Cmd+F</kbd></div></div> Öppnar en dialogruta där du kan söka efter nästa eller alla förekomster av ett ord, tecken osv."></button></li>
					<li><button class="clean-gray" id="replace-button" title="<div class='tooltip-top'><div class='tooltip-title'>Ersätt</div> <div class='shortcuts'><kbd>Ctrl+F+F</kbd>/<kbd>⌘Cmd+F+F</kbd></div></div> Öppnar en dialogruta där du kan ersätta nästa eller alla förekomster av ett ord, tecken osv med något annat. Kan vara användbart exempelvis om du snabbt vill ändra på ett variabelnamn.</div>">{{ HTML::image('images/kodknackaren/replaceIcon40.png', 'Ersätt', $attributes = array('style' => 'width: 25px;')); }}</button></li>
				</ul>
			</nav>
			<nav class="toolbar">
				<ul>
					<li><button class="clean-gray icon-floppy" id="save-button" title="<div class='tooltip-top'><div class='tooltip-title'>Spara</div> <div class='shortcuts'><kbd>Ctrl+S</kbd>/<kbd>⌘Cmd+S</kbd></div></div> Sparar innehållet i kodrutan som en fil (öppnar systemets dialogruta som frågar var du vill spara filen)."></button></li>
				</ul>
			</nav>
			<button class="clean-gray big-button icon-trash right" id="trash-button" title="Återställer innehållet i kodrutan så att den innehåller det som fanns när övningen började."></button>
		</div>

		<pre id="editor"></pre>

		<div id="exercise-box">
			<div id="exercise-header"><h2>Övning</h2></div>
			<div id="exercise-status"></div>
			<div id="exercise-tabs">
				<ul>
					<li><button class="clean-gray icon-ok" id="grade-code-button" title="Kör en del tester på din kod för att testa om den fungerar. Testerna som körs ser du i rutan nedan. På vissa uppgifter måste du få koden godkänd innan du kan gå vidare." disabled>Rätta</button></li>
				    <li ><a href="#requirements-tab" id="requirements-li">Kravlista</a></li>
				    <li ><a href="#hints-tab" id="hints-li">Ledtrådar</a></li>
				    <li><button class="clean-gray icon-lightbulb" id="get-hint-button" title="" disabled>Ledtråd</button></li>
				</ul>
				<div id="requirements-tab">
					<table id="requirements-table">
						<!--
						<tr>
							<td class="requirement-description">aaa</td>
							<td class="requirement-check">bbb</td>
						</tr>
						<tr>
							<td class="requirement-description">aaa</td>
							<td class="requirement-check">bbb</td>
						</tr>
						-->
					</table>
				</div>
				<div id="hints-tab">
					<table id="hints-table">
					</table>
				</div>
			</div>
		</div>

		
	</div>



	<div id="section-right" class="column">
		<div id="right-tabs">
			<ul>
		    	<li><a href="#output-tab">Utdata</a></li>
		    	<li><a href="#canvas-tab" id="canvas-li">Rityta</a></li>
		 	</ul>
		 	<div id="output-tab">
		   		<pre id="run-output"></pre>
		 	</div>
			<div id="canvas-tab">
		  		<canvas width="1000" height="1000"/><!-- will be replaced -->
		  	</div>
		</div>
	</div>


	

</div>


<div id="memo-div" style="display: none;">
	<h3>Anteckningsblock</h3>
	<p>Observera att dina anteckningar kan gå förlorade efter att du stängt Kodknackaren.</p>
	<textarea id="notepad"></textarea>
</div>






@stop

@section('scripts')
{{ HTML::script('scripts/ace/ace.js'); }}
{{ HTML::script('scripts/jquery.ui.alsoresize.js'); }}
{{ HTML::script('scripts/jquery.countTo.js'); }}


{{ HTML::script('scripts/kodknackaren/editorcontroller.js'); }}
{{ HTML::script('scripts/kodknackaren/exercisecontroller.js'); }}
{{ HTML::script('scripts/kodknackaren/sectioncontroller.js'); }}
{{ HTML::script('scripts/kodknackaren/coderunnercontroller.js'); }}
{{ HTML::script('scripts/kodknackaren/usercontroller.js'); }}
<!-- {{ HTML::script('scripts/kodknackaren/tutorial.js'); }} -->


<script>
$("#menu_lar").addClass("current_page_item");
$( "#right-tabs, #exercise-tabs" ).tabs();
$("#section-left").resizable({handles: 'e', alsoResizeReverse: "#section-middle", stop: function() {
	$("#section-contents").css("width", "100%");
}});
$("#section-right").resizable({handles: 'w',  alsoResizeReverse: "#section-middle", resize: function() {
    $(this).css("left", 0);
  } });
$('button, #progress-div, .close').tipsy({
	html: true,
	fade: true
});


// enable Ace editor
var editor = ace.edit("editor");

var userController = new UserController(loggedInUserID);
var codeRunnerController = new CodeRunnerController();
var editorController = new EditorController(editor);
var sectionController = new SectionController(editor);
sectionController.setup();
</script>


@stop