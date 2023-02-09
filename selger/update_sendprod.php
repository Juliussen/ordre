<?php
include_once('../conn.php');


    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
        $leveringskode = $_POST['leveringskode1'];
        $status = $_POST['status'];
        $datosendtprod = $_POST['datosendtprod'];
        
echo $_POST['leveringskode1'];
echo $status;


        $query = "UPDATE ordre SET status='$status', datosendtprod='$datosendtprod' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='ubehandledeordre.php';
           
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>