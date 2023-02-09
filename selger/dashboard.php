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
$username 		= $row['username'];
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];


//resultat antall ordre total - AVDELING
$resultattotaleordreavd = db_query("SELECT COUNT(1) from ordre where avdeling = '".$avdelingsnr."'");
$row2 = mysqli_fetch_array($resultattotaleordreavd);
$totalordreavd = $row2[0];

//resultat antall ordre total - MINE
$resultattotaleordre = db_query("SELECT COUNT(1) from ordre where selger = '".$username."'");
$row21 = mysqli_fetch_array($resultattotaleordre);
$totalordre = $row21[0];

//resultat antall ordre under behandling - AVDELING
$resulatubehandledeavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Ubehandlet') or (avdeling = '".$avdelingsnr."' and status = 'Forskudd Faktura Betalt')");
$row3 = mysqli_fetch_array($resulatubehandledeavd);
$totaleubehandledeavd = $row3[0];

//resultat antall ordre under behandling - MINE
$resulatubehandlede = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Ubehandlet') ");
$row31 = mysqli_fetch_array($resulatubehandlede);
$totaleubehandlede = $row31[0];

//resultat antall ordre sende forskudd faktura - AVDELING
$resultatsendeforskuddfakturaavd = db_query("SELECT COUNT(1) from ordre where avdeling = '".$avdelingsnr."' and status = 'Forskudd Faktura'");
$row41 = mysqli_fetch_array($resultatsendeforskuddfakturaavd);
$totalesendeforskuddfakturaavd = $row41[0];

//resultat antall ordre sende forskudd faktura - MINE
$resultatsendeforskuddfaktura = db_query("SELECT COUNT(1) from ordre where selger = '".$username."' and status = 'Forskudd Faktura'");
$row411 = mysqli_fetch_array($resultatsendeforskuddfaktura);
$totalesendeforskuddfaktura = $row411[0];

//resultat antall ordre sende Sendt Forskudd Regnskap - AVDELING
$resultathosfakturaavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Sendt Forskudd Regnskap') or (avdeling = '".$avdelingsnr."' and status = 'Forskudd Faktura Sendt')");
$row5 = mysqli_fetch_array($resultathosfakturaavd);
$totalehosfakturaavd = $row5[0];

//resultat antall ordre sende Sendt Forskudd Regnskap - MINE
$resultathosfaktura = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt Forskudd Regnskap') or (selger = '".$username."' and status = 'Forskudd Faktura Sendt')");
$row51 = mysqli_fetch_array($resultathosfaktura);
$totalehosfaktura = $row51[0];

//resultat antall ordre sende Forskudd Faktura Betalt - AVDELING
$resultatforskuddfakturabetaltavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Forskudd Faktura Betalt') ");
$row6 = mysqli_fetch_array($resultatforskuddfakturabetaltavd);
$totaleforskuddfakturabetaltavd = $row6[0];

//resultat antall ordre sende Forskudd Faktura Betalt - MINE
$resultatforskuddfakturabetalt = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Forskudd Faktura Betalt') ");
$row61 = mysqli_fetch_array($resultatforskuddfakturabetalt);
$totaleforskuddfakturabetalt = $row61[0];

//resultat antall ordre Hos Produksjon - AVDELING
$resultathosproduksjonavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Sendt Produksjon') ");
$row7 = mysqli_fetch_array($resultathosproduksjonavd);
$totalehosproduksjonavd = $row7[0];

//resultat antall ordre Hos Produksjon - MINE
$resultathosproduksjon = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt Produksjon') ");
$row71 = mysqli_fetch_array($resultathosproduksjon);
$totalehosproduksjon = $row71[0];

//resultat antall ordre Hos Produksjon  SATT PÅ VENT - AVDELING
$resultathosproduksjonsattpaventavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Satt På Vent') ");
$row8 = mysqli_fetch_array($resultathosproduksjonsattpaventavd);
$totalehosproduksjonsattpaventavd = $row8[0];

//resultat antall ordre Hos Produksjon SATT PÅ VENT - MINE
$resultathosproduksjonsattpavent = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Satt På Vent') ");
$row81 = mysqli_fetch_array($resultathosproduksjonsattpavent);
$totalehosproduksjonsattpavent = $row81[0];

//resultat antall ordre Hos Sendt Prod Linje - AVDELING
$resultatsendtprodlinjeavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Sendt Prod Linje') ");
$row9 = mysqli_fetch_array($resultatsendtprodlinjeavd);
$totalesendtprodlinjeavd = $row9[0];

//resultat antall ordre Hos Sendt Prod Linje - MINE
$resultatsendtprodlinje = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt Prod Linje') ");
$row91 = mysqli_fetch_array($resultatsendtprodlinje);
$totalesendtprodlinje = $row91[0];

