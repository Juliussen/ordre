<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datosluttfakturasendt = $_POST['datosluttfakturasendt'];

        $query = "UPDATE ordre SET status='$status', datosluttfakturasendt='$datosluttfakturasendt' WHERE ordrenr='$ordrenr'  ";
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