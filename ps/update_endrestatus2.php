<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedataendring']))
    {   
        $ordrenr = $_POST['ordrenr2'];
        
        $status = $_POST['status2'];
        $kommentartilendring = $_POST['kommentartilendring'];
        $datoendringstatus = $_POST['datoendringstatus'];

        $query = "UPDATE ordre SET status='$status', kommentartilendring='$kommentartilendring', datoendringstatus='$datoendringstatus' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
           
            header("Location:ubehandledeordre2.php");
        }
        else
        {
            echo '<script> alert("En feil har oppstått, kontakt systemansvarlig"); </script>';
        }
    }
?>