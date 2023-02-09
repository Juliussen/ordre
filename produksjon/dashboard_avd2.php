<?php

include('../connection.php');

if (!isset($_SESSION['googleCode'])):
    header("location:../register.php");
	exit();
endif;
include('../topbar.php');

$googlecode = $_SESSION['secret'];
$sql = db_query("select * from google_auth where googlecode = '".$googlecode."'");
$row = mysqli_fetch_array($sql);

$firstname 	= $row['fname'];
$lastname 	= $row['lname'];
$email 		= $row['email'];
$usertype 		= $row['usertype'];
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];


//resultat antall ordre total
$resultattotaleordre = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."'");
$row2 = mysqli_fetch_array($resultattotaleordre);
$totalordre = $row2[0];

//resultat antall ordre under behandling
$resulatubehandlede = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Ubehandlet') or (selger = '".$firstname."' and status = 'Forskudd Faktura Betalt')");
$row3 = mysqli_fetch_array($resulatubehandlede);
$totaleubehandlede = $row3[0];

//resultat antall ordre skal sende faktura
$resultatskalsendeffaktura = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Forskudd Faktura')");
$row41 = mysqli_fetch_array($resultatskalsendeffaktura);
$totaleskalsendeffaktura = $row41[0];

//resultat antall ordre hos faktura
$resultathosfaktura = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Sendt Forskudd Regnskap') or (selger = '".$firstname."' and status = 'Forskudd Faktura Sendt')");
$row4 = mysqli_fetch_array($resultathosfaktura);
$totalehosfaktura = $row4[0];

//resultat antall ordre betalt faktura
$resultatbetaltfaktura = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Forskudd Faktura Betalt'");
$row5 = mysqli_fetch_array($resultatbetaltfaktura);
$totalebetaltfaktura = $row5[0];

//resultat antall ordre hos produksjon
$resultatsendtproduksjon = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt Produksjon'");
$row6 = mysqli_fetch_array($resultatsendtproduksjon);
$totalesendtproduksjon = $row6[0];

//resultat antall ordre hos produksjon
$resultatsattpavent = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Satt På Vent'");
$row61 = mysqli_fetch_array($resultatsattpavent);
$totalesattpavent = $row61[0];

//resultat antall ordre hos produksjons linja
$resultatsendtprodlinja = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt Prod Linje'");
$row7 = mysqli_fetch_array($resultatsendtprodlinja);
$totalesendtprodlinja = $row7[0];

//resultat antall ordre ferdig produsert
$resultatferdigprodusert = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Ferdig Produsert'");
$row8 = mysqli_fetch_array($resultatferdigprodusert);
$totaleferdigprodusert = $row8[0];

//resultat antall ordre mottatt adeling
$resultatmottattavdeling = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Mottatt Avdeling'");
$row81 = mysqli_fetch_array($resultatmottattavdeling);
$totalemottattavdeling = $row81[0];

//resultat antall ordre hos montør
$resultatsendtmontor = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt til Montør'");
$row9 = mysqli_fetch_array($resultatsendtmontor);
$totalesendtmontor = $row9[0];

//resultat antall ordre hos produksjons linja
$resultatsendtfrakt = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt til Frakt'");
$row10 = mysqli_fetch_array($resultatsendtfrakt);
$totalesendtfrakt = $row10[0];

//resultat antall ordre ferdig produsert
$resultatsendthenting = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt til Henting'");
$row11 = mysqli_fetch_array($resultatsendthenting);
$totalesendthenting = $row11[0];



// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJON
// 4 = REGNSKAP
// 5 = MONTØR


include("../footer.php");

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
    <p>
<div class="container-info">
  <div class="col align-self-end">
    <div class="login-info-box">
      Logget inn som:<br>
      <?php echo $firstname; ?> <?php echo $lastname; ?><br>
      <?php echo $avdelingsnavn; ?> <br>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="col">
    <h1>
      AVDELING TRONDHEIM
</h1>
</div>
  </div>
</div><br>
<br><br>


<div class="container-fluid">
  <div class="row">
    <div class="col-gap infobox">
    <div class="topptekst">ORDRER:</div>
    <br>DINE NYESTE ORDRER
    <br>KOMMER HER!
    </div>
    <div class="col-gap infobox">
    <div class="topptekst">MINE OPPGAVER:</div>
    <br><h6><?php if($totaleubehandlede > 0){echo "Ubehandlede ordre antall:  <font color='red'>  $totaleubehandlede </font>";}else { } ?></h6>
    <br><h6><?php if($totalesattpavent > 0){echo "Ordrer Satt på vent:  <font color='red'>  $totalesattpavent </font>";}else { } ?></h6>
    
    </div>
    <div class="col-gap infobox">
    <div class="topptekst">AVDELING OPPGAVER:</div>
    <br>KOMMER HER!
    <br>
    </div>
    <div class="col infobox">
    <div class="topptekst">STATISITKK ?:</div>
    <br><center><h4><a href="mineordre.php" class="dashboardlink"><?php echo "TOTALT ORDRE $totalordre"; ?></h4></center></a>
    <br><center><h4><a href="mineordre.php" class="dashboardlink"><?php echo "TOTALT FULLFØRT 0"; ?></h4></center></a>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>UBEHANDLEDE</center>
    </div>
    <div class="col"> 
     <center>SENDE FORSKUDD FAKTURA</center>
    </div>
    <div class="col"> 
     <center>FORSKUDD REGNSKAP</center>
    </div>
    <div class="col"> 
     <center>BETALT FORSKUDD FAKTURA</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totaleubehandlede  > 0){ echo "<font color='red'>$totaleubehandlede</font>";}else{ echo $totaleubehandlede; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre_faktura.php" class="dashboardlink"><?php if($totaleskalsendeffaktura  > 0){ echo "<font color='red'>$totaleskalsendeffaktura</font>";}else{ echo $totaleskalsendeffaktura; }; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre_hosfaktura.php" class="dashboardlink"><?php echo $totalehosfaktura; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totalebetaltfaktura > 0){ echo "<font color='red'>$totalebetaltfaktura</font>";}else{ echo $totalebetaltfaktura;} ?></h1></center></a>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>HOS PRODUKSJON</center>
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
    <div class="col"> 
     <center>MOTTATT AVDELING</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="hosproduksjon.php" class="dashboardlink"><?php echo $totalesendtproduksjon; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="hosproduksjon_pavent.php" class="dashboardlink"><?php if($totalesattpavent > 0){ echo "<font color='red'>$totalesattpavent</font>";}else{ echo $totalesattpavent;} ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><?php echo $totalesendtprodlinja; ?></h1></center>
    </div>
    <div class="col"> 
    <center><h1><a href="ferdigprodusert.php" class="dashboardlink"><?php echo $totaleferdigprodusert; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><?php echo $totalemottattavdeling; ?></h1></center>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>UBEHANDLEDE</center>
    </div>
    <div class="col"> 
     <center>SENDE FF</center>
    </div>
    <div class="col"> 
     <center>ORDRE 1</center>
    </div>
    <div class="col"> 
     <center>ORDRE 1</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <h1><center>1</center></h1>
    </div>
    <div class="col"> 
    <h1><center><font color="red">1</center></h1></font>
    </div>
    <div class="col"> 
    <h1><center>1</center></h1>
    </div>
    <div class="col"> 
    <h1><center>1</center></h1>
    </div>
  </div>
</div>
</body>
<?php
include("footer.php");
?>
</html>