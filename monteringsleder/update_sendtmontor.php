<?php
include_once('../conn.php');


    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
        $kundenr = $_POST['kundenr'];

        $status = $_POST['status'];
        $datosendtmontor = $_POST['datosendtmontor'];
        $montor = $_POST['montor'];

        $query = "UPDATE ordre SET status='$status', datosendtmontor='$datosendtmontor', montor='$montor'  WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        
        // $query2 ="INSERT INTO `montering`(`ordrenr`, `kundenr`, `montor`) VALUES ('$ordrenr','$kundenr','$montor')";
        // $query_run2 = mysqli_query($connection, $query2);

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