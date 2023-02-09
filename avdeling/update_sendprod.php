<?php
include_once('../conn.php');

    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datosendtprod = $_POST['datosendtprod'];
        $leveringskode = $_POST['leveringskode'];

        $query = "UPDATE ordre SET status='$status', datosendtprod='$datosendtprod' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='ubehandledeordre.php';
            alert('Ordre er sendt til Produksjon');
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>