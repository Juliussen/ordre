<?php


include_once('../conn.php'); 


if(isset($_POST["submit"]))
{
 $ordrenr = mysqli_real_escape_string($connection, $_POST["ordrenr"]);
 $kundenr = mysqli_real_escape_string($connection, $_POST["kundenr"]);
 $kundenavn = mysqli_real_escape_string($connection, $_POST["kundenavn"]);
 $kundetelefon = mysqli_real_escape_string($connection, $_POST["kundetelefon"]);
 $kundeepost = mysqli_real_escape_string($connection, $_POST["kundeepost"]);
 $kundeadresse = mysqli_real_escape_string($connection, $_POST["kundeadresse"]);
 $kundepostnr = mysqli_real_escape_string($connection, $_POST["kundepostnr"]);
 $kundepoststed = mysqli_real_escape_string($connection, $_POST["kundepoststed"]);
 $selger = mysqli_real_escape_string($connection, $_POST["selger"]);
 $avdeling = mysqli_real_escape_string($connection, $_POST["avdeling"]);
 $leveringskode = mysqli_real_escape_string($connection, $_POST["leveringskode"]);
 $datoopprettet = mysqli_real_escape_string($connection, $_POST["datoopprettet"]);
 $forskudd = mysqli_real_escape_string($connection, $_POST["forskudd"]);
 $trondheim = mysqli_real_escape_string($connection, $_POST["trondheim"]);
 $spesial = mysqli_real_escape_string($connection, $_POST["spesial"]);
 $ekspress = mysqli_real_escape_string($connection, $_POST["ekspress"]);
 $kommentartilordre = mysqli_real_escape_string($connection, $_POST["kommentartilordre"]);
 $kommentartilproduksjon = mysqli_real_escape_string($connection, $_POST["kommentartilproduksjon"]);
 $status = mysqli_real_escape_string($connection, $_POST["status"]);

 $file = $_FILES['ordrevedlegg'];

 $fileName =$_FILES['ordrevedlegg']['name'];
 $fileTmpName = $_FILES['ordrevedlegg']['tmp_name'];
 $fileSize = $_FILES['ordrevedlegg']['size'];
 $fileError =$_FILES['ordrevedlegg']['error'];
 $fileType = $_FILES['ordrevedlegg']['type'];

 $fileExt = explode('.', $fileName);
 $fileActualExt = strtolower(end($fileExt));

 $allowed = array('pdf');

 if($forskudd == 'Forskudd Betalt'){
   $status = "Ubehandlet";
 }elseif($forskudd == 'Forskudd Faktura'){
   $status = "Forskudd Faktura";
 }
 
 define("BASE_URL", dirname('http://localhost//ordremekka/'));

$baseurl = "http://localhost/ordremekka/";

$result = mysqli_query($connection,"SELECT COUNT(*) AS num_rows FROM ordre WHERE ordrenr='{$ordrenr}' LIMIT 1;");
$row = mysqli_fetch_array($result);
if($row["num_rows"] > 0){
   echo "<script>
         window.location.href='leggtilordre.php';
         alert('FEIL OPPSTÅTT, ORDRE NR EKSISTERE ALLEREDE!');
    </script>";
}

if($fileSize == 0){
   $query = "INSERT INTO `ordre`(`ordrenr`, `kundenr`, `kundenavn`, `kundetelefon`, `kundeepost`, `kundeadresse`, `kundepostnr`, `kundepoststed`, `selger`, `avdeling`, `leveringskode`, `forskudd`, `trondheim`, `spesial`, `ekspress`, `kommentartilordre`, `kommentartilproduksjon`, `status`, `ordrevedlegg`, `datoopprettet`) VALUES('$ordrenr', '$kundenr', '$kundenavn', '$kundetelefon', '$kundeepost', '$kundeadresse', '$kundepostnr', '$kundepoststed', '$selger', '$avdeling', '$leveringskode', '$forskudd', '$trondheim', '$spesial', '$ekspress', '$kommentartilordre', '$kommentartilproduksjon', '$status', NULL, '$datoopprettet')";
         if(mysqli_query($connection, $query)){
         echo "<script>
         window.location.href='leggtilordre.php';
         alert('En ny ordre uten vedlegg har blitt lagt til. Gratulerer!');
    </script>";
}}else{
 if(in_array($fileActualExt, $allowed)){
   if($fileError === 0){
      if($fileSize < 10000000){
         $fileNameNew = $ordrenr .".".$fileActualExt;
         $fileDestination = "../ordremappe/".$fileNameNew;
         move_uploaded_file($fileTmpName, $fileDestination);
         $query = "INSERT INTO `ordre`(`ordrenr`, `kundenr`, `kundenavn`, `kundetelefon`, `kundeepost`, `kundeadresse`, `kundepostnr`, `kundepoststed`, `selger`, `avdeling`, `leveringskode`, `forskudd`, `trondheim`, `spesial`, `ekspress`, `kommentartilordre`, `kommentartilproduksjon`, `status`, `ordrevedlegg`, `datoopprettet`) VALUES('$ordrenr', '$kundenr', '$kundenavn', '$kundetelefon', '$kundeepost', '$kundeadresse', '$kundepostnr', '$kundepoststed', '$selger', '$avdeling', '$leveringskode', '$forskudd', '$trondheim', '$spesial', '$ekspress', '$kommentartilordre', '$kommentartilproduksjon', '$status', '$fileNameNew', '$datoopprettet')";
         if(mysqli_query($connection, $query)){
         echo "<script>
         window.location.href='leggtilordre.php';
         alert('En ny ordre har blitt lagt til. Gratulerer!');
    </script>";
       
         }        
         
         
      }
   }else {
      echo "Det var en feil med opplastingen av filen";
   }
 }
}
}
 // SETT INN UBEHANDLET ORDRE ---------------->
 
 
 else{
    echo "<script>
    window.location.href='leggtilordre.php';
    alert('EN FEIL HAR OPPSTÅTT, EKSISTERER ORDRENR IFRA FØR?');
    </script>";
 }



?>