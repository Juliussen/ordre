<?php
include('connection.php');

$secret = $_SESSION['secret'];
$user 	= $_SESSION['email'];

require_once 'googleLib/GoogleAuthenticator.php';
$ga 		= new GoogleAuthenticator();
$qrCodeUrl 	= $ga->getQRCodeGoogleUrl($user, $secret,'GarderobeMekka');



?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORDREMEKKA - ORDRE SATT I SYSTEM</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <?php if($darkmode == '1')
        {
            echo "<link rel='stylesheet' href='assets/css/layout-darkmode.css'>";
        }else{ echo "<link rel='stylesheet' href='assets/css/layout.css'>";} ?>
        <link rel="stylesheet" href="assets/css/form-design.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">  
		
		
</head>
    <body class="a2z-wrapper">

        <!--Start a2z-area-->
        <section class="a2z-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="form-area register-from">
                            <div class="form-content">
                                <h2>FINN FREM APPEN</h2>
                                <h6>ER DET FØRSTE GANG DU LOGGER INN?</h6><center>
                               <ul> <h6> <li>SCANN QR KODEN.</h6></li>
                                <h6> <li>SKRIV INN KODEN.</h6></li>
                                </ul>
                            </div></center>
                            <div class="form-input">
                                <h2>SKRIV INN KODE</h2>
                                <form name="reg" action="auth.php" method="POST">

                                    <div class="form-group">
										<img src='<?php echo $qrCodeUrl; ?>'/>
                                    </div>

                                    <div class="form-group">
										<input type="text" name="code" id="code" autocomplete="off" value="" required>
                                        <label>Skriv inn Google Authenticator koden</label>
                                    </div>
                                    
                                    <div class="a2z-button">
                                        <button type="submit" class="btn btn-lg btn-info">GODKJEN</button>
                                    </div>
									
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>