<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datoferdigprodusert = $_POST['datoferdigprodusert'];

        $query = "UPDATE ordre SET status='$status', datoferdigprodusert='$datoferdigprodusert' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
          
            header("Location:ubehandledeordre3.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>