//resultat antall ordre Hos Ferdig Produsert - AVDELING
$resultatferdigprodusertavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Ferdig Produsert') ");
$row10 = mysqli_fetch_array($resultatferdigprodusertavd);
$totaleferdigprodusertavd = $row10[0];

//resultat antall ordre Hos Ferdig Produsert - MINE
$resultatferdigprodusert = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Ferdig Produsert') ");
$row101 = mysqli_fetch_array($resultatferdigprodusert);
$totaleferdigprodusert = $row101[0];

//resultat antall ordre Mottatt Avdeling - AVDELING
$resultatmottattavdelingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling') ");
$row10 = mysqli_fetch_array($resultatmottattavdelingavd);
$totalemottattavdelingavd = $row10[0];

//resultat antall ordre Mottatt Avdeling - MINE
$resultatmottattavdeling = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Mottatt Avdeling') ");
$row101 = mysqli_fetch_array($resultatmottattavdeling);
$totalemottattavdeling = $row101[0];

//resultat antall ordre Mottatt Avdeling FRAKT - AVDELING
$resultatmottattavdelingfraktavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'FF') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'FFI') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'FI') ");
$row11 = mysqli_fetch_array($resultatmottattavdelingfraktavd);
$totalemottattavdelingfraktavd = $row11[0];

//resultat antall ordre Mottatt Avdeling FRAKT - MINE
$resultatmottattavdelingfrakt = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'FF') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'FFI') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'FI') ");
$row111 = mysqli_fetch_array($resultatmottattavdelingfrakt);
$totalemottattavdelingfrakt = $row111[0];

//resultat antall ordre Mottatt Avdeling HENTING - AVDELING
$resultatmottattavdelinghentingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'HF') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'HFI') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'HI') ");
$row12 = mysqli_fetch_array($resultatmottattavdelinghentingavd);
$totalemottattavdelinghentingavd = $row12[0];

//resultat antall ordre Mottatt Avdeling HENTING - MINE
$resultatmottattavdelinghenting = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'HF') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'HFI') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'HI') ");
$row121 = mysqli_fetch_array($resultatmottattavdelinghenting);
$totalemottattavdelinghenting = $row121[0];

//resultat antall ordre Mottatt Avdeling MONTERING - AVDELING
$resultatmottattavdelingmonteringavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'MF') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'MFI') or (avdeling = '".$avdelingsnr."' and status = 'Mottatt Avdeling' and leveringskode = 'MI') ");
$row13 = mysqli_fetch_array($resultatmottattavdelingmonteringavd);
$totalemottattavdelingmonteringavd = $row13[0];

//resultat antall ordre Mottatt Avdeling MONTERING - MINE
$resultatmottattavdelingmontering = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'MF') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'MFI') or (selger = '".$username."' and status = 'Mottatt Avdeling' and leveringskode = 'MI') ");
$row131 = mysqli_fetch_array($resultatmottattavdelingmontering);
$totalemottattavdelingmontering = $row131[0];

//resultat antall ordre SENDT KLAR FOR HENTING - AVDELING
$resultatsendthentingavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Klar for Henting')");
$row14 = mysqli_fetch_array($resultatsendthentingavd);
$totalesendthentingavd = $row14[0];

//resultat antall ordre SENDT KLAR FOR HENTING - MINE
$resultatsendthenting = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Klar for Henting')");
$row141 = mysqli_fetch_array($resultatsendthenting);
$totalesendthenting = $row141[0];

//resultat antall ordre KLAR FOR MONTERING - AVDELING
$resultatsendtmontoravd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Sendt til monteringsleder')");
$row15 = mysqli_fetch_array($resultatsendtmontoravd);
$totalesendtmontoravd = $row15[0];

//resultat antall ordre KLAR FOR MONTERING - MINE
$resultatsendtmontor = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt til monteringsleder')");
$row151 = mysqli_fetch_array($resultatsendtmontor);
$totalesendtmontor = $row151[0];

//resultat antall ordre KLAR FOR FRAKT - AVDELING
$resultatsendtfraktavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Sendt til Frakt')");
$row16 = mysqli_fetch_array($resultatsendtfraktavd);
$totalesendtfraktavd = $row16[0];

//resultat antall ordre KLAR FOR FRAKT - MINE
$resultatsendtfrakt = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt til Frakt')");
$row161 = mysqli_fetch_array($resultatsendtfrakt);
$totalesendtfrakt = $row161[0];

//resultat antall ordre MONTERING AVTALT - AVDELING
$resultatmonteringavtaltavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Montering Avtalt')");
$row17 = mysqli_fetch_array($resultatmonteringavtaltavd);
$totalemonteringavtaltavd = $row17[0];

//resultat antall ordre MONTERING AVTALT - MINE
$resultatmonteringavtalt = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Montering Avtalt')");
$row171 = mysqli_fetch_array($resultatmonteringavtalt);
$totalemonteringavtalt = $row171[0];

//resultat antall ordre MONTERING UTFØRT - AVDELING
$resultatmonteringutfortavd = db_query("SELECT COUNT(1) from ordre where (avdeling = '".$avdelingsnr."' and status = 'Montering Utført')");
$row18 = mysqli_fetch_array($resultatmonteringutfortavd);
$totalemonteringutfortavd = $row18[0];

//resultat antall ordre MONTERING UTFØRT - MINE
$resultatmonteringutfort = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Montering Utført')");
$row181 = mysqli_fetch_array($resultatmonteringutfort);
$totalemonteringutfort = $row181[0];




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




<div class="container-fluid2">
  <div class="row">
   
    <div class="col-gap infobox">
    <div class="topptekst">MINE OPPGAVER:</div><font size="3px">
    <?php if($totaleubehandlede > 0){echo "Ubehandlede ordre antall:  <font color='red'>  $totaleubehandlede </font><br>";}else { } ?>
    <?php if($totalesendeforskuddfaktura > 0){echo "Sende Forskudd Faktura:  <font color='red'>  $totalesendeforskuddfaktura </font><br>";}else { } ?>
    <?php if($totalehosproduksjonsattpavent > 0){echo "Satt på vent:  <font color='red'>  $totalehosproduksjonsattpavent </font><br>";}else { } ?>
    <?php if($totaleforskuddfakturabetalt > 0){echo "Forskudd Faktura Betalt:  <font color='red'>  $totaleforskuddfakturabetalt </font><br>";}else { } ?>
    <?php if($totaleferdigprodusert > 0){echo "Ferdig produsert:  <font color='red'>  $totaleferdigprodusert </font><br>";}else { } ?>
    <?php if($totalemottattavdeling > 0){echo "Mottatt avdeling:  <font color='red'>  $totalemottattavdeling </font><br>";}else { } ?>
    
</font>
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

  <div class="row"> 
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totaleubehandlede  > 0){ echo "<font color='red'>$totaleubehandlede</font>";}else{ echo $totaleubehandlede; } ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre_faktura.php" class="dashboardlink"><?php if($totalesendeforskuddfaktura  > 0){ echo "<font color='red'>$totalesendeforskuddfaktura</font>";}else{ echo $totalesendeforskuddfaktura; }; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre_hosfaktura.php" class="dashboardlink"><?php echo $totalehosfaktura; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totaleforskuddfakturabetalt > 0){ echo "<font color='red'>$totaleforskuddfakturabetalt</font>";}else{ echo $totaleforskuddfakturabetalt;} ?></h1></center></a>
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
   
  </div>

  <div class="row"> 
    <div class="col"> <br>
    <center><h1><a href="hosproduksjon.php" class="dashboardlink"><?php echo $totalehosproduksjon; ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><a href="hosproduksjon_pavent.php" class="dashboardlink"><?php if($totalehosproduksjonsattpavent > 0){ echo "<font color='red'>$totalehosproduksjonsattpavent</font>";}else{ echo $totalehosproduksjonsattpavent;} ?></h1></center></a>
    </div>
    <div class="col"> <br>
    <center><h1><?php echo $totalesendtprodlinje; ?></h1></center>
    </div>
    <div class="col"> <br>
    <center><h1><a href="ferdigprodusert.php" class="dashboardlink"><?php if($totaleferdigprodusert > 0){ echo "<font color='red'>$totaleferdigprodusert</font>";}else{echo $totaleferdigprodusert;} ?></h1></center></a>
    </div>
   
  </div>
</div>
<br>
<div class="container-linje">
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
    <center><h1><a href="mottattavdeling.php" class="dashboardlink"><?php  if($totalemottattavdeling > 0){ echo "<font color='red'>$totalemottattavdeling</font>";}else{echo $totalemottattavdeling;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="fraktordre.php" class="dashboardlink"><?php if($totalemottattavdelingfrakt > 0){ echo "<font color='red'>$totalemottattavdelingfrakt</font>";}else{echo $totalemottattavdelingfrakt;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="henteordre.php" class="dashboardlink"><?php if($totalemottattavdelinghenting > 0){ echo "<font color='red'>$totalemottattavdelinghenting</font>";}else{echo $totalemottattavdelinghenting;} ?></h1></center></a>  
    </div>
    <div class="col"> <br>
    <h1><center><a href="monteringsordre.php" class="dashboardlink"><?php if($totalemottattavdelingmontering > 0){ echo "<font color='red'>$totalemottattavdelingmontering</font>";}else{echo $totalemottattavdelingmontering;} ?></h1></center></a>  
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
     <center>MONTERING UTFØRT</center>
    </div>
    <div class="col"> 
     <center>KLAR FOR GODKJENNING</center>
    </div>
  </div>

  <div class="row"> 
    <div class="col"> <br>
    <h1><center><?php echo $totalemonteringavtalt; ?></center></h1>
    </div>
    <div class="col"> <br>
    <h1><center><?php echo $totalemonteringutfort; ?></center></h1>
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