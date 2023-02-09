<?php

include('../connection.php');
include('../topbar.php');
if (!isset($_SESSION['googleCode'])):
    header("location:../register.php");
	exit();
endif;


$googlecode = $_SESSION['secret'];
$sql = db_query("select * from google_auth where googlecode = '".$googlecode."'");
$row = mysqli_fetch_array($sql);

$firstname 	= $row['fname'];
$lastname 	= $row['lname'];
$email 		= $row['email'];
$usertype 		= $row['usertype'];
$username 		= $row['username'];
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];


//resultat antall ordre total - AVDELING
$resultattotaleordreavd = db_query("SELECT COUNT(1) from ordre where avdeling = '1'");
$row2 = mysqli_fetch_array($resultattotaleordreavd);
$totalordreavd = $row2[0];

//resultat antall ordre under behandling - AVDELING
$resulatubehandledeavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Ubehandlet') or (avdeling = '1' and status = 'Forskudd Faktura Betalt')");
$row3 = mysqli_fetch_array($resulatubehandledeavd);
$totaleubehandledeavd = $row3[0];

//resultat antall ordre sende forskudd faktura - AVDELING
$resultatsendeforskuddfakturaavd = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Forskudd Faktura'");
$row41 = mysqli_fetch_array($resultatsendeforskuddfakturaavd);
$totalesendeforskuddfakturaavd = $row41[0];

//resultat antall ordre sende Sendt Forskudd Regnskap - AVDELING
$resultathosfakturaavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt Forskudd Regnskap') or (avdeling = '1' and status = 'Forskudd Faktura Sendt')");
$row5 = mysqli_fetch_array($resultathosfakturaavd);
$totalehosfakturaavd = $row5[0];

//resultat antall ordre sende Forskudd Faktura Betalt - AVDELING
$resultatforskuddfakturabetaltavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Forskudd Faktura Betalt') ");
$row6 = mysqli_fetch_array($resultatforskuddfakturabetaltavd);
$totaleforskuddfakturabetaltavd = $row6[0];

//resultat antall ordre Hos Produksjon - AVDELING
$resultathosproduksjonavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt Produksjon') ");
$row7 = mysqli_fetch_array($resultathosproduksjonavd);
$totalehosproduksjonavd = $row7[0];

//resultat antall ordre Hos Produksjon  SATT PÅ VENT - AVDELING
$resultathosproduksjonsattpaventavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Satt På Vent') ");
$row8 = mysqli_fetch_array($resultathosproduksjonsattpaventavd);
$totalehosproduksjonsattpaventavd = $row8[0];

//resultat antall ordre Hos Sendt Prod Linje - AVDELING
$resultatsendtprodlinjeavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt Prod Linje') ");
$row9 = mysqli_fetch_array($resultatsendtprodlinjeavd);
$totalesendtprodlinjeavd = $row9[0];

//resultat antall ordre Hos Ferdig Produsert - AVDELING
$resultatferdigprodusertavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Ferdig Produsert') ");
$row10 = mysqli_fetch_array($resultatferdigprodusertavd);
$totaleferdigprodusertavd = $row10[0];

//resultat antall ordre Mottatt Avdeling - AVDELING
$resultatmottattavdelingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Mottatt Avdeling') ");
$row10 = mysqli_fetch_array($resultatmottattavdelingavd);
$totalemottattavdelingavd = $row10[0];

//resultat antall ordre Mottatt Avdeling FRAKT - AVDELING
$resultatmottattavdelingfraktavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'FF') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'FFI') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'FI') ");
$row11 = mysqli_fetch_array($resultatmottattavdelingfraktavd);
$totalemottattavdelingfraktavd = $row11[0];

//resultat antall ordre Mottatt Avdeling HENTING - AVDELING
$resultatmottattavdelinghentingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'HF') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'HFI') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'HI') ");
$row12 = mysqli_fetch_array($resultatmottattavdelinghentingavd);
$totalemottattavdelinghentingavd = $row12[0];

//resultat antall ordre Mottatt Avdeling MONTERING - AVDELING
$resultatmottattavdelingmonteringavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'MF') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'MFI') or (avdeling = '1' and status = 'Mottatt Avdeling' and leveringskode = 'MI') ");
$row13 = mysqli_fetch_array($resultatmottattavdelingmonteringavd);
$totalemottattavdelingmonteringavd = $row13[0];

//resultat antall ordre SENDT KLAR FOR HENTING - AVDELING
$resultatsendthentingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Klar for Henting')");
$row14 = mysqli_fetch_array($resultatsendthentingavd);
$totalesendthentingavd = $row14[0];

//resultat antall ordre KLAR FOR MONTERING - AVDELING
$resultatsendtmontoravd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt til monteringsleder')");
$row15 = mysqli_fetch_array($resultatsendtmontoravd);
$totalesendtmontoravd = $row15[0];

//resultat antall ordre KLAR FOR FRAKT - AVDELING
$resultatsendtfraktavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt til Frakt')");
$row16 = mysqli_fetch_array($resultatsendtfraktavd);
$totalesendtfraktavd = $row16[0];

