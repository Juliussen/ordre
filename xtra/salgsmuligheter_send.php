<?php


include_once('conn.php'); 


if(isset($_POST["submit"]))
{
   $salgsid = mysqli_real_escape_string($connection, $_POST["salgsid"]);
   $kundenavn = mysqli_real_escape_string($connection, $_POST["kundenavn"]);
   $kundeadresse = mysqli_real_escape_string($connection, $_POST["kundeadresse"]);
   $kundepostnummer = mysqli_real_escape_string($connection, $_POST["kundepostnummer"]);
   $kundepoststed = mysqli_real_escape_string($connection, $_POST["kundepoststed"]);
   $kundetelefon = mysqli_real_escape_string($connection, $_POST["kundetelefon"]);
   $kundeepost = mysqli_real_escape_string($connection, $_POST["kundeepost"]);
   $salgstatus = mysqli_real_escape_string($connection, $_POST["salgstatus"]);
   $kommentartilsalg = mysqli_real_escape_string($connection, $_POST["kommentartilsalg"]);
   $dato = mysqli_real_escape_string($connection, $_POST["dato"]);
   $selger = mysqli_real_escape_string($connection, $_POST["selger"]);



 
         $query = "INSERT INTO `salgsint`(`kundenavn`, `kundeadresse`, `kundepostnummer`, `kundepoststed`, `kundetelefon`, `kundeepost`, `salgstatus`, `kommentartilsalg`, `dato`, `selger`) VALUES('$kundenavn', '$kundeadresse', '$kundepostnummer', '$kundepoststed', '$kundetelefon', '$kundeepost', '$salgstatus',  '$kommentartilsalg', '$dato', '$selger')";
         if(mysqli_query($connection, $query)){
         echo "<script>
         window.location.href='salgsmuligheter.php';
         
    </script>";
       
         }        else{
            echo "<script>
         window.location.href='salgsmuligheter.php';
         alert('ERRROOOORRRRR');
    </script>";
         }
   
 
      }
?>