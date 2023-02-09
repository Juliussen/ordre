<?php
include_once('../conn.php');


    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
          
        $status = $_POST['status'];
        $datosendtmonteringsleder = $_POST['datosendtmonteringsleder'];
        

        $query = "UPDATE ordre SET status='$status', datosendtmonteringsleder='$datosendtmonteringsleder' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='monteringsordre.php';
           
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>