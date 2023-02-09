<?php
include_once('../conn.php');

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datosendtforskuddregnskap = $_POST['datosendtforskuddregnskap'];
        $sumeksmva = $_POST['sumeksmva'];

        $query = "UPDATE ordre SET status='$status', datosendtforskuddregnskap='$datosendtforskuddregnskap', sumeksmva='$sumeksmva'  WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='ubehandledeordre_faktura.php';
           
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>