<?php


$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/assets/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "ordremekka.mysql.database.azure.com", "ordremekka", "Gme1234567890987654321", "gme", 3306, MYSQLI_CLIENT_SSL);
  
  ?>
