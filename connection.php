<?php

session_start();
function db_connect() {
    static $connection;
	$username	= "ordremeekka";   
	$password	= "Gme1234567890987654321";
	$dbname		= "gme";
	$host		= "ordremekka.mysql.database.azure.com";
    $connection = mysqli_init();
    mysqli_ssl_set($connection,NULL,NULL, "https://ordremekka.azurewebsites.net/assets/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    

    if(!isset($connection)) { 
        
        mysqli_real_connect($connection, $host, $username, $password, $dbname, 3306, MYSQLI_CLIENT_SSL);
    }
    if($connection === false) {
        return mysqli_connect_error(); 
    }
    return $connection;
}

function db_query($query) {
    $connection = db_connect();
    $result = mysqli_query($connection,$query);
    return $result;
}

function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

$connect = db_connect();

if (!isset($_SESSION['token'])) {
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
    $_SESSION['token_time'] = time();
}else{
    $token = $_SESSION['token'];
}

define('ADMINEMAIL', 'mads@garderobemekka.no');

?>