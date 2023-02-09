<?php

include_once('conn.php');

    if(isset($_POST['ordreinfo']))
    {   
        $ordrenr = $_POST['ordrenr'];
        
        $status = $_POST['status'];
        $datosendtprod = $_POST['datosendtprod'];

        echo $ordrenr;
        echo $datosendtprod;
    }

?>