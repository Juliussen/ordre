<?php
include('../connection.php');
include('../topbar.php');
?>

<html>
<div class="container-fluid" align="right"></div>
            <div class="container box">
                <h2>IMPORTER ORDRE</h2>
            </div>
            <div align="right">
    
    </div>

    <div class="form-group"><div class="container box">
                <div class="row justify-content-center">
                        <div class="col-md-4">
<form action="" method="GET" ><br><br>

<input type="text" name="import" id="import" placeholder="Skriv inn Ordre Nummer">
<center>

<br>
<?php
if($_GET['import'] == 0){
   echo "<button class='btn btn-info' type='submit'>Lag Link</button>";

}else{
    echo "<br>Link er laget, klar for å importere";
echo '<button class="btn btn-info" ><a href="import/'.$_GET['import'].'.php" class="text-light">Importer</a></button>';

}

?>
</center>
</div></div></div></div>
<div class="container box">
<h6>FREMGANGSMÅTEN VED IMPORTERING AV ORDRE</h6>
<B><ul>
    <li>Skann inn din ordre som vanlig og send til eposten din.</li>
    <li>Videresend denne eposten (inkludert vedlegg) til ordremottak.garderobemekka@hotmail.com</li>
    <li>Vent til du får kvittering på epost, Sjekk at ordrenr stemmer i kvitteringen</il>
    <li>Tast så inn ordre nummeret i feltet ovenfor</li>
    <li>Trykk på knappen "LAG LINK"</li>
    <li>En ny knapp kommer opp, Trykk på "Importer"</li>
    <li>Din Ordre vil da automatisk bli fylt ut i de fleste feltene.</li>
    <li>Fyll ut resterene</li>
    <li><font color="red">OBS! Sjekk at opplysningene som er fylt ut stemmer</li></font>
    <li>Lagre Ordre</li>

</ul>

</form></div></div></div>
</html>
