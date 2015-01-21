<?php
    session_start();
    $_SESSION['username'] = $_GET['username'];
//    header("Location:index.php");
    require('yo.php');
    $apiKey = 'YOUR_SECRET_API_KEY';
    $yo = new Yo($apiKey);
    $link = 'maps.google.com';
    $yo->user($_SESSION['username'],$link);
?>