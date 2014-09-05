<!DOCTYPE html>

<html lang="sv">
<head>
	<meta charset=utf-8>
	<title>Kodknackaren :: Lär dig programmera</title>
	<meta name="keywords" content="programmera, programmering, lär dig programmera" />
	<meta name="description" content="" />
	<!-- bootstrap CSS -->
	{{ HTML::style('css/bootstrap-robban.css'); }}
	<!-- jQuery UI CSS-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<!-- our CSS -->
	{{ HTML::style('css/screen.css'); }}
	<!-- font icons -->
	{{ HTML::style('css/fontello.css'); }}
	<!-- fancy stuff css -->
	{{ HTML::style('css/tipsy.css'); }}
	{{ HTML::style('css/jquery-ui-1.10.4.custom.min.css'); }}
	{{ HTML::style('css/jquery-impromptu.min.css'); }}
	{{ HTML::style('css/colorbox.css'); }}

	<!-- main fonts -->
	<link href='http://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Inconsolata:400,700' rel='stylesheet' type='text/css'>

	{{ HTML::script('scripts/sprintf.min.js'); }} 
	<!-- fancy stuff js -->
	{{ HTML::script('scripts/jquery-1.11.0.min.js'); }} 
	{{ HTML::script('scripts/mousetrap.min.js'); }} 
	{{ HTML::script('scripts/jquery-ui-1.10.4.custom.min.js'); }}
	{{ HTML::script('scripts/jquery.tipsy.js'); }}
	<!--{{ HTML::script('scripts/jquery.hive.js'); }}-->

	{{ HTML::script('scripts/bootstrap.min.js'); }}
	{{ HTML::script('scripts/jquery.colorbox-min.js'); }}



</head>

<body>
	<div id="wrapper">
		<div id="header" class="container">
			<div id="logo">
				<a href="hem">{{ HTML::image('images/kodknackaren/logo3.png', 'Tillbaka till startsidan'); }}</a>
			</div>
			<nav id="main-menu">
				<ul>
					<li id="menu_start"><a href="hem" accesskey="1" title="">Startsida</a></li>
					<li id="menu_lar"><a href="lar" accesskey="2" title="">Lär</a></li>
					<li id="menu_lek"><a href="#" accesskey="3" title="">Lek</a></li>
					<li id="menu_lasmer"><a href="#" accesskey="4" title="">Läs mer</a></li>
					<li id="menu_kontakt"><a href="#" accesskey="5" title="">Kontakt</a></li>
				</ul>
			</nav>
			<div id="submenu">
				<ul>
                @if(Auth::check())
                    <li>Inloggad som <strong>{{Auth::user()->username}}</strong></li>
                    <li>Poäng: <span id="current-user-points">{{Auth::user()->points}}</span></li>
                    <li>Prestationer: <a href="medaljer">X/X</a></li>
                    <li><a href="logout">Logga ut</a></li></li>
                    <script>var loggedInUserID = {{Auth::user()->userID}};</script>
                @else
                    <li><a href="login">Logga in</a></li>
                    <script>var loggedInUserID = -1;</script>
                @endif
				</ul>
			</div>
		</div>
        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif


		@yield('content')	
	</div>
	


	<footer>
		<p>&copy; 2014 Robert Sebescen &amp; <i>Kodknackaren</i> </p>
	</footer>

	
	@yield('scripts')

	</body>
</html>
