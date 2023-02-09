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
$username = $row['username'];
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];



//resultat antall ordre sendt til montør
$resulatubehandlede = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Sendt til Montør') ");
$row3 = mysqli_fetch_array($resulatubehandlede);
$totaleubehandlede = $row3[0];

//resultat antall ordre montering avtalt
$resultatmonteringavtalt = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Montering Avtalt')");
$row41 = mysqli_fetch_array($resultatmonteringavtalt);
$totalemonteringavtalt = $row41[0];

//resultat antall ordre montering avtalt
$resultatmonteringutfort = db_query("SELECT COUNT(1) from ordre where (selger = '".$username."' and status = 'Montering Utført')");
$row5 = mysqli_fetch_array($resultatmonteringutfort);
$totalemonteringutfort = $row5[0];




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
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>MONTERING</center>
    </div>
    <div class="col"> 
     <center>MONTERING AVTALT</center>
    </div>
    <div class="col"> 
     <center>MONTERING UTFØRT</center>
    </div>
   
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="monteringsordre.php" class="dashboardlink"><?php if($totaleubehandlede  > 0){ echo "<font color='red'>$totaleubehandlede</font>";}else{ echo $totaleubehandlede; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="monteringavtalt.php" class="dashboardlink"><?php  echo $totalemonteringavtalt; ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="monteringutfort.php" class="dashboardlink"><?php echo $totalemonteringutfort; ?></h1></center></a>
    </div>
    
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>FRAKT</center>
    </div>
    <div class="col"> 
     <center>FRAKT AVTALT</center>
    </div>
    <div class="col"> 
     <center>FRAKT UTFØRT</center>
    </div>
    
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1>00</h1></center></a>
    </div>
    <div class="col"> 
    <center><h1>00</h1></center></a>
    </div>
    <div class="col"> 
    <center><h1>00</h1></center>
    </div>
  
  </div>
</div>
<br>

</body>
<?php
include("../footer.php");
?>
</html>