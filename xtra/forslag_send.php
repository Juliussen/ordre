<?php


include_once('../conn.php'); 


if(isset($_POST["submit"]))
{
   $forslagid = mysqli_real_escape_string($connection, $_POST["forslagid"]);
   $forslagomrade = mysqli_real_escape_string($connection, $_POST["forslagomrade"]);
   $bruker = mysqli_real_escape_string($connection, $_POST["bruker"]);
   $brukeromrade = mysqli_real_escape_string($connection, $_POST["brukeromrade"]);
   $forslagtekst = mysqli_real_escape_string($connection, $_POST["forslagtekst"]);
   $forslagstatus = mysqli_real_escape_string($connection, $_POST["forslagstatus"]);
 
         $query = "INSERT INTO `forslag`(`forslagomrade`, `brukeromrade`, `bruker`, `forslagtekst`, `forslagstatus`) VALUES('$forslagomrade', '$brukeromrade', '$bruker',  '$forslagtekst', 'Ubehandlet')";
         if(mysqli_query($connection, $query)){
         echo "<script>
         window.location.href='forslag.php';
         alert('Ditt ønske/forslag er registrert!');
    </script>";
       
         }        else{
            echo "<script>
         window.location.href='forslag.php';
         alert('ERRROOOORRRRR');
    </script>";
         }
   
 
      }
?>