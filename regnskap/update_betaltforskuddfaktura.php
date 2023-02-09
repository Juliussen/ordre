<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datoforskuddfakturabetalt = $_POST['datoforskuddfakturabetalt'];

        $query = "UPDATE ordre SET status='$status', datoforskuddfakturabetalt='$datoforskuddfakturabetalt' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
           
            header("Location:forskuddfakturasendt.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>