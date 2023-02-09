<?php
include_once('../conn.php');

    if(isset($_POST['updatedata2']))
    {   
        $ordrenr = $_POST['ordrenr1'];
        
        $status = $_POST['status'];
        $datomottattavd = $_POST['datomottattavd'];

        $query = "UPDATE ordre SET status='$status', datomottattavd='$datomottattavd' WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            
            echo "<script>
            window.location.href='ferdigprodusert.php';
            
       </script>";
            
        }
        else
        {
            
            echo "<script>window.location.href='ferdigprodusert.php';
             alert('NOE GIKK GALT!'); </script>";
        }
    }
?>