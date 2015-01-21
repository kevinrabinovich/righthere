<?php
    session_start();
    $_SESSION['username'] = $_POST['username'];
    header("Location:index.php");
    require('yo.php');
    $apiKey = 'YOUR_SECRET_API_KEY';
    $yo = new Yo($apiKey);
//	$link = "https://www.google.com/maps/dir//" . $_POST['lat'] . "," . $_POST['long'] . "/@" . $_POST['lat'] . "," . $_POST['long']; Directions
//	$link = "https://www.google.com/maps/@" . $_POST['lat'] . "," . $_POST['long'];
$link = "http://maps.google.com/maps?&q=" . $_POST['lat'] . "+" . $_POST['long'] . "&ll=" . $_POST['lat'] . "+" . $_POST['long'];
	$_SESSION['link'] = $link;
    $yo->user($_SESSION['username'],$link);
?>