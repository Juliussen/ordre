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


//resultat antall ordre total avdeling 1
$resultatmottattordre1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt Produksjon'");
$row2 = mysqli_fetch_array($resultatmottattordre1);
$mottattordre1 = $row2[0];

//resultat antall ordre total avdeling 2
$resultatmottattordre2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt Produksjon'");
$row22 = mysqli_fetch_array($resultatmottattordre2);
$mottattordre2 = $row22[0];

//resultat antall ordre total avdeling 3
$resultatmottattordre3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt Produksjon'");
$row23 = mysqli_fetch_array($resultatmottattordre3);
$mottattordre3= $row23[0];

//resultat antall ordre total avdeling 1
$resultatsattpavent1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Satt på vent'");
$row20 = mysqli_fetch_array($resultatsattpavent1);
$sattpavent1 = $row20[0];

//resultat antall ordre total avdeling 2
$resultatsattpavent2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Satt på vent'");
$row202 = mysqli_fetch_array($resultatsattpavent2);
$sattpavent2 = $row202[0];

//resultat antall ordre total avdeling 3
$resultatsattpavent3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Satt på vent'");
$row203 = mysqli_fetch_array($resultatsattpavent3);
$sattpavent3= $row203[0];


//resultat antall ordre sendt prod linje OSLO
$resultatsendtlinja1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt Prod Linje'");
$row3 = mysqli_fetch_array($resultatsendtlinja1);
$totalesendtlinja1 = $row3[0];

//resultat antall ordre sendt prod linje Trondheim
$resultatsendtlinja2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt Prod Linje'");
$row32 = mysqli_fetch_array($resultatsendtlinja2);
$totalesendtlinja2 = $row32[0];

//resultat antall ordre sendt prod linje Trondheim
$resultatsendtlinja3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt Prod Linje'");
$row33 = mysqli_fetch_array($resultatsendtlinja3);
$totalesendtlinja3 = $row33[0];


//resultat antall ordre Ferdig Produsert OSLO
$resultatferdigprodusert1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Ferdig Produsert'");
$row4 = mysqli_fetch_array($resultatferdigprodusert1);
$totaleferdigprodusert1 = $row4[0];

//resultat antall ordre Ferdig Produsert Trondheim
$resultatferdigprodusert2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Ferdig Produsert'");
$row42 = mysqli_fetch_array($resultatferdigprodusert2);
$totaleferdigprodusert2 = $row42[0];

//resultat antall ordre Ferdig Produsert Trondheim
$resultatferdigprodusert3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Ferdig Produsert'");
$row43 = mysqli_fetch_array($resultatferdigprodusert3);
$totaleferdigprodusert3 = $row43[0];



//resultat antall ordre Mottatt Avdeling OSLO
$resultatmottattavdeling1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Mottatt Avdeling'");
$rown5 = mysqli_fetch_array($resultatmottattavdeling1);
$totalemottattavdeling1 = $rown5[0];

//resultat antall ordre Mottatt Avdeling Trondheim
$resultatmottattavdeling2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Mottatt Avdeling'");
$rown52 = mysqli_fetch_array($resultatmottattavdeling2);
$totalemottattavdeling2 = $rown52[0];

//resultat antall ordre Mottatt Avdeling Trondheim
$resultatmottattavdeling3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Mottatt Avdeling'");
$rown53 = mysqli_fetch_array($resultatmottattavdeling3);
$totalemottattavdeling3 = $rown53[0];




// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJON
// 4 = REGNSKAP
// 5 = MONTØR


include("../footer.php");
include("../base.php");

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
    <body class="a2z-wrapper"><div class="container box">
        <div class="form-area register-from" align="right">Innlogget som: <br> <span style="color:#2d87d7"><?php print $firstname; ?> <?php print $lastname; ?></span>
        <br> <span style="color:#2d87d7"><?php print $avdelingsnavn; ?></span>
        </div></div>

    <!---   STOR OSLO ORDRE STATUS  ---->
    <section class="a2z-area" ><div class="ps-dashboard-box" ><a href="dashboard_avd1.php"><h6>STOR OSLO</h6></a>
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">UBEHANDLEDE</h6></center></font></div>
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">SATT PÅ VENT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">SENDT TIL LINJA</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">FERDIG PRODUSERT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">MOTTATT AVDELING</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/ps/ubehandledeordre1.php" class="dashboardlink"><?php echo $mottattordre1; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="#" class="dashboardlink"><?php echo $sattpavent1; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/ubehandledeordre1.php" class="dashboardlink"><?php echo $totalesendtlinja1; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/ferdigprodusert1.php" class="dashboardlink"><?php echo $totaleferdigprodusert1; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/mottattavdeling1.php" class="dashboardlink"><?php echo $totalemottattavdeling1; ?></h1></center></div></a>
                 </div></div></div></div>


        	</div></div></div>
        </section>
<!---   TRONDHEIM ORDRE STATUS  ---->
        <section class="a2z-area" ><div class="ps-dashboard-box" > <h6>TRONDHEIM</h6>
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">UBEHANDLEDE</h6></center></font></div>
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">SATT PÅ VENT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">SENDT TIL LINJA</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">FERDIG PRODUSERT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">MOTTATT AVDELING</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre2.php" class="dashboardlink"><?php echo $mottattordre2; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre2.php" class="dashboardlink"><?php echo $sattpavent2; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre2.php" class="dashboardlink"><?php echo $totalesendtlinja2; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/ferdigprodusert2.php" class="dashboardlink"><?php echo $totaleferdigprodusert2; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/mottattavdeling2.php" class="dashboardlink"><?php echo $totalemottattavdeling2; ?></h1></center></div></a>
                 </div></div></div></div>


        	</div></div></div>
        </section>
  <!---   FREDRIKSTAD ORDRE STATUS  ---->      
        <section class="a2z-area" ><div class="ps-dashboard-box" > <h6>FREDRIKSTAD</h6>
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">UBEHANDLEDE</h6></center></font></div>
                        <div class="col-md-2" >
                        <center><h6> <font color="#fffff">SATT PÅ VENT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">SENDT TIL LINJA</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">FERDIG PRODUSERT</h6></center></font></div>
                        <div class="col-md-2">
                        <center><h6><font color="#fffff">MOTTATT AVDELING</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre3.php" class="dashboardlink"><?php echo $mottattordre3; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre3.php" class="dashboardlink"><?php echo $sattpavent3; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="ubehandledeordre3.php" class="dashboardlink"><?php echo $totalesendtlinja3; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/ferdigprodusert3.php" class="dashboardlink"><?php echo $totaleferdigprodusert3; ?></h1></center></div></a>
                        <div class="col-md-2">
                        <center><h1><a href="<?php echo $baseurl; ?>/produksjon/mottattavdeling3.php" class="dashboardlink"><?php echo $totalemottattavdeling3; ?></h1></center></div></a>
                 </div></div></div></div>


        	</div></div></div>
        </section>
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <script src="assets/css/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>