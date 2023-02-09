<?php

$username = "ordremekka"; 
$password = "Gme1234567890987654321"; 
$database = "gme"; 
$host = "ordremekka.mysql.database.azure.com";
$mysqli = new mysqli($host, $username, $password, $database);

$connection = mysqli_connect($host,$username,$password);
$db = mysqli_select_db($connection, $database);

$baseurl = "https://ordremekka.azurewebsites.net/";
