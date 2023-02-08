<?php
include('connection.php');
include('topbar.php');
if (!isset($_SESSION['googleCode'])):
    header("location:register.php");
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

if($usertype == '2')
{
    
    echo "<script>
                    window.location.href='selger/dashboard.php';
          </script>";
    
}
elseif($usertype == '1')
{
    echo "<script>
            window.location.href='selger/dashboard.php';
       </script>";
}
elseif($usertype == NULL)
{
    echo "<script>
            alert('KONTAKT SYSTEMANSVARLIG FOR TILDELING AV ROLLE');
                    window.location.href='logout.php';
            </script>";        
}
if($usertype == '3')
{
    echo    "<script>
                    window.location.href='ps/dashboard.php';
            </script>";
}
if($usertype == '4')
{
    echo    "<script>
                    window.location.href='produksjon/dashboard.php';
            </script>";
}
if($usertype == '5')
{
    echo    "<script>
                    window.location.href='regnskap/dashboard.php';
            </script>";
}
if($usertype == '6')
{
    echo    "<script>
                    window.location.href='monteringsleder/dashboard.php';
            </script>";
}
if($usertype == '7')
{
    echo    "<script>
                    window.location.href='produksjon/dashboard.php';
            </script>";
}
else
{
    
}
    
// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJONSSJEF
// 4 = PRODUKSJON
// 5 = REGNSKAP
// 6 = MONTØR


include("footer.php");

?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css/form-design.css">
        <title>OrdreMekka 1.0</title>
     


</head>
    <body class="a2z-wrapper">
    

        <!--Start a2z-area-->
        <section class="a2z-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="form-area register-from">
                            <div class="form-content">
                            <center> <h2>ORDRE SATT I SYSTEM</h2>
                                <br><br><br><p><font color=#FF0000><h5><?php 
                                if($usertype == NULL)
                                {
                                    echo "TA KONTAKT MED MADS (91715917) FOR TILDELING AV ROLLE!<br><a href=mailto:mads@garderobemekka.no>Epost</a>";
                                }
                                ?>
                                </p></font></center></h3>
                            </div>
                            <div class="form-input">
                                <h2>Velkommen <?php print $firstname; ?></h5>
                                    <div class="row">
										<div class="form-group">
											<label>Fornavn: </label> <span style="color:#2d87d7"><?php print $firstname; ?></span>
										</div>
                                    </div>
									
									<div class="row">
										<div class="form-group">
											<label>Etternavn: </label> <span style="color:#2d87d7"><?php print $lastname; ?></span>
										</div>
                                    </div>
									
									<div class="row">
										<div class="form-group">
											<label>Epost: </label> <span style="color:#2d87d7"><?php print $email; ?></span>
										</div>
									</div>

                                    <div class="row">
										<div class="form-group">
											<label>Avdeling: </label> <span style="color:#2d87d7">
                                            <?php 
                                            if($avdelingsnr == NULL)
                                            {
                                             echo "Ikke satt"   ;
                                            }
                                            else print $avdelingsnavn; 


                                                
                                            ?></span>
										
                                    </div>
									</div>
                                    
									
									<div class="a2z-button">
                                        <a href="logout.php" class="a2z-btn" style="padding: 10px 30px;">Logg ut</a>
                                    </div>
									
									
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <script src="assets/css/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>