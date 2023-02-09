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
$sql2 = "SELECT * FROM `forslag` "; // HENTER FORSLAGSOMRÅDE
    $all_categories2 = mysqli_query($mysqli,$sql2);

$forslagid = $_POST['forslagid'];
$forslagomrade = $_POST['forslagomrade'];
$forslagtekst = $_POST['forslagtekst'];
$forslagstatus = $_POST['forslagstatus'];

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
        <title>OrdreMekka 1.0</title>
     


</head>
    <body class="a2z-wrapper">
    <br>

        <!--Start a2z-area-->
        <section class="a2z-area">
            <div class="container box">
            <h3>FORSLAG / IDEER TIL ENDRINGER </h3>   

<form action="forslag_send.php" method="POST">
    <!-- VELGE FORSLAGSOMRÅDE ---------------------------->
<div class="col-md-4" ><label for="forslagomrade">Forslagsområde</label>
            <select name="forslagomrade" id="forslagomrade" class="form-control"  required>
            <option name="dashboard" id="dashboard">Dashboard</option>
            <option name="ordreinfo" id="ordreinfo">Ordreinfo</option>
            <option name="endring" id="endring">Endring</option>
            <option name="forslag" id="forslag">Forslag</option>
            <option name="forslag" id="forslag">System</option>
            <option name="annet" id="annet">Annet</option>
                </select></div>
    <!-- SLUTT FORSLAGSOMRÅDE -->
   
    <!-- VELGE BRUKER START ---------------------------->
    <div class="col-md-4" ><label for="brukeromrade">Forslaget/endringen gjelder for:</label>
            <select name="brukeromrade" id="brukeromrade" class="form-control"  required>
            <option value="Selger">Selger</option>
            <option value="Produksjon">Produksjon</option>
            <option value="Produksjons sjef">Produksjons sjef</option>                        
            <option value="Produksjonslinjen">Produksjonslinjen</option>
            <option value="Regnskap">Regnskap</option>
            <option value="Montør">Montør</option>
            <option value="Transport">Transport</option>
            <option value="Ledelse">Ledelse</option>
            <option value="Avdelinger">Avdelinger</option>
            <option value="Alle">Alle</option>
            <option value="Annet">Annet(Beskriv i forslagstekst)</option>

            
                </select><br></div>
                <div class="col-md-4" ><label for="bruker">Sendes inn av:</label>
<input type="text" name="bruker" id="bruker" value="<?php echo $firstname; ?>" readonly></div>
    <!-- BRUKER VELGER SLUTT ----------------------------------------------------->
    <div class="col-md-12" >
      <label for="forslagtekst">Forslagtekst</label>
      <textarea class="form-control" name="forslagtekst" id="forslagtekst" rows="3" required></textarea>
    </div>
    
    <div class="col-md-12" >
    <button class="btn btn-md btn-info"type="submit" id="submit" name="submit" >Send Forslag</button>
</form>
</div>
            </div>
        </section>
        

                    <?php
               

                $query = "SELECT * FROM forslag";
                $query_run = mysqli_query($connection, $query);
                
            ?> 
            <div class="container box">
                    <table id="datatableid" class="table table-bordered table-striped" >
                    <div class="container-fluid"> <h2>REGISTRERTE FORSLAG</h2>
                        <thead >
                            <tr class="bg-dark text-white">
                            <th>Forslagsområde</th>
                            <th>Bruker</th>
                            <th>Bruker område</th>
                            <th>Forslag</th>
                            <th>Status</th>
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
                                
                                <td><center> <?php echo $row['forslagomrade']; ?></center> </td>
                                <td><center> <?php echo $row['bruker']; ?> </center></td>
                                <td><center> <?php echo $row['brukeromrade']; ?> </center></td>
                                <td> <center><?php echo $row['forslagtekst']; ?></center> </td>
                                <td> <center><?php echo $row['forslagstatus']; ?></center> </td>
                         
                                
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