//resultat antall ordre MONTERING AVTALT - AVDELING
$resultatmonteringavtaltavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Avtalt')");
$row17 = mysqli_fetch_array($resultatmonteringavtaltavd);
$totalemonteringavtaltavd = $row17[0];

//resultat antall ordre MONTERING UTFØRT - AVDELING
$resultatmonteringutfortavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Utført')");
$row18 = mysqli_fetch_array($resultatmonteringutfortavd);
$totalemonteringutfortavd = $row18[0];



// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJON
// 4 = REGNSKAP
// 5 = MONTØR




?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OrdreMekka 1.0</title>
    


</head>
<body>
  <br>
<div class="container-info">
  <div class="col align-self-end">
    <div class="login-info-box">
      Logget inn som:<br>
      <?php echo $firstname; ?> <?php echo $lastname; ?><br>
      <?php echo $avdelingsnavn; ?> <br>
    </div>
  </div>
</div>
<div class="container-linje">

   
   <h1>  AVDELING - STOR OSLO</h1>
    
 
</div>

<br><br><br>


<br>

<div class="container-linje-stor">
  <div class="row"> 
    <div class="col"> 
     <center>SENDT TIL PRODUKSJON</center>
    </div>
    <div class="col"> 
     <center>SATT PÅ VENT</center>
    </div>
    <div class="col"> 
     <center>PRODUKSJONSLINJA</center>
    </div>
    <div class="col"> 
     <center>FERDIG PRODUSERT</center>
    </div>
   
  </div>

  <div class="row"> 
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre1.php" class="dashboardlink"><?php echo $totalehosproduksjonavd; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre1.php" class="dashboardlink"><?php if($totalehosproduksjonsattpaventavd > 0){ echo "<font color='red'>$totalehosproduksjonsattpaventavd</font>";}else{ echo $totalehosproduksjonsattpaventavd;} ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><?php echo $totalesendtprodlinjeavd; ?></h1></center>
    </div>
    <div class="col"> <br>
    <center><h1><a href="<?php echo $baseurl; ?>/produksjon/ferdigprodusert1.php" class="dashboardlink"><?php if($totaleferdigprodusertavd > 0){ echo "<font color='red'>$totaleferdigprodusertavd</font>";}else{echo $totaleferdigprodusertavd;} ?></h1></center></a>
    </div>
   
  </div>
</div>
<br>
<div class="container-linje-stor">
  <div class="row"> 
    <div class="col"> 
     <center>MOTTATT AVDELING</center>
    </div>
    <div class="col"> 
     <center>FRAKT ORDRE</center>
    </div>
    <div class="col"> 
     <center>HENTE ORDRE</center>
    </div>
    <div class="col"> 
     <center>MONTERING ORDRE</center>
    </div>
  </div>

  <div class="row"> 
  <div class="col"> <br>
    <center><h1><a href="mottattavdeling.php" class="dashboardlink"><?php  if($totalemottattavdelingavd > 0){ echo "<font color='red'>$totalemottattavdelingavd</font>";}else{echo $totalemottattavdelingavd;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="fraktordre.php" class="dashboardlink"><?php if($totalemottattavdelingfraktavd > 0){ echo "<font color='red'>$totalemottattavdelingfraktavd</font>";}else{echo $totalemottattavdelingfraktavd;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="henteordre.php" class="dashboardlink"><?php if($totalemottattavdelinghentingavd > 0){ echo "<font color='red'>$totalemottattavdelinghentingavd</font>";}else{echo $totalemottattavdelinghentingavd;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="monteringsordre.php" class="dashboardlink"><?php if($totalemottattavdelingmonteringavd > 0){ echo "<font color='red'>$totalemottattavdelingmonteringavd</font>";}else{echo $totalemottattavdelingmonteringavd;} ?></h1></center></a>  
    </div>
  </div>
</div>
<br>
<div class="container-linje-stor">
  <div class="row"> 
  <div class="col"> 
     <center>KLAR FOR HENTING</center>
    </div> 
  <div class="col"> 
     <center>SENDT TIL FRAKT</center>
    </div>
       <div class="col"> 
     <center>SENDT TIL MONTERING</center>
    </div>
  </div>

  <div class="row"> 
    <div class="col"> <br>
    <h1><center><?php echo $totalesendthentingavd; ?></center></h1>
    </div>
    <div class="col"> <br>
    <h1><center><?php echo $totalesendtfraktavd; ?></center></h1>
    </div>
       <div class="col"> <br>
    <h1><center><?php echo $totalesendtmontoravd; ?></center></h1>
    </div>
  </div>
</div>
<br>
<div class="container-linje-stor">
  <div class="row"> 
    <div class="col"> 
     <center>MONTERING AVTALT</center>
    </div>
    <div class="col"> 
     <center>MONTERING UTFØRT</center>
    </div>
    <div class="col"> 
     <center>KLAR FOR GODKJENNING</center>
    </div>
  </div>

  <div class="row"> 
    <div class="col"> <br>
    <h1><center><?php echo $totalemonteringavtaltavd; ?></center></h1>
    </div>
    <div class="col"> <br>
    <h1><center><?php echo $totalemonteringutfortavd; ?></center></h1>
    </div>
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
  </div>
</div>


</body>
<?php
include("../footer.php");
?>
</html>