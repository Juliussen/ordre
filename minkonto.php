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

$firstname = $row['fname'];
$lastname 	= $row['lname'];
$email 		= $row['email'];
$usertype 		= $row['usertype'];
$username 		= $row['username'];
$avdelingsnr 		= $row['avdelingsnr'];
$sql = db_query("select * from avdeling where avdelingsnr = '".$avdelingsnr."'");
$row = mysqli_fetch_array($sql);
$avdelingsnavn 		= $row['avdelingsnavn'];

    
// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJONSSJEF
// 4 = PRODUKSJON
// 5 = REGNSKAP
// 6 = MONTERINGSLEDER
// 7 = MONTØR


include("footer.php");

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
    <body class="a2z-wrapper">
    <br>

        <!--Start a2z-area-->
        <section class="a2z-area">
            <div class="container box">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="form-area register-from">
                            <div class="form-content"><br>
                            <center><div class="topptekst2"> KONTO INFORMASJON</div>
                                <br><br><br><p><font color=#FF0000><h5><?php 
                                if($usertype == NULL)
                                {
                                    echo "TA KONTAKT MED MADS (91715917) FOR TILDELING AV ROLLE!<br><a href=mailto:mads@garderobemekka.no>Epost</a>";
                                }
                                ?>
                                </p></font></center></h3>
                            </div>
                            <div class="form-input box">
                            <div class="topptekst2">Hei <?php print $firstname; ?></div>
                                    <div class="row">
                                    <div class="col-gap infobox">
                                            <label>Brukernavn: </label> <span style="color:#2d87d7"><?php print $username; ?></span><br>
											<label>Fornavn: </label> <span style="color:#2d87d7"><?php print $firstname; ?></span><br>
											<label>Etternavn: </label> <span style="color:#2d87d7"><?php print $lastname; ?></span><br>
											<label>Epost: </label> <span style="color:#2d87d7"><?php print $email; ?></span><br>
											<label>Avdeling: </label> <span style="color:#2d87d7">
                                            <?php 
                                            if($avdelingsnr == NULL)
                                            {
                                             echo "Ikke satt"   ;
                                            }
                                            else print $avdelingsnavn;    
                                            ?></span><br>
                         					<label>Brukertype: </label> <span style="color:#2d87d7">
                                            <?php 
                                            if($usertype == '1'){
                                                print "Admin"; 
                                            } elseif($usertype == '2'){
                                                print "Selger"; 
                                            }    
                                            elseif($usertype == '3'){
                                                print "Produksjons Sjef"; 
                                            }  
                                            elseif($usertype == '4'){
                                                print "Produksjon"; 
                                            } 
                                            elseif($usertype == '5'){
                                                print "Regnskap"; 
                                            } 
                                            elseif($usertype == '6'){
                                                print "Monteringsleder"; 
                                            } 
                                            elseif($usertype == '7'){
                                                print "Montør"; 
                                            } 
                                            elseif($usertype == '10'){
                                                print "ADM DIR"; 
                                            } 
                                            ?>  
                                            </span>
										</div>
                                          
       


                                    <div class="col-gap infobox"><center>
                                       Velg brukertype: <?php 
                                       echo "<form method='POST' action='update/update_usertype.php'>";
                                        echo "<input type='text' name='username' id='username'  value='$username' hidden> ";
                                        echo "<select name='usertype' id='usertype' class='form-control'>
                                                <option value='1'>1 -   Admin</<option>
                                                <option value='2'>2 -   Selger</<option>
                                                <option value='21'>21 - Selger Oslo</<option>
                                                <option value='3'>3 -   Produksjonssjef Oslo</<option>
                                                <option value='4'>4 -   Produksjon Oslo</<option>
                                                <option value='5'>5 -   Regnskap</<option>
                                                <option value='6'>6 -   Monteringsleder oslo</<option>
                                                <option value='7'>7 -   Montør Oslo / Østfold</<option>
                                                <option value='10'>10 - Adm Dir</<option>
                                                </select>" ;
                                        echo "<button type='submit' class='btn btn-info' action='submit' id='submit'  name='darkmode1'>Endre Brukertype</button>";
                                        echo "</form></div>";
                                        ?>
                                        <div class="col-gap infobox"><center>
                                        <h4>DARK MODE - AV/PÅ</h4><br>
                                        
                                    <?php 
                                    if($darkmode == '1'){
                                        echo "<form method='POST' action='update/update_darkmode.php'>";
                                        echo "<input type='text' name='username' id='username'  value='$username' hidden> ";
                                        echo "<input type='text' name='darkmode' id='darkmode' value='2'  hidden> ";
                                        echo "<button type='submit' class='btn btn-info' action='submit' id='submit'  name='darkmode1'>Skru av darkmode</button>";
                                        echo "</form>";
                                    }else{
                                        echo "<form method='POST' action='update/update_darkmode.php'>";
                                        echo "<input type='text' name='username' id='username' value=".$username." hidden> ";
                                        echo "<input type='text' name='darkmode' id='darkmode' value='1' hidden > ";
                                        echo "<button type='submit' class='btn btn-info' action='submit' id='submit'  name='darkmode1'>Skru på darkmode</button>";
                                      
                                        echo "</form>";
                                    }?>
									</div></div></center>
                                     <br>
                                  
									
									
                                      <button  class="btn btn-info">  <a href="logout.php" class="btn btn-info" style="padding: 10px 30px;">Logg ut</a></button>
                                 
									
									
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="assets/js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>