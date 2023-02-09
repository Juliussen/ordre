<?php
include('../connection.php');


if (!isset($_SESSION['googleCode'])):
    header("location:../register.php");
	exit();
endif;


$googlecode = $_SESSION['secret'];
$sql = db_query("select * from google_auth where googlecode = '".$googlecode."'");
$row = mysqli_fetch_array($sql);
$firstname 	= $row['username'];
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

//resultat antall ordre mottatt adeling - FRAKT ORDRE
$resultatmottattavdelingfrakt = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'FF') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'FI') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'FFI')");
$row811 = mysqli_fetch_array($resultatmottattavdelingfrakt);
$totalemottattavdelingfrakt = $row811[0];

//resultat antall ordre mottatt adeling
$resultatmottattavdelingmontering = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'MF') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'MI') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'MFI')");
$row812 = mysqli_fetch_array($resultatmottattavdelingmontering);
$totalemottattavdelingmontering = $row812[0];

//resultat antall ordre mottatt adeling
$resultatmottattavdelinghenting = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'HF') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'HI') or (selger = '".$firstname."' and status = 'Mottatt Avdeling' and leveringskode = 'HFI')");
$row813 = mysqli_fetch_array($resultatmottattavdelinghenting);
$totalemottattavdelinghenting = $row813[0];

//resultat antall ordre sendt til montør
$resultatsendtmontor = db_query("SELECT COUNT(1) from ordre where (selger = '".$firstname."' and status = 'Sendt til Monteringsleder') or (selger = '".$firstname."' and status = 'Sendt til Montør')");
$row9 = mysqli_fetch_array($resultatsendtmontor);
$totalesendtmontor = $row9[0];

//resultat antall ordre sendt til frakt
$resultatsendtfrakt = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Sendt til Frakt'");
$row10 = mysqli_fetch_array($resultatsendtfrakt);
$totalesendtfrakt = $row10[0];

//resultat antall ordre sendt til henting
$resultatsendthenting = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Klar for Henting'");
$row11 = mysqli_fetch_array($resultatsendthenting);
$totalesendthenting = $row11[0];

//resultat antall ordre som er fullført
$resultatfullfort = db_query("SELECT COUNT(1) from ordre where selger = '".$firstname."' and status = 'Fullført'");
$row12 = mysqli_fetch_array($resultatfullfort);
$totalefullfort = $row12[0];


include('../topbar.php');


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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




<div class="container-fluid ">
  <div class="row">
   
    <div class="col-gap infobox">
    <div class="topptekst">MINE OPPGAVER:</div><font size="3px">
    <?php if($totaleubehandlede > 0){echo "Ubehandlede ordre antall:  <font color='red'>  $totaleubehandlede </font><br>";}else { } ?>
    <?php if($totalesattpavent > 0){echo "Ordrer Satt på vent:  <font color='red'>  $totalesattpavent </font><br>";}else { } ?>
    <?php if($totaleferdigprodusert > 0){echo "Ordrer Ferdig produsert:  <font color='red'>  $totaleferdigprodusert </font><br>";}else { } ?>
    <?php if($totalemottattavdeling > 0){echo "Ordrer Mottatt avdeling:  <font color='red'>  $totalemottattavdeling </font><br>";}else { } ?>
    
</font>
    </div>
    <div class="col-gap infobox">
    <div class="topptekst">AVDELING OPPGAVER:</div>
    <br>KOMMER HER!
    <br>
    </div>
    <div class="col infobox">
    <div class="topptekst">STATISITKK ?:</div>
    <br><center><h4><a href="mineordre.php" class="dashboardlink"><?php echo "TOTALT ORDRE $totalordre"; ?></h4></center></a>
    <br><center><h4><a href="mineordre.php" class="dashboardlink"><?php echo "TOTALT FULLFØRT $totalefullfort"; ?></h4></center></a>
    </div>
  </div>
</div>
<br>
<div class="container-linje ">
  <div class="row"> 
    <div class="col"> 
     <center>UBEHANDLEDE</center>
    </div>
    <div class="col"> 
     <center>SENDE FF</center>
    </div>
    <div class="col"> 
     <center>FORSKUDD REGNSKAP</center>
    </div>
    <div class="col"> 
     <center>BETALT FF</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totaleubehandlede  > 0){ echo "<font color='red'>$totaleubehandlede</font>";}else{ echo $totaleubehandlede; } ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre_faktura.php" class="dashboardlink"><?php if($totaleskalsendeffaktura  > 0){ echo "<font color='red'>$totaleskalsendeffaktura</font>";}else{ echo $totaleskalsendeffaktura; }; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre_hosfaktura.php" class="dashboardlink"><?php echo $totalehosfaktura; ?></h1></center></a>
    </div>
    <div class="col"> <br>
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
   
   
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> <br>
    <center><h1><a href="hosproduksjon.php" class="dashboardlink"><?php echo $totalesendtproduksjon; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="hosproduksjon_pavent.php" class="dashboardlink"><?php if($totalesattpavent > 0){ echo "<font color='red'>$totalesattpavent</font>";}else{ echo $totalesattpavent;} ?></h1></center></a>
    </div>
   
   
  </div>
</div>

<br>
<div class="container-linje">
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
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> <br>
    <h1><center><?php echo $totalesendthenting; ?></center></h1>
    </div>
    <div class="col"> <br>
    <h1><center><?php echo $totalesendtfrakt; ?></center></h1>
    </div>
       <div class="col"> <br>
    <h1><center><?php echo $totalesendtmontor; ?></center></h1>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>MONTERING AVTALT</center>
    </div>
    <div class="col"> 
     <center>MONTERING FULLFØRT</center>
    </div>
    <div class="col"> 
     <center>SENDT TIL FAKTURA</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>MONTERING AVTALT</center>
    </div>
    <div class="col"> 
     <center>MONTERING FULLFØRT</center>
    </div>
    <div class="col"> 
     <center>SENDT TIL FAKTURA</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
    <div class="col"> <br>
    <h1><center>00</center></h1>
    </div>
  </div>
</div>
<div class="container-fluid">
<div class="row"> 
    <div class="col">
HER KOMMER MER STATISTIKK OVER LEVERTE ORDRE OSV
<br>

</div></div></div>

</body>
<?php
include("../footer.php");
?>
</html>