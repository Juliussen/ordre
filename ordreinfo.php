<?php
include('connection.php');
include('topbar.php');
if (!isset($_SESSION['googleCode'])):
    header("location:register.php");
	exit();
endif;


//START KODE FOR Å HENTE VARIABLER 

include_once('conn.php'); 



 $ordrenr = $_GET['ordreinfo'];

 $sql4 = "SELECT * FROM ordre where ordrenr='$ordrenr'";
 $result = mysqli_query($connection,$sql4);
 $row = mysqli_fetch_assoc($result);
 $ordrenr = $row['ordrenr'];
 $kundenr = $row['kundenr'];
 $kundenavn = $row['kundenavn'];
 $kundetelefon = $row['kundetelefon'];
 $kundeepost = $row['kundeepost'];
 $kundeadresse = $row['kundeadresse'];
 $kundepostnr = $row['kundepostnr'];
 $kundepoststed = $row['kundepoststed'];
 $leveringskode = $row['leveringskode'];
 $trondheim = $row['trondheim'];
 $spesial = $row['spesial'];
 $ekspress = $row['ekspress'];
 $selger = $row['selger'];
 $avdeling = $row['avdeling'];
 $status = $row['status'];
 $datoopprettet = $row['datoopprettet'];
 $datosendtprod = $row['datosendtprod'];
 $datosendtforskuddregnskap = $row['datosendtforskuddregnskap'];
 $datoforskuddfakturabetalt = $row['datoforskuddfakturabetalt'];
 $datoferdigprodusert = $row['datoferdigprodusert'];
 $datomottattavd = $row['datomottattavd'];
 $datosendttransport = $row['datosendttransport'];
 $datoklarforhenting = $row['datoklarforhenting'];
 $datosendtmonteringsleder = $row['datosendtmonteringsleder'];
 $datosendtmontor = $row['datosendtmontor'];
 $datomontering = $row['datomontering'];
 $kommentartilordre = $row['kommentartilordre'];
 $kommentartilproduksjon = $row['kommentartilproduksjon'];
 $ordrevedlegg = $row['ordrevedlegg'];

 $result2 = explode('-', $datoopprettet);
 $dato = $result2[2];
 $month = $result2[1];
 $year = $result2[0];
$newdatoopprettet = $dato.'/'.$month.'/'.$year;

$result3 = explode('-', $datosendtprod);
$dato = $result3[2];
$month = $result3[1];
$year = $result3[0];
$newdatosendtprod = $dato.'/'.$month.'/'.$year;

$result4 = explode('-', $datosendtforskuddregnskap);
$dato = $result4[2];
$month = $result4[1];
$year = $result4[0];
$newdatosendtforskuddregnskap = $dato.'/'.$month.'/'.$year;

$result5 = explode('-', $datoforskuddfakturabetalt);
$dato = $result5[2];
$month = $result5[1];
$year = $result5[0];
$newdatoforskuddfakturabetalt = $dato.'/'.$month.'/'.$year;

$result6 = explode('-', $datomottattavd);
$dato = $result6[2];
$month = $result6[1];
$year = $result6[0];
$newdatomottattavd = $dato.'/'.$month.'/'.$year;

$result7 = explode('-', $datoferdigprodusert);
$dato = $result7[2];
$month = $result7[1];
$year = $result7[0];
$newdatoferdigprodusert = $dato.'/'.$month.'/'.$year;

$result8 = explode('-', $datosendtmonteringsleder);
$dato = $result8[2];
$month = $result8[1];
$year = $result8[0];
$newdatosendtmonteringsleder = $dato.'/'.$month.'/'.$year;

$result8 = explode('-', $datosendtmontor);
$dato = $result8[2];
$month = $result8[1];
$year = $result8[0];
$newdatosendtmontor = $dato.'/'.$month.'/'.$year;

$result9 = explode('-', $datomontering);
$dato = $result9[2];
$month = $result9[1];
$year = $result9[0];
$newdatomontering = $dato.'/'.$month.'/'.$year;

$result10 = explode('-', $datoklarforhenting);
$dato = $result10[2];
$month = $result10[1];
$year = $result10[0];
$newdatoklarforhenting = $dato.'/'.$month.'/'.$year;

$result10 = explode('-', $datomontering);
$dato = $result10[2];
$month = $result10[1];
$year = $result10[0];
$newdatomontering = $dato.'/'.$month.'/'.$year;

$date = date('Y-m-d');
$date1 = date_create($datoopprettet);



?>
<html>
 <head>
  <title>OrdreMekka 1.0</title>
  </head>
 
 <body class="a2z-wrapper">
  <div class="container box">
   <div class="row">
   <div class="col-md-8">
