<?php
include_once('../conn.php');


    if(isset($_POST['darkmode1'] ))
    {   

        
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];
        

        $query = "UPDATE `google_auth` SET `usertype`='$usertype' WHERE `username` = '$username'; ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo "<script>
            window.location.href='../minkonto.php';
           
       </script>";
            
            die();
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
            echo "<script>
            window.location.href='../minkonto.php';
           
       </script>";
        }
    }
?>