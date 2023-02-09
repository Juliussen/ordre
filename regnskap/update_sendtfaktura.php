<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datosendtforskuddfaktura = $_POST['datosendtforskuddfaktura'];

        $query = "UPDATE ordre SET status='$status', datosendtforskuddfaktura='$datosendtforskuddfaktura' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
           
            header("Location:ubehandledeordre.php");
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>