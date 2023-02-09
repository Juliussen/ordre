<?php
include_once('../conn.php'); 

    if(isset($_POST['updatedataendring']))
    {   
        $ordrenr = $_POST['ordrenr2'];
        
        $status = $_POST['status2'];
        $kommentartilproduksjon = $_POST['kommentartilproduksjon'];
        $kommentartilendring = $_POST['kommentartilendring'];
        $datoendringstatus = $_POST['datoendringstatus'];

        $selger = $_POST['selger'];

        include('../connection.php');
        $googlecode = $_SESSION['secret'];
        $sql = db_query("select * from google_auth where fname = '".$selger."'");
        $row = mysqli_fetch_array($sql);
        
        

        $query = "UPDATE ordre SET status='$status', kommentartilproduksjon='$kommentartilproduksjon', kommentartilendring='$kommentartilendring', datoendringstatus='$datoendringstatus' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

       

        if($query_run)
        {
            
            header("Location:ubehandledeordre3.php");
            
        }
        else
        {
            echo '<script> alert("En feil har oppstått, kontakt systemansvarlig"); </script>';
        }
    }
?>