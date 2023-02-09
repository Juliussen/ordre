<?php
 include('../connection.php');
 include('../topbar.php');

//resultat antall ordre total avdeling 1
$resultatmottattordre1 = db_query("SELECT COUNT(1) from ordre where status = 'Sendt Produksjon'");
$row2 = mysqli_fetch_array($resultatmottattordre1);
$mottattordre1 = $row2[0];

$resultatsattpavent1 = db_query("SELECT COUNT(1) from ordre where status = 'Satt på vent'");
$row20 = mysqli_fetch_array($resultatsattpavent1);
$sattpavent1 = $row20[0];

$resultatsendtprodlinje = db_query("SELECT COUNT(1) from ordre where status = 'Sendt prod linje'");
$row20 = mysqli_fetch_array($resultatsendtprodlinje);
$sendtprodlinje = $row20[0];

$resultatferdigprodusert = db_query("SELECT COUNT(1) from ordre where status = 'Ferdig Produsert'");
$row20 = mysqli_fetch_array($resultatferdigprodusert);
$ferdigprodusert = $row20[0];

$resultatmottattavdeling = db_query("SELECT COUNT(1) from ordre where status = 'Ferdig Produsert'");
$row20 = mysqli_fetch_array($resultatmottattavdeling);
$mottattavdeling = $row20[0];



$dataPoints = array( 
	array("label"=>"Venter på produksjon", "symbol" => "O","y"=>$mottattordre1),
	array("label"=>"Satt På Vent", "symbol" => "Si","y"=>$sattpavent1),
	array("label"=>"Produksjonslinje", "symbol" => "Al","y"=>$sendtprodlinje),
	array("label"=>"Ferdig Produsert", "symbol" => "Fe","y"=>$ferdigprodusert),
	array("label"=>"Mottatt Avdeling", "symbol" => "Ca","y"=>$mottattavdeling),
	
 
)
 
?>
<!DOCTYPE HTML>
<html>
<head background-color="red">
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
    
	animationEnabled: true,
    
	title: {
		text: "Oversikt over ordre"
	},
	data: [{
		type: "doughnut",
		
		yValueFormatString: "#,##0\"\"",
		showInLegend: true,
		legendText: "{label} : {y}",
        
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>   