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
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];


//resultat antall ordre total avdeling 1
$resultatmottattordre1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt Produksjon'");
$row2 = mysqli_fetch_array($resultatmottattordre1);
$totalemottattordre1 = $row2[0];

//resultat antall ordre total avdeling 2
$resultatmottattordre2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt Produksjon'");
$row22 = mysqli_fetch_array($resultatmottattordre2);
$totalemottattordre2 = $row22[0];

//resultat antall ordre total avdeling 3
$resultatmottattordre3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt Produksjon'");
$row23 = mysqli_fetch_array($resultatmottattordre3);
$totalemottattordre3= $row23[0];


//resultat antall ordre Sendt Forskudd Regnskap OSLO
$resultatsendtforskuddregnskap1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and (status = 'Sendt Forskudd Regnskap') or (status = 'Forskudd Faktura Sendt') or (status = 'Forskudd Faktura Betalt')");
$row3 = mysqli_fetch_array($resultatsendtforskuddregnskap1);
$totalesendtforskuddregnskap1 = $row3[0];

//resultat antall ordre Sendt Forskudd Regnskap Trondheim
$resultatsendtforskuddregnskap2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and (status = 'Sendt Forskudd Regnskap') or (status = 'Forskudd Faktura Sendt') or (status = 'Forskudd Faktura Betalt')");
$row32 = mysqli_fetch_array($resultatsendtforskuddregnskap2);
$totalesendtforskuddregnskap2 = $row32[0];

//resultat antall ordre Sendt Forskudd Regnskap Trondheim
$resultatsendtforskuddregnskap3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and (status = 'Sendt Forskudd Regnskap') or (status = 'Forskudd Faktura Sendt') or (status = 'Forskudd Faktura Betalt')");
$row33 = mysqli_fetch_array($resultatsendtforskuddregnskap3);
$totalesendtforskuddregnskap3 = $row33[0];


//resultat antall ordre sendt prod linje OSLO
$resultatsendtlinja1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt Prod Linje'");
$row4 = mysqli_fetch_array($resultatsendtlinja1);
$totalesendtlinja1 = $row4[0];

//resultat antall ordre sendt prod linje Trondheim
$resultatsendtlinja2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt Prod Linje'");
$row42 = mysqli_fetch_array($resultatsendtlinja2);
$totalesendtlinja2 = $row42[0];

//resultat antall ordre sendt prod linje Trondheim
$resultatsendtlinja3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt Prod Linje'");
$row43 = mysqli_fetch_array($resultatsendtlinja3);
$totalesendtlinja3 = $row43[0];


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


//resultat antall ordre Sendt Montør OSLO
$resultatsendtmontor1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt Montør'");
$row6 = mysqli_fetch_array($resultatsendtmontor1);
$totalesendtmontor1 = $row6[0];

//resultat antall ordre Sendt Montør Trondheim
$resultatsendtmontor2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt Montør'");
$row62 = mysqli_fetch_array($resultatsendtmontor2);
$totalesendtmontor2 = $row62[0];

//resultat antall ordre Sendt Montør Trondheim
$resultatsendtmontor3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt Montør'");
$row63 = mysqli_fetch_array($resultatsendtmontor3);
$totalesendtmontor3 = $row63[0];

//resultat antall ordre Sendt til Frakt OSLO
$resultatsendttilfrakt1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt til Frakt'");
$row7 = mysqli_fetch_array($resultatsendttilfrakt1);
$totalesendttilfrakt1 = $row7[0];

//resultat antall ordre Sendt til Frakt Trondheim
$resultatsendttilfrakt2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt til Frakt'");
$row72 = mysqli_fetch_array($resultatsendttilfrakt2);
$totalesendttilfrakt2 = $row72[0];

//resultat antall ordre Sendt til Frakt Trondheim
$resultatsendttilfrakt3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt til Frakt'");
$row73 = mysqli_fetch_array($resultatsendttilfrakt3);
$totalesendttilfrakt3 = $row73[0];

//resultat antall ordre Sendt til Henting OSLO
$resultatsendttilhenting1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt til Henting'");
$row8 = mysqli_fetch_array($resultatsendttilhenting1);
$totalesendttilhenting1 = $row8[0];

//resultat antall ordre Sendt til Henting Trondheim
$resultatsendttilhenting2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt til Henting'");
$row82 = mysqli_fetch_array($resultatsendttilhenting2);
$totalesendttilhenting2 = $row82[0];

//resultat antall ordre Sendt til Henting Trondheim
$resultatsendttilhenting3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt til Henting'");
$row83 = mysqli_fetch_array($resultatsendttilhenting3);
$totalesendttilhenting3 = $row83[0];

//resultat antall ordre Sendt til sluttfaktura OSLO
$resultatsendttilsluttfaktura1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Sendt til sluttfaktura'");
$row9 = mysqli_fetch_array($resultatsendttilsluttfaktura1);
$totalesendttilsluttfaktura1 = $row9[0];

//resultat antall ordre Sendt til sluttfaktura Trondheim
$resultatsendttilsluttfaktura2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Sendt til sluttfaktura'");
$row92 = mysqli_fetch_array($resultatsendttilsluttfaktura2);
$totalesendttilsluttfaktura2 = $row92[0];

//resultat antall ordre Sendt til sluttfaktura Trondheim
$resultatsendttilsluttfaktura3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Sendt til sluttfaktura'");
$row93 = mysqli_fetch_array($resultatsendttilsluttfaktura3);
$totalesendttilsluttfaktura3 = $row93[0];

//resultat antall ordre Fullført OSLO
$resultatfullfort1 = db_query("SELECT COUNT(1) from ordre where avdeling = '1' and status = 'Fullført'");
$row10 = mysqli_fetch_array($resultatfullfort1);
$totalefullfort1 = $row10[0];

//resultat antall ordre Fullført Trondheim
$resultatfullfort2 = db_query("SELECT COUNT(1) from ordre where avdeling = '2' and status = 'Fullført'");
$row102 = mysqli_fetch_array($resultatfullfort2);
$totalefullfort2 = $row102[0];

//resultat antall ordre Fullført Trondheim
$resultatfullfort3 = db_query("SELECT COUNT(1) from ordre where avdeling = '3' and status = 'Fullført'");
$row103 = mysqli_fetch_array($resultatfullfort3);
$totalefullfort3 = $row103[0];


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
    <body class="a2z-wrapper"><div class="container box">
        <div class="form-area register-from" align="right">Innlogget som: <br> <span style="color:#2d87d7"><?php print $firstname; ?> <?php print $lastname; ?></span>
        <br> <span style="color:#2d87d7"><?php print $avdelingsnavn; ?></span>
        </div></div>

    <!---   STOR OSLO ORDRE STATUS  ---->
    <section class="a2z-area" ><div class="ps-dashboard-box"><h6>STOR OSLO</h6>
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-1" >
                        <center><h6> <font color="#fffff">SELGER</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FORSKUDD</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">PRODUKSJON</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">AVDELING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">MONTØR</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">HENTING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FRAKT</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">REGNSKAP</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FULLFØRT</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattordre1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtforskuddregnskap1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtlinja1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattavdeling1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtmontor1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilfrakt1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilhenting1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilsluttfaktura1; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalefullfort1; ?></h1></center></div>
                 </div></div></div></div>


        	</div></div></div>
        </section>
<!---   TRONDHEIM ORDRE STATUS  ---->
<section class="a2z-area" ><div class="ps-dashboard-box"><h6>TRONDHEIM</h6>
<div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-1" >
                        <center><h6> <font color="#fffff">SELGER</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FORSKUDD</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">PRODUKSJON</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">AVDELING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">MONTØR</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">HENTING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FRAKT</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">REGNSKAP</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FULLFØRT</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattordre2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtforskuddregnskap2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtlinja2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattavdeling2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtmontor2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilfrakt2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilhenting2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilsluttfaktura2; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalefullfort2; ?></h1></center></div>
                 </div></div></div></div>


        	</div></div></div>
        </section>
  <!---   FREDRIKSTAD ORDRE STATUS  ---->      
  <section class="a2z-area" ><div class="ps-dashboard-box"><h6>FREDRIKSTAD</h6>
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                        <div class="col-md-1" >
                        <center><h6> <font color="#fffff">SELGER</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FORSKUDD</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">PRODUKSJON</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">AVDELING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">MONTØR</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">HENTING</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FRAKT</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">REGNSKAP</h6></center></font></div>
                        <div class="col-md-1">
                        <center><h6><font color="#fffff">FULLFØRT</h6></center></font></div>
                       
                 </div></div>
                 <div class="form-group">
                <div class="row justify-content-center">
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattordre3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtforskuddregnskap3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtlinja3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalemottattavdeling3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendtmontor3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilfrakt3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilhenting3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalesendttilsluttfaktura3; ?></h1></center></div>
                        <div class="col-md-1">
                        <center><h1 class="dashboardlink"><?php echo $totalefullfort3; ?></h1></center></div>
                 </div></div></div></div>


        	</div></div></div>
        </section>

        <section class="a2z-area" ><div class="ps-dashboard-box">
    <div class="form-area register-from" >
                <div class="row justify-content-center" >
                    
                    
                   <center>  <font face="Comic Sans" size="100px" ><a href="../graf/graf.php">STATISTIKK</a></font></center>
                 </div></div>
                 </div></div>


        	</div></div></div>
        </section>
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <script src="assets/css/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>