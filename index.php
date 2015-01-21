<html>
	<head>
		<title>RIGHTHERE | Yo your location</title>
		<style>
			@font-face {
				font-family: 'montserratregular';
				src: url('Montserrat-Regular-webfont.eot');
				src: url('Montserrat-Regular-webfont.eot?#iefix') format('embedded-opentype'),
					url('Montserrat-Regular-webfont.woff') format('woff'),
					url('Montserrat-Regular-webfont.ttf') format('truetype'),
					url('Montserrat-Regular-webfont.svg#montserratregular') format('svg');
				font-weight: normal;
				font-style: normal;
			}
			* {
				font-family: "montserratregular", Helvetica, "Helvetica Neue", Arial, sans-serif;
				margin: 0 auto;
				text-align: center;
				color: white;
				background: #333;
			}
			input {
				margin-top: 3rem;
				font-size: 5rem;
				background: #9B59B6;
				border: none;
				border-radius: none;
				padding: 3rem;
				color: white;
			}
			input[type='text'] {
				margin-left: 0;
			}
			input[type='submit'] {
				margin-top: 3rem;
				font-size: 5rem;
				background: #9B59B6;
				border: none;
				border-radius: none;
				padding: 3rem;
				color: white;
				border-radius: 0;
				margin-left: 3rem;
			}
			button {
				margin-top: 3rem;
				font-size: 5rem;
				background: #9B59B6;
				border: none;
				border-radius: none;
				padding: 3rem;
				color: white;
				border-radius: 0;
			}
			html, body{
				font-size:10px;
			}
			h1 {
				font-size: 20rem;
				display:block;
				margin: 0 auto;
				text-align: center;
				font-variant: small-caps;
				text-transform: lowercase;
			}
			h2 {
				font-size: 5rem;
				text-align: center;
			}
			h3 {
				font-size: 3rem;
				line-height: 5rem;
				color: inherit;
				background: inherit;
			}

			.alert{
				margin-top: 3rem;
				margin-bottom: 3rem;
				padding: 3rem;
				background: white;
				color: #333;
			}
			.alert a{
				color: inherit;
				background: inherit;
			}
			.container {
				margin: 20rem 5rem 0 5rem;
				height: 100%;
				width: 80%;
				margin: 0 auto;
			}
			.username {
				text-transform: lowercase;
				font-variant: small-caps;
				background: inherit;
				color: inherit;
				font-size: 5rem;
				line-height: inherit;
			}
			footer {
				margin-top: 5rem;
				font-size: 3rem;
			}
			@media (max-width:100rem) {
				html, body{
					font-size:8px;
				}
			}
		</style>
	</head>
	<body>
		<div class="container">
			<h1>RIGHTHERE</h1>
			<h2>Quickly Yo your location!</h2>
			<h3>We'll Yo a Google Maps link.</h3>
			<?php
session_start();
if (isset($_SESSION['username'])) {
	echo'<div class="alert"><h3><span class="username">RIGHTHERE</span> just Yo\'d <span class="username">';
	echo $_SESSION['username'];
	echo '</span> <a href="';
	echo $_SESSION['link'];
	echo '">this location</a>.</h3></div>';
	unset($_SESSION['username']);
}
			?>
			<form action="processyoyo.php" method="post" id="form">
				<input type="text" name="username" placeholder="Username" autofocus required>
				<input type="submit" value="Yo">
				<input type="hidden" name="lat" id="lat">
				<input type="hidden" name="long" id="long">
			</form>
			<button style="width:100%" id="btnLocation" onclick="javascript:getLocation();">Get my location</button>
			<div id="map-canvas" width="50%" height="50%"></div>
			<footer>Made by <a href="http://kevinrabinovich.me">Kevin Rabinovich</a>.</footer>
		</div>
		<script>
			document.getElementById('form').style.display="none";
			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(setCoords,error);
					document.getElementById('btnLocation').innerHTML = "Click Allow, OK, Approve, etc. so we can get your location.";
				}
				else {
					document.getElementById('btnLocation').innerHTML = "Hmm... we can't get your location. Try refreshing or on another device.";
				}
				function setCoords(position) {
					var latitude = position.coords.latitude;
					var longitude = position.coords.longitude;						document.getElementById('form').style.display="block";
					document.getElementById('lat').value = latitude;
					document.getElementById('long').value = longitude;
					document.getElementById('btnLocation').style.display="none";
				}
				function error(err) {
					if (err.code == 1) {
						document.getElementById('btnLocation').innerHTML = "Approve the location request.";
					}
					else {
						document.getElementById('btnLocation').innerHTML = "Couldn't get location.";
					}
				}	
			}

		</script>
	</body>
</html>