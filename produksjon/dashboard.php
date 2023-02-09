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
$resultattotaleordre = db_query("SELECT COUNT(1) from ordre where status = 'Sendt Prod Linje'");
$row2 = mysqli_fetch_array($resultattotaleordre);
$totalordre = $row2[0];

//resultat antall ordre på vent i produksjon
$resultattotalepavent = db_query("SELECT COUNT(1) from ordre where status = 'På Vent I Produksjon'");
$row3 = mysqli_fetch_array($resultattotalepavent);
$totalepavent2 = $row3[0];

//resultat antall ordre ferdig produsert
$resultatferdigprodusert = db_query("SELECT COUNT(1) from ordre where status = 'Ferdig Produsert' ");
$row4 = mysqli_fetch_array($resultatferdigprodusert);
$ferdigprodusert = $row4[0];


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
<div class="container-fluid">
  <div class="col ">
   <h1>PRODUKSJONS LINJA </h1>
    
  </div>
</div>
 <br><br>
 <br>
 
 <br>



<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>UBEHANDLEDE</center>
    </div>
    <div class="col"> 
     <center>PÅ VENT</center>
    </div>
   
    <div class="col"> 
     <center>FERDIG PRODUSERT</center>
    </div>
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1><a href="ubehandledeordre.php" class="dashboardlink"><?php if($totalordre  > 0){ echo "<font color='red'>$totalordre</font>";}else{ echo $totalordre; } ?></h1></center></a>
    </div>
    <div class="col"> 
    <center><h1><a href="#" class="dashboardlink"><?php if($totalepavent2  > 0){ echo "<font color='red'>$totalepavent2</font>";}else{ echo $totalepavent2; }; ?></h1></center></a>
    </div>
   
    <div class="col"> 
    <center><h1><a href="#" class="dashboardlink"><?php echo $ferdigprodusert ; ?></h1></center></a>
    </div>
  </div>
</div>
<br>
<div class="container-linje">
  <div class="row"> 
    <div class="col"> 
     <center>INFO 1</center>
    </div>
    <div class="col"> 
     <center>INFO 2</center>
    </div>
    <div class="col"> 
     <center>INFO 3</center>
    </div>
    <div class="col"> 
     <center>INFO 4</center>
    </div>
  
  </div>
</div>
<div class="container-linje2">
  <div class="row"> 
    <div class="col"> 
    <center><h1>0</h1></center></a>
    </div>
    <div class="col"> 
    <center><h1>0</h1></center></a>
    </div>
    <div class="col"> 
    <center><h1>0</h1></center>
    </div>
    <div class="col"> 
    <center><h1>0</h1></center></a>
    </div>
   
  </div>
</div>
<br>

</body>
<?php
include("footer.php");
?>
</html>