<h2 align="left">INFO - ORDRE NR : <?php echo $ordrenr; ?></h2>
 <h6>Selger:  <?php echo $selger; ?> - Avdeling:  <?php echo $avdeling; ?></h6>
</div>
<div class="col-md-4" >
 <h6 style="text-align:right;" >ORDRESTATUS :</h6><h5 style="text-align:right;"> <?php echo $status; ?></h5>
</div>
</div>

    <br>


<table class="table-ordreinfo">
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">KUNDE NR </div></td>
        <td> <div class="ordreinfo-text2"><?php echo $kundenr; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">KUNDE NAVN </div></td>
        <td> <div class="ordreinfo-text2"><?php echo $kundenavn; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">TELEFON </div></td>
        <td><div class="ordreinfo-text2"><?php echo $kundetelefon; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">EPOST </div></td>
        <td><div class="ordreinfo-text2"><?php echo $kundeepost; ?></div></td>
    </tr>
    <tr>
        <td><div class="ordreinfo-text">ADRESSE </div></td>
        <td><div class="ordreinfo-text2"><?php echo $kundeadresse; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">POST ADRESSE </div></td>
        <td><div class="ordreinfo-text2"><?php echo $kundepostnr; echo " "; echo $kundepoststed ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">LEVERINGSKODE </div></td>
        <td><div class="ordreinfo-text2"><?php echo $leveringskode; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">PLATER IFRA TRONDHEIM </div></td>
        <td><div class="ordreinfo-text2"><?php echo $trondheim; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">SPESIAL GLASS </div></td>
        <td><div class="ordreinfo-text2"><?php echo $spesial; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">EKSPRESS</div></td>
        <td><div class="ordreinfo-text2"><?php echo $ekspress; ?></div></td>
    </tr>
    
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">KOMMENTAR TIL PRODUKSJON</div></td>
        <td><div class="ordreinfo-text2"><?php echo $kommentartilproduksjon; ?></div></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">KOMMENTAR TIL ORDRE</div></td>
        <td><div class="ordreinfo-text2"><?php echo $kommentartilordre; ?></div></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td> <br><br></td>
        <td></td>
    </tr>
    <tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">OPPRETTET</div></td>
        <td><div class="ordreinfo-text2"><?php echo $newdatoopprettet; ?></div></td>
    </tr>
    <?php if($datosendtprod > 0){
        echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">SENDT PRODUKSJON</div></td>
        <td><div class="ordreinfo-text2">'.$newdatosendtprod.'</div></td>
        </tr>';
    }?>
    <?php if($datosendtforskuddregnskap > 0){
        echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">SENDT FF REGNSKAP</div></td>
        <td><div class="ordreinfo-text2">'.$newdatosendtforskuddregnskap.'</div></td>
        </tr>';
    }?>
   <?php if($datoforskuddfakturabetalt > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">FF BETALT</div></td>
        <td><div class="ordreinfo-text2">'.$newdatoforskuddfakturabetalt.'</div></td>
    </tr>';
   }?>
   <?php if($datoferdigprodusert > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">FERDIG PRODUSERT</div></td>
        <td><div class="ordreinfo-text2">'.$newdatoferdigprodusert.'</div></td>
    </tr>';
   }?>
     <?php if($datomottattavd > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">MOTTATT AVDELING</div></td>
        <td><div class="ordreinfo-text2">'.$newdatomottattavd.'</div></td>
    </tr>';
   }?>
      <?php if($datosendtmonteringsleder > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">SENDT MONTERINGSLEDER</div></td>
        <td><div class="ordreinfo-text2">'.$newdatosendtmonteringsleder.'</div></td>
    </tr>';
   }?>
      <?php if($datosendtmontor > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">SENDT MONTØR</div></td>
        <td><div class="ordreinfo-text2">'.$newdatosendtmontor.'</div></td>
    </tr>';
   }?>
    <?php if($datoklarforhenting > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">KLAR FOR HENTING</div></td>
        <td><div class="ordreinfo-text2">'.$newdatoklarforhenting.'</div></td>
    </tr>';
    }?>
     <?php if($datomontering > 0){
    echo '<tr class="tr-ordreinfo">
        <td><div class="ordreinfo-text">MONTERING </div></td>
        <td><div class="ordreinfo-text2">'.$newdatomontering.'</div></td>
    </tr>';
    }?>


</div>
</table>
<div class="ordrevedlegg">

<center>ORDREVEDLEGG<br>
<a href="ordremappe/<?php echo $row['ordrenr'] ?>.pdf"  target="new"><img src="assets/img/pdf.png" width="50%"></a></center>
</div>
</div>
   

 </body>
</html>


