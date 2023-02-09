<?php
echo "1";

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "https://ordremekka.azurewebsites.net/assets/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, "ordremekka.mysql.database.azure.com", "ordremekka", "Gme1234567890987654321", "gme", 3306, MYSQLI_CLIENT_SSL);
  
  ?>
