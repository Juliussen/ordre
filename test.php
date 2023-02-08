<?php

$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/assets/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, 'ordremekka.mysql.database.azure.com', 'ordremekka', 'Gme1234567890987654321', 'gme', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
  
  ?>
