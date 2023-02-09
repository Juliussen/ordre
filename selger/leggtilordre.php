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
$username 		= $row['username'];



//START KODE FOR Å HENTE VARIABLER 

include_once('../conn.php'); 

$sql = "SELECT * FROM `google_auth` where usertype = '2' or usertype = '1'"; // HENTER BRUKERTYPE 1 og 2 (ADMIN OG SELGER)
    $all_categories = mysqli_query($mysqli,$sql);

$selger = $_POST['username'];
   
$sql2 = "SELECT * FROM `avdeling` ";
    $all_categories2 = mysqli_query($mysqli,$sql2);

$sql3 = "SELECT * FROM `leveringskode`";
    $all_categories3 = mysqli_query($mysqli,$sql3);
    
 $date = date('Y/m/d');

 
 
?>
<html>
 <head>
  <title>OrdreMekka 1.0</title>
  </head>
 
 <body class="a2z-wrapper">
  <div class="container box">
   <h2 align="left">LEGG TIL NY ORDRE..</h2>
 </div><?php
 
 ?>
   <section class="a2z-area" ><div class="container box" >
    <div class="form-area register-from" >
               
        <form action="<?php echo $baseurl; ?>selger/insert2.php" method="post" enctype="multipart/form-data">
            <div class="form-control">
            <div class="row " >
            <div class="col-md-3" >
            <label for="ordrenr">Ordre Nr</label>
            <input type="text" id="ordrenr" name="ordrenr" placeholder="5-sifret ordre nummer " pattern="\d{5,5}" autocomplete="OFF" required>
            </div></div>
            
            <p></p><p>
            <div class="row " >
            <div class="col-md-3"> 
            <label for="kundenr">Kunde Nr</label>
            <input type="text" id="kundenr" name="kundenr" placeholder="5-sifret kunde nummer " autocomplete="OFF" pattern="\d{5,5}" required>
            </div>

            <div class="col-md-3" >
            <label for="kundenavn">Kunde navn</label>
            <input type="text" id="kundenavn" name="kundenavn" autocomplete="OFF" placeholder="Kunde Navn">
            </div>

            <div class="col-md-3" >
            <label for="kundetelefon">Kunde Telefon</label>
            <input type="tel" id="kundetelefon" name="kundetelefon" autocomplete="OFF" placeholder="00 00 00 00" >
            </div>

           
            
            <div class="col-md-3" >
            <label for="kundeepost">Kunde Epost</label>
            <input type="email" id="kundeepost" name="kundeepost" autocomplete="OFF" placeholder="Kunde Epost adresse">
            </div></div>
            &nbsp; 
            <div class="form-area register-from" >&nbsp; 
            </div>
            
            <div class="row " >
            <div class="col-md-3"> 
            <label for="kundeadresse">Kunde adresse</label>
            <input type="text" id="kundeadresse" name="kundeadresse" placeholder="Kunde Adresse" autocomplete="OFF" >
            </div>
            <div class="col-md-3"> 
            <label for="kundepostnr">Kunde Post Nummer</label>
            <input type="num" id="kundepostnr" name="kundepostnr" placeholder="Kunde Post Nummer " autocomplete="OFF" >
            </div>
            <div class="col-md-3"> 
            <label for="kundepoststed">Kunde Post Sted</label>
            <input type="text" id="kundepoststed" name="kundepoststed" placeholder="Kunde Post sted" autocomplete="OFF" >
            </div>
            </div>
            <p></p><p>
            <div class=row>
            <!-- SELGER VELGER START  ----------------------------------------------------->
            <div class="col-md-3" ><label for="selger">Selger</label>
            <select name="selger" id="selger" class="form-control"  required>
            
                    <?php
                    while ($selger = mysqli_fetch_array(
                    $all_categories,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $selger['username'];
                        ?>"  >
                            <?php echo $selger['username']; 
                           
                            ?>
                            
                            
                        </option>
                    <?php
                        endwhile;
                        
                    ?>
                </select><br></div>
                <!-- SELGER VELGER SLUTT ----------------------------------------------------->

            <!-- AVDELING VELGER START ----------------------------------------------------->
            <div class="col-md-3" ><label for="avdeling">Avdeling</label>           
            <select name="avdeling" id="avdeling" class="form-control"  required>
            
                    <?php
                    while ($avdeling = mysqli_fetch_array(
                    $all_categories2,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $avdeling['avdelingsnr'];
                        ?>">
                            <?php echo $avdeling['avdelingsnavn'];
                            ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select></div>
                <!-- AVDELING VELGER SLUTT -----------------------------------------------------> 

            
            <!-- LEVERINGSKODE VELGER START  ----------------------------------------------------->
            <div class="col-md-3" ><label for="leveringskode">Leveringskode</label>
            <select name="leveringskode" class="form-control" required>
                <option hidden disabled selected value>(Velg en Leveringskode)</option>
                    <?php
                    while ($leveringskode = mysqli_fetch_array(
                    $all_categories3,MYSQLI_ASSOC)):;
                    ?>
                        <option value="<?php echo $leveringskode["leveringskode"];
                        ?>">
                            <?php echo $leveringskode["leveringskode"];
                            ?>
                        </option>
                    <?php
                        endwhile;
                    ?>
                </select><br></div><div class="col-md-3" >
                <!-- LEVERINGSKODE VELGER SLUTT ----------------------------------------------------->
                <p><fieldset required>
                    
                    </div></div>
                    <div class=row>
                    <div class="col-md-3" >
                    <div class="form-control">
                    <label for="forskudd">Forskudd betalt butikk:</label>
                    <input type="radio" name="forskudd" id="forskudd" value="Forskudd Betalt" required><br>
                    <label for="forskudd">Sende Forskudd faktura:</label>
                    <input type="radio" name="forskudd" id="forskudd" value="Forskudd Faktura" required>
                </p></fieldset></div></div>
                
                
                
                
                <div class="col-md-3" >
                <div class="form-control">
                <label for="trondheim">Plater ifra Trondheim:</label>
                <input type='hidden' value="NEI" name="trondheim">
                <input type="checkbox" name="trondheim" id="trondheim"  value="JA">
                </div></div>
                
                <div class="col-md-3" >
                <div class="form-control"><label for="spesial">Spesial Ordre:</label>
                <input type='hidden' value="NEI" name="spesial">
                <input type="checkbox" name="spesial" id="spesial"  value="JA">
               </div></div>
                <div class="col-md-3" >
                <div class="form-control">
                <label for="ekspress">Ekspress Ordre:</label><br>
                <input type='hidden' value="NEI" name="ekspress">
                <input type="checkbox" name="ekspress" id="ekspress"  value="JA">
                </div></div>
                </div>
                &nbsp; 
            <div class="form-area register-from" >&nbsp; 
            </div>

                <label for="kommentartilordre">Kommentar til Ordre</label><input type="text" id="kommentartilordre" name="kommentartilordre" autocomplete="OFF" placeholder="Eventuelt en kommentar til ordre"><br>
                    </p>
                <label for="kommentartilproduksjon">Kommentar til Produksjon</label><input type="text"  id="kommentartilproduksjon" autocomplete="OFF" name="kommentartilproduksjon" placeholder="Eventuelt en kommentar til produksjonen"><br>
                

                <label for="ordrevedlegg">Ordre vedlegg (pdf)</label><input type="file" id="ordrevedlegg" name="ordrevedlegg" ><br>

                <input type='text' value='Ubehandlet' id='status' name='status' hidden><br>

<input type='text' value='<?php echo $date ?>' id='datoopprettet' name='datoopprettet' hidden><br>





            <input type="submit" name="submit" value="Lage Ordre">
    
            </div></div>

   
</form>
</div>
   </div>
  </div>
 </body>
</html>


