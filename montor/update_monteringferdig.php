<?php
include_once('../conn.php');


    if(isset($_POST['updatedata2'] ))
    {   

        $ordrenr = $_POST['ordrenr1'];
        $kundenr = $_POST['kundenr'];
        $status = $_POST['status'];
        $datomontering = $_POST['datomontering'];
        $montor = $_POST['montor'];
        $monteringselementer = $_POST['monteringselementer'];
        $kuttelementer = $_POST['kuttelementer'];
        $fraktelementer = $_POST['fraktelementer'];
        $etasjetillegg = $_POST['etasjetillegg'];



       $query = "UPDATE ordre SET status='$status', datomontering='$datomontering'  WHERE ordrenr='$ordrenr'  ";
        $query_run = mysqli_query($connection, $query);

      $query1 ="INSERT INTO `montering`(`ordrenr`, `kundenr`, `montor`, `datomontering`, `monteringselementer`, `kuttelementer`, `fraktelementer`, `etasjetillegg`) VALUES ('$ordrenr', '$kundenr', '$montor', '$datomontering', '$monteringselementer', '$kuttelementer', '$fraktelementer', '$etasjetillegg')";
      $query_run1 = mysqli_query($connection, $query1);

        if($query_run)
        {
          
                echo "<script>
            window.location.href='monteringavtalt.php';
           
       </script>";
          
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>