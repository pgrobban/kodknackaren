@extends('main')

@section('content')
<script type="text/javascript">
function warnIfNotLoggedIn() {
	if (loggedInUserID == -1)
		alert("Du är inte inloggad. Detta innebär att du kommer bara se första lektionen och dina resultat kommer inte att sparas.");
}
</script>

<div id="banner">
		<div class="container">
			<div class="title">
				<div class="triangle-border right">
					<h2>Hallå där :)</h2>
					<p class="byline">Knacke heter jag och jag vill lära dig programmera.
					Här på Kodknackaren får du leka med datorn på riktigt. Du kan rita figurer och skapa enkla
					spel - det är bara din fantasi som sätter stopp!</p>

					<ul class="actions">
						<li><a href="lar" class="main-button" onclick="warnIfNotLoggedIn();">Testa lärostugan</a></li>
						<li><a href="#" class="main-button">Bli medlem (Det är gratis!)</a></li>
					</ul>
				</div>

			</div>
			<div class="knacke-right">
			{{ HTML::image('images/kodknackaren/knacke_wave.png', "knacke"); }}
			</div>
		</div>
	</div>
	<div id="extra" class="container">
	
		<div class="title">
			<h2>Vad är Kodknackaren?</h2>
		</div>
		
		<div id="three-column">
			<div class="boxA">
				<div class="box"> 
				<p>En ikon här (200 x 100px)</p>
				<h2><a href="lar" onclick="warnIfNotLoggedIn();">Lär</a></h2>
					<p>Kodknackaren är en interaktiv läromiljö där barn i tonåren och uppåt får lära sig programmering. I
					lärostugan kan du tjäna poäng och vinna medaljer samtidigt som du lär dig att skapa enkla program och spel.</p>
				</div>
			</div>
			<div class="boxB">
				<div class="box">  
								<p>En ikon här (200 x 100px)</p>

				<h2><a href="lek">Lek</a></h2>
					<p>I <strong>sandlådan</strong> hittar du en komplett programmerings&shy;miljö där du kan experi&shy;mentera med
					egen kod. Du kan köra koden, se resultatet och spara filer till din dator.</p>
				</div>
			</div>
			<div class="boxC">
				<div class="box"> 
								<p>En ikon här (200 x 100px)</p>

				<h2><a href="las">Läs mer</a></h2>
					<p>Här finns lite nyttiga länkar för dig som vill lära dig mer. Du kan bland annat hitta
					nyttiga program till datorn, ladda ner en e-boks&shy;version av <i>Kodknackaren</i> och en massa annat.</p>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<script>
$("#menu_start").addClass("current_page_item");
</script>
@stop