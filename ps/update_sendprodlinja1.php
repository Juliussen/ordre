<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata3']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status1'];
        $datosendtprodlinja = $_POST['datosendtprodlinja'];

        $query = "UPDATE ordre SET status='$status', datosendtprodlinja='$datosendtprodlinja' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
          
            header("Location:ubehandledeordre1.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>