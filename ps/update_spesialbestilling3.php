<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr'];
        
        $status = $_POST['status'];
        $datosendtbestillingspesial = $_POST['datosendtbestillingspesial'];

        $query = "UPDATE ordre SET datosendtbestillingspesial='$datosendtbestillingspesial' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='ubehandledeordre3.php';
            
       </script>";
            
        }
        else
        {
            echo '<script> alert("En feil har oppstått, kontakt systemansvarlig"); </script>';
        }
    }
?>