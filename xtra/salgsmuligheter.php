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

include_once('../conn.php');
$sql = "SELECT * FROM `google_auth` "; // HENTER BRUKERTYPE 
    $all_categories = mysqli_query($mysqli,$sql);
$selger = $_POST['fname'];

include_once('../conn.php');
$sql2 = "SELECT * FROM `salgsint` where selger = '".$selger."'"; // HENTER FORSLAGSOMRÅDE
    $all_categories2 = mysqli_query($mysqli,$sql2);

$salgsid = $_POST['salgsid'];
$kundenavn = $_POST['kundenavn'];
$kundeadresse = $_POST['kundeadresse'];
$kundepostnummer = $_POST['kundepostnummer'];
$kundepoststed = $_POST['kundepoststed'];
$kundetelefon = $_POST['kundetelefon'];
$kundeepost = $_POST['kundeepost'];
$salgstatus = $_POST['salgstatus'];
$kommentartilsalg = $_POST['kommentartilsalg'];
$dato = $_POST['dato'];
$selger = $_POST['selger'];

$date = date('Y-m-d');




// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 3 = PRODUKSJONSSJEF
// 4 = PRODUKSJON
// 5 = REGNSKAP
// 6 = MONTØR


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
    <body class="a2z-wrapper">
    <br>

        <!--Start a2z-area-->
        <section class="a2z-area">
            <div class="container box">
            <h3>MINE SALG / INTERESSENTER / OPPFØLGING</h3>   

<form action="salgsmuligheter_send.php" method="POST">

<div class="row " >
            <div class="col-md-3"> 
            <label for="kundenavn">Kunde Navn</label>
            <input type="text" id="kundenavn" name="kundenavn" placeholder="Kundenavn" autocomplete="OFF"  required>
            </div>
</div>
<div class="row " >
            <div class="col-md-3" >
            <label for="kundeadresse">Adresse</label>
            <input type="text" id="kundeadresse" name="kundeadresse" autocomplete="OFF" placeholder="Kunde Adresse">
            </div>

            <div class="col-md-3" >
            <label for="kundepostnummer">Postnummer</label>
            <input type="tel" id="kundepostnummer" name="kundepostnummer" autocomplete="OFF" placeholder="Postnummer 0000" pattern="[0-9]{4}">
            </div>

            <div class="col-md-3" >
            <label for="kundepoststed">Poststed</label>
            <input type="tel" id="kundepoststed" name="kundepoststed" autocomplete="OFF" placeholder="Poststed" >
            </div>
</div>
<div class="row " >
            <div class="col-md-3" >
            <label for="kundetelefon">Telefon</label>
            <input type="text" id="kundetelefon" name="kundetelefon" autocomplete="OFF" placeholder="Kunde telefon nummer">
            </div>

            <div class="col-md-3" >
            <label for="kundeepost">Epost</label>
            <input type="tel" id="kundeepost" name="kundeepost" autocomplete="OFF" placeholder="Kunde Epost" >
            </div>
            <div class="col-md-3" >
            <label for="dato">Dato registrert</label>
            <input type="text" id="dato" name="dato" autocomplete="OFF" placeholder="Dato" value="<?php echo $date; ?>" readonly>
            </div>

           
</div>
<br>
<div class="row " >  <!-- VELGE FORSLAGSOMRÅDE ---------------------------->
            <div class="col-md-4" ><label for="salgstatus">Status på Salgsinteresse</label>
            <select name="salgstatus" id="salgstatus" class="form-control"  required>
            <option name="velg" selected>Velg en status...</option>
            <option name="sendttilbud" id="sendttilbud" value="Sendt Tilbud" >Sendt Tilbud</option>
            <option name="vunnet" id="vunnet" value="Vunnet">Vunnet</option>
            <option name="påvent" id="påvent" value="På Vent">På Vent</option>
            <option name="tapt" id="tapt" value="Tapt">Valgt annen leverandør</option>
            </select></div>
</div>
    <!-- SLUTT FORSLAGSOMRÅDE -->
   
    <!-- VELGE BRUKER START ---------------------------->
    <div class="row " >
                <div class="col-md-4" >
<input type="text" name="selger" id="selger" value="<?php echo $firstname; ?>" hidden></div>
    <!-- BRUKER VELGER SLUTT ----------------------------------------------------->
    <div class="col-md-12" >
      <label for="kommentartilsalg">Kommentar til salgsinteresse</label>
      <textarea class="form-control" name="kommentartilsalg" id="kommentartilsalg" rows="3"></textarea>
    </div>
    
    <div class="col-md-12" >
    <button class="btn btn-md btn-info"type="submit" id="submit" name="submit" >Lagre </button>
</form>
</div>
            </div></div>
        </section>
        

                    <?php
               

                $query = "SELECT * FROM salgsint where selger = '".$firstname."'";
                $query_run = mysqli_query($connection, $query);
                
            ?> 
            <div class="container box">
                    <table id="datatableid" class="table table-bordered table-striped" >
                    <div class="container-fluid"> <h2>REGISTRERTE INTERESSENTER</h2>
                        <thead >
                            <tr class="bg-dark text-white">
                            <th>Kunde Navn</th>
                            <th>Adresse</th>
                            <th>Post Nummer</th>
                            <th>Post Sted</th>
                            <th>Telefon</th>
                            <th>Epost</th>
                            <th>Salgstatus</th>
                            <th>Kommentar</th>
                            <th>Dato</th>
                            <th>Endre</th>
                            <th>Slett</th>
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
            
         


                        <tbody>
                            <tr>
                                
                                <td><center> <?php echo $row['kundenavn']; ?></center> </td>
                                <td><center> <?php echo $row['kundeadresse']; ?> </center></td>
                                <td><center> <?php echo $row['kundepostnummer']; ?> </center></td>
                                <td> <center><?php echo $row['kundepoststed']; ?></center> </td>
                                <td> <center><?php echo $row['kundetelefon']; ?></center> </td>
                                <td> <center><?php echo $row['kundeepost']; ?></center> </td>
                                <td> <center><?php echo $row['salgstatus']; ?></center> </td>
                                <td> <center><?php echo $row['kommentartilsalg']; ?></center> </td>
                                <td> <center><?php echo $row['dato']; ?></center> </td>
                                <td> <center>ENDRE </center> </td>
                                <td> <center>SLETT </center> </td>
                                
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "Ingen ordre ble funnet";
                }
            ?>
                    </table>
                </div>
            </div>


        </div>
    </div>





    </body>
</html>