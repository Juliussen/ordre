<?php
include('../connection.php');


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
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];


//resultat antall ordre total
$resultattotaleordre = db_query("SELECT COUNT(1) from ordre where status = 'Sendt Forskudd Regnskap'");
$row2 = mysqli_fetch_array($resultattotaleordre);
$totaleordre = $row2[0];

//resultat antall ordre forskudd faktura sendt
$resultatforskuddfakturasendt = db_query("SELECT COUNT(1) from ordre where status = 'Forskudd Faktura Sendt'");
$row3 = mysqli_fetch_array($resultatforskuddfakturasendt);
$forskuddfakturasendt = $row3[0];

//resultat antall ordre hvor forskudd faktura er betalt
$resultattotaleforskudfakturabetalt = db_query("SELECT COUNT(1) from ordre where status = 'Forskudd Faktura Betalt'");
$row4 = mysqli_fetch_array($resultattotaleforskudfakturabetalt);
$totaleforskudfakturabetalt = $row4[0];

//resultat antall klar for sluttfaktura
$resultattotaleklarforsluttfaktura = db_query("SELECT COUNT(1) from ordre where (status = 'Montering Utført') or (status = 'Frakt Utført') or (status = 'Klar for Henting')");
$row5 = mysqli_fetch_array($resultattotaleklarforsluttfaktura);
$totaleklarforsluttfaktura = $row5[0];

//resultat antall SENDT sluttfaktura
$resultattotalsluttfakturasendt = db_query("SELECT COUNT(1) from ordre where status  = 'Sluttfaktura Sendt'");
$row6 = mysqli_fetch_array($resultattotalsluttfakturasendt);
$totalsluttfakturasendt = $row6[0];

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
 <br><br>
 <br>
 <br>



<div class="container-fluid2">
  <div class="row">
   
    <div class="col-gap infobox">
    <div class="topptekst">MINE OPPGAVER:</div>
    <h6><?php if($totaleubehandlede > 0){echo "Ubehandlede ordre antall:  <font color='red'>  $totaleubehandlede </font><br>";}else { } ?></h6>
    <h6><?php if($totaleklarforsluttfaktura > 0){echo "Klare for Sluttfaktura:  <font color='red'>  $totaleklarforsluttfaktura </font><br>";}else { } ?></h6>
    
    </div>
    </div></div>
<br><br>
<div class="container-linje2-full">
  <div class="row"> 
    <div class="col"> 
     <center>UBEHANDLEDE</center>
    </div>
    <div class="col"> 
     <center>SENDT FORSKUDD FAKTURA</center>
    </div>
    <div class="col"> 
     <center>FORSKUDD FAKTURA BETALT</center>
    </div>
    <div class="col"> 
     <center>KLAR FOR SLUTTFAKTURA</center>
    </div>
    <div class="col"> 
     <center>SLUTTFAKTURA SENDT</center>
    </div>
  </div>
<br><br>

  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totaleordre  > 0){ echo "<font color='red'>$totaleordre</font>";}else{ echo $totaleordre; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="forskuddfakturasendt.php" class="dashboardlink"><?php  echo $forskuddfakturasendt;  ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="forskuddfakturabetalt.php" class="dashboardlink"><?php echo $totaleforskudfakturabetalt; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="sluttfaktura.php" class="dashboardlink"><?php if($totaleklarforsluttfaktura  > 0){ echo "<font color='red'>$totaleklarforsluttfaktura</font>";}else{ echo $totaleklarforsluttfaktura; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="sluttfaktura.php" class="dashboardlink"><?php if($totalsluttfakturasendt  > 0){ echo "<font color='red'>$totalsluttfakturasendt</font>";}else{ echo $totalsluttfakturasendt; } ?></h1></center></a>
    </div>
  </div>
</div>
<br>

</body>
<?php
include("footer.php");
?>
</html>