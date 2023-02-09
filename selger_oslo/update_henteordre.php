<?php
include_once('../conn.php');


    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
          
        $status = $_POST['status'];
        $datoklarforhenting = $_POST['datoklarforhenting'];
        

        $query = "UPDATE ordre SET status='$status', datoklarforhenting='$datoklarforhenting' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='henteordre.php';
           
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>