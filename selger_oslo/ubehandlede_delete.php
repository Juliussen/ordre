<?php

include('../conn.php');

if(isset($_POST["deletedata"]))
{
$ordrenr = $_POST['ordrenr2'];
 $query = "DELETE FROM ordre WHERE ordrenr = '".$ordrenr."'";
 if(mysqli_query($connection, $query))
 {
    echo "<script>
    window.location.href='ubehandledeordre.php';
   
</script>";
    
    die();
 }else{
    echo "Det skjedde en feil, kontakt systemansvalig om det gjentar seg";
 }
}
?>