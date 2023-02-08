<?php

$username = "root"; 
$password = ""; 
$database = "gme"; 
$mysqli = new mysqli("localhost", $username, $password, $database);

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'gme');

$baseurl = "http://localhost/ordremekka/";