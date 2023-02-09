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

//MONTERINGSLEDER avdeling 1 og 3

//resultat antall ordre klare for montering
$resultatklarformontering = db_query("SELECT COUNT(1) from ordre where  (avdeling = '1' and status = 'Sendt til Monteringsleder' and leveringskode = 'MF') or 
                                                                        (avdeling = '1' and status = 'Sendt til Monteringsleder' and leveringskode = 'MFI') or 
                                                                        (avdeling = '1' and status = 'Sendt til Monteringsleder' and leveringskode = 'MI') or 
                                                                        (avdeling = '3' and status = 'Sendt til Monteringsleder' and leveringskode = 'MF') or 
                                                                        (avdeling = '3' and status = 'Sendt til Monteringsleder' and leveringskode = 'MFI') or 
                                                                        (avdeling = '3' and status = 'Sendt til Monteringsleder' and leveringskode = 'MI')");
$row9 = mysqli_fetch_array($resultatklarformontering);
$totaleklarformontering = $row9[0];

//resultat antall ordre hvor ordre er send til montør
$resultatsendtmontor = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt til Montør') or (avdeling = '3' and status = 'Sendt til Montør')");
$row10 = mysqli_fetch_array($resultatsendtmontor);
$totalesendtmontor = $row10[0];

//resultat antall ordre hvor montering er avtalt
$resultatmonteringavtalt = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Avtalt') or (avdeling = '3' and status = 'Montering Avtalt')");
$row11 = mysqli_fetch_array($resultatmonteringavtalt);
$totalemonteringavtalt = $row11[0];

//resultat antall ordre montering ferdig
$resultatmonteringferdig = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Ferdig') or (avdeling = '3' and status = 'Montering Ferdig')");
$row12 = mysqli_fetch_array($resultatmonteringferdig);
$totalemonteringferdig = $row12[0];

//resultat antall ordre klare for frakt
$resultatklarforfrakt = db_query("SELECT COUNT(1) from ordre where  (avdeling = '1' and status = 'Sendt til Frakt' and leveringskode = 'FF') or 
                                                                    (avdeling = '1' and status = 'Sendt til Frakt' and leveringskode = 'FFI') or 
                                                                    (avdeling = '1' and status = 'Sendt til Frakt' and leveringskode = 'FI') or 
                                                                    (avdeling = '3' and status = 'Sendt til Frakt' and leveringskode = 'FF') or 
                                                                    (avdeling = '3' and status = 'Sendt til Frakt' and leveringskode = 'FFI') or 
                                                                    (avdeling = '3' and status = 'Sendt til Frakt' and leveringskode = 'FI')");
$row9 = mysqli_fetch_array($resultatklarforfrakt);
$totaleklarforfrakt = $row9[0];

//resultat antall ordre hvor ordre er send til montør
$resultatsendtfrakt = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Sendt til Frakt') or (avdeling = '3' and status = 'Sendt til Montør')");
$row10 = mysqli_fetch_array($resultatsendtfrakt);
$totalesendtfrakt = $row10[0];

//resultat antall ordre hvor frakt er avtalt
$resultatmonteringavtalt = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Avtalt') or (avdeling = '3' and status = 'Montering Avtalt')");
$row11 = mysqli_fetch_array($resultatmonteringavtalt);
$totalemonteringavtalt = $row11[0];

//resultat antall ordre frakt er ferdig
$resultatmonteringferdig = db_query("SELECT COUNT(1) from ordre where (avdeling = '1' and status = 'Montering Ferdig') or (avdeling = '3' and status = 'Montering Ferdig')");
$row12 = mysqli_fetch_array($resultatmonteringferdig);
$totalemonteringferdig = $row12[0];




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



<div class="container-fluid">
  <div class="row">
  
   
    <div class="col-gap infobox">
    <div class="topptekst">MINE OPPGAVER:</div>
    <br><h6><?php if($totaleubehandlede > 0){echo "Ubehandlede ordre antall:  <font color='red'>  $totaleubehandlede </font>";}else { } ?></h6>
    <br><h6><?php if($totalesattpavent > 0){echo "Ordrer Satt på vent:  <font color='red'>  $totalesattpavent </font>";}else { } ?></h6>
    
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
     <center>KLARE FOR MONTERING</center>
    </div>
    <div class="col"> 
     <center>SENDT MONTØR</center>
    </div>
    <div class="col"> 
     <center>MONTERING AVTALT</center>
    </div>
    <div class="col"> 
     <center>MONTERING FERDIG</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="monteringsordre.php" class="dashboardlink"><?php if($totaleklarformontering  > 0){ echo "<font color='red'>$totaleklarformontering</font>";}else{ echo $totaleklarformontering; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="sendtmontor.php" class="dashboardlink"><?php  echo $totalesendtmontor;  ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre_hosfaktura.php" class="dashboardlink"><?php echo $totalemonteringavtalt; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totalemonteringferdig > 0){ echo "<font color='red'>$totalemonteringferdig</font>";}else{ echo $totalemonteringferdig;} ?></h1></center></a>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>KLARE FOR FRAKT</center>
    </div>
    <div class="col"> 
     <center>SENDT TIL FRAKT</center>
    </div>
    <div class="col"> 
     <center>FRAKT AVTALT</center>
    </div>
    <div class="col"> 
     <center>FRAKT FERDIG</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="fraktordre.php" class="dashboardlink"><?php if($totaleklarforfrakt  > 0){ echo "<font color='red'>$totaleklarforfrakt</font>";}else{ echo $totaleklarforfrakt; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre_faktura.php" class="dashboardlink"><?php  echo $totalesendtmontor;  ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre_hosfaktura.php" class="dashboardlink"><?php echo $totalemonteringavtalt; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totalemonteringferdig > 0){ echo "<font color='red'>$totalemonteringferdig</font>";}else{ echo $totalemonteringferdig;} ?></h1></center></a>
    </div>
  </div>
</div>
<br>
</body>
<?php
include("footer.php");
?>
</html>