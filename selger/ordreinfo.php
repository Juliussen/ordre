<?php
include('../connection.php');
include('../topbar.php');
if (!isset($_SESSION['googleCode'])):
    header("location:../register.php");
	exit();
endif;


//START KODE FOR Å HENTE VARIABLER 

include_once('../conn.php'); 



 $ordrenr = $_GET['ordreinfo'];

 $sql4 = "SELECT * FROM ordre where ordrenr='$ordrenr'";
 $result = mysqli_query($connection,$sql4);
 $row = mysqli_fetch_assoc($result);
 $ordrenr = $row['ordrenr'];
 $kundenr = $row['kundenr'];
 $kundenavn = $row['kundenavn'];
 $kundetelefon = $row['kundetelefon'];
 $kundeepost = $row['kundeepost'];
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
<h2 align="left">ORDRE INFO</h2>
 <h6>Selger:  <?php echo $selger; ?> - Avdeling:  <?php echo $avdeling; ?></h6>
</div>
<div class="col-md-4" >
 <h6 style="text-align:right;" >ORDRESTATUS :</h6><h5 style="text-align:right;"> <?php echo $status; ?></h5>
</div>
</div>
 <section class="a2z-area" ><div class="container box" >
    <div class="form-area register-from" >
    <br>
<div class="row justify-content-center">    
<div class="col-md-4">
<label class="text-light">ORDRENR    </label>       
<input type="text" name="ordrenr" id="ordrenr" autocomplete="OFF" value="<?php echo $ordrenr; ?>" readonly>
</div>
<div class="col-md-4">
<label class="text-light">KUNDENR   </label>       
<input type="text" name="ordrenr" id="ordrenr" autocomplete="OFF" value="<?php echo $kundenr; ?>" readonly>
</div>
<div class="col-md-4">
<label class="text-light"> KUNDENAVN    </label>       
<input type="text" name="ordrenr" id="ordrenr" autocomplete="OFF" value="<?php echo $kundenavn; ?>" readonly>
</div>
</div>
<br>
<div class="row justify-content-center">    
<div class="col-md-6">
<label class="text-light">KUNDE TELEFON      </label>
<input type="text"  name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $kundetelefon; ?> " readonly>
</div>
<div class="col-md-6">
<label class="text-light">KUNDE EPOST       </label>
<input type="text"  name="kundenr" id="kundenr" autocomplete="OFF" value=" <?php echo $kundeepost; ?>" readonly>
</div>
</div>
<br>
<br>

<div class="row justify-content-center">
<div class="col-md-2">
<center><label class="text-light">LEVERINGSKODE        </label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $leveringskode; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">TRONDHEIM       </label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $trondheim; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">SPESIAL</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $spesial; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">EKSPRESS</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $ekspress; ?>" readonly>
</div>
</div>
<br>
<br>
<div class="row justify-content-center">
<div class="col-md-2">
<center><label class="text-light">OPPRETTET</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $newdatoopprettet; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">FORSKUDD_REGNSKAP</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $newdatosendtforskuddregnskap; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">PRODUKSJON</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $newdatosendtprod; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">FERDIG PRODUSERT</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $newdatoferdigprodusert; ?>" readonly>
</div>
<div class="col-md-2">
<center><label class="text-light">MOTTATT AVDELING</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $newdatomottattavd; ?>" readonly>
</div>
</div>
<br>
<br>
<div class="row justify-content-center">
<div class="col-md-6">
<center><label class="text-light">KOMMENTAR TIL ORDRE</label></center>
<input type="text" rows="5" cols="10" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $kommentartilordre; ?>" readonly>
</div>
<div class="col-md-6">
<center><label class="text-light">KOMMENTAR TIL PRODUKSJON</label></center>
<input type="text" style="text-align:center;" name="kundenr" id="kundenr" autocomplete="OFF" value="<?php echo $kommentartilproduksjon; ?>" readonly>
</div>
</div>

<br>
<br>
<div class="row justify-content-center">
<div class="col-md-3" style="text-align:center;">
<center><label class="text-light">ORDREVEDLEGG</label></center>
<a href="ordremappe/<?php echo $row['ordrenr'] ?>.pdf" style="align:right;" target="new"><img src="img/pdf.png" width=30%></a>
</div>

</div>
<br>
<br>


</div>
   </div>
  </div>
 </body>
</html>


