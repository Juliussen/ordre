<?php
include('connection.php');

	


// $csrf		=	$connect->real_escape_string($_POST["csrf"]);


// if ($csrf == $_SESSION["token"]) {
// 	$username	= $connect->real_escape_string($_POST['username']);
// 	$password	= $connect->real_escape_string($_POST['password']);
//     $usertype	= $connect->real_escape_string($_POST['usertype']);

	
// 	/* Check Username and Password */
// 	$query		= db_query("select * from google_auth where (email='".$username."' or username='".$username."') and password='".$password."' ");	

// 	$resuser = mysqli_num_rows($query);
// 	if($resuser > 0){
// 		$row = mysqli_fetch_array($query);
// 		$_SESSION['email'] 	= $row['email'];
// 		$_SESSION['secret'] = $row['googlecode'];
		
// 		header('Location:device_confirmations.php');
// 		exit();
// 	}else{
// 		$msg="Invalid Username or Password";												
// 		header('Location:login.php?error=1');
// 		exit();
// 	}
	
// }

// /* print message */
// $msg = $connect->real_escape_string($_GET["error"]);
// if($msg == 1){ $strmsg = "Invalid Username or Password"; }


?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login/ Registration Form</title>
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
                        <div class="form-area login-form">
                            <div class="form-content"><center>
                                <h2><img src="assets/img/ordremekka2.png" width="300px"></h2></center>
                                <p><h6><center>Ordre satt i system</h6></center>
                                <ul><center>
                                    <li><a class="btn btn-block btn-social" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">
										<img src="assets/img/android.png">
									  </a></li>
									 <li> <a class="btn btn-block btn-social" href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank">
										<img src="assets/img/iphone.png">
									  </a></li>
                                      </center>
                                </ul>
                            </div>
                            <div class="form-input">
                                <h2>Logg Inn</h2>
								<span class="error"><?php print $strmsg; ?></span>
                                <form name="reg" action="login.php" method="POST">
								<input type="hidden" name="csrf" 	 value="<?php print $_SESSION["token"]; ?>" >
								<input type="hidden" name="passcode" value="<?php echo $passcode; ?>" >
                                    <div class="form-group">
										<input type="text" name="username" id="username" autocomplete="off" value="" required>
                                        <label>Brukernavn eller epost</label>
                                    </div>
                                    <div class="form-group">
										<input type="password" name="password" id="password" autocomplete="off" value="" required>
                                        <label>Passord</label>
                                    </div>
                                    <div class="a2z-button">
                                        <button class="btn btn-lg btn-info">Logg inn</button>
                                    </div>
									
									 <div class="form-text text-right">
                                        Ikke registrert? <a href="register.php">opprett konto </a>
                                    </div>
									
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--End a2z-area-->
        <!-- jquery  -->
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap js  -->
        <script src="assets/css/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>