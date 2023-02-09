<?php
$sql = db_query("select usertype from google_auth");
$row = mysqli_fetch_array($sql);

// USERTYPE 
// 1 = ADMIN
// 2 = SELGER
// 21 = SELGER OSLO
// 3 = PRODUKSJON SJEF
// 4 = PRODUKSJON
// 5 = REGNSKAP
// 6 = MONTERINGSLEDER
// 7 = MONTØR
//10 = ADM DIR
//11 = LEDELSE



$googlecode = $_SESSION['secret'];
$sql = db_query("select * from google_auth where googlecode = '".$googlecode."'");
$row = mysqli_fetch_array($sql);
$usertype 		= $row['usertype'];
$darkmode = $row['darkmode'];

define("BASE_URL", dirname('https://ordremekka.azurewebsites.net/'));

$baseurl = "https://ordremekka.azurewebsites.net/";

?>
<html>

<head>

<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css-style/topbarstyle.css">
<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css-style/bootstrap-grid.css">
<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css-style/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $baseurl; ?>/assets/css-style/tabell.css" />
<?php 
if($darkmode == '1') {
    echo '<link rel="stylesheet" href="'.$baseurl.'/assets/css-style/topnav-darkmode.css">';
    echo '<link rel="stylesheet" href="'.$baseurl.'/assets/css-style/style-darkmode.css">';}
 else{ echo '<link rel="stylesheet" href="'.$baseurl.'/assets/css-style/style-normal.css">';
      echo '<link rel="stylesheet" href="'.$baseurl.'/assets/css-style/topnav.css">';}
?>
 
</head>


<div class="topnav1" id="myTopnav">
<?php


if ($usertype == '2'){
//SELGER
 echo               '<div class="toptext" >SELGER</div><div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/selger/dashboard.php">MITT DASHBOARD </a><i class="fa fa-caret-down"></i></button>';
 echo               '<div class="dropdown-content1">';
 echo               '<a href="'.$baseurl.'/selger/mineordre.php">Mine Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger/ubehandledeordre.php">Ubehandlede Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger/ubehandledeordre_faktura.php">Sende forskudd faktura</a>';
 echo               '<a href="'.$baseurl.'/selger/hosproduksjon.php">Sendt Produksjon</a>';
 echo               '<a href="'.$baseurl.'/selger/ferdigprodusert.php">Ferdig Produsert</a>';
 echo               '<a href="'.$baseurl.'/selger/mottattavdeling.php">Mottatt Avdeling</a>';
 echo               '<a href="'.$baseurl.'/selger/henteordre.php">Hente Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger/fraktordre.php">Frakte Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger/monteringsordre.php">Monterings Ordre</a>';
 echo               ' </div>';
 echo               '</div>';
 echo               '<div class="dropdown1">';
 echo               '<button class="dropbtn1"><a href="'.$baseurl.'/avdeling/dashboard.php">AVD DASHBOARD</a>';
 echo               '<i class="fa fa-caret-down"></i>';
 echo               '</button>';
 echo               '<div class="dropdown-content1">';
 echo               '<a href="'.$baseurl.'/avdeling/avdelingordre.php">Avdeling Ordre</a>';
 echo               '<a href="'.$baseurl.'/avdeling/ubehandledeordre.php">Ubehandlede Ordre</a>';
 echo                '<a href="'.$baseurl.'/avdeling/ubehandledeordre_faktura.php">Sende forskudd faktura</a>';
 echo               '<a href="'.$baseurl.'/avdeling/hosproduksjon.php">Sendt Produksjon</a>';
 echo               '<a href="'.$baseurl.'/avdeling/ferdigprodusert.php">Ferdig Produsert</a>';
 echo               '<a href="'.$baseurl.'/avdeling/henteordre.php">Hente Ordre</a>';
 echo               '<a href="'.$baseurl.'/avdeling/fraktordre.php">Frakte Ordre</a>';
 echo               '<a href="'.$baseurl.'/avdeling/monteringsordre.php">Monterings Ordre</a>';
 echo                '</div>';
 echo               '</div> ';
 echo               '<a href="'.$baseurl.'/selger/leggtilordre.php">Ny Ordre</a>';
 echo               '<a href="'.$baseurl.'/import/import.php">Importer Ordre</a>';
}
else if($usertype == '21'){
  //SELGER OSLO
 echo               '<div class="toptext" >SELGER OSLO</div><div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/selger_oslo/dashboard.php">MITT DASHBOARD </a><i class="fa fa-caret-down"></i></button>';
 echo               '<div class="dropdown-content1">';
 echo               '<a href="'.$baseurl.'/selger_oslo/mineordre.php">Mine Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger_oslo/ubehandledeordre.php">Ubehandlede Ordre</a>';
 echo               '<a href="'.$baseurl.'/selger_oslo/ubehandledeordre_faktura.php">Sende forskudd faktura</a>';
 echo               '<a href="'.$baseurl.'/selger_oslo/hosproduksjon.php">Sendt Produksjon</a>';
 echo               ' </div>';
 echo               '</div>';
 echo               '<div class="dropdown1">';
 echo               '<button class="dropbtn1"><a href="'.$baseurl.'/avdeling/dashboard.php">AVD DASHBOARD</a>';
 echo               '<i class="fa fa-caret-down"></i>';
 echo               '</button>';
 echo               '<div class="dropdown-content1">';
 echo               '<a href="'.$baseurl.'/avdeling/avdelingordre.php">Avdeling Ordre</a>';
 echo               '<a href="'.$baseurl.'/avdeling/ubehandledeordre.php">Ubehandlede Ordre</a>';
 echo                '<a href="'.$baseurl.'/avdeling/ubehandledeordre_faktura.php">Sende forskudd faktura</a>';
 echo               '<a href="'.$baseurl.'/avdeling/hosproduksjon.php">Sendt Produksjon</a>';
 echo                '</div>';
 echo               '</div> ';
 echo               '<a href="'.$baseurl.'/selger/leggtilordre.php">Ny Ordre</a>';
 echo               '<a href="'.$baseurl.'/import/import.php">Importer Ordre</a>';
}

else if($usertype == '3'){
  //PRODUKSJONS SJEFEN OSLO
  echo               '<div class="toptext" >PRODUKSJONSSJEF OSLO</div><a href="'.$baseurl.'/ps/dashboard.php">PS DASHBOARD</a>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/ps/dashboard_avd1.php">STOR OSLO</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/ps/ubehandledeordre1.php">Ubehandlede Ordre</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre1.php">Sendt ProdLinja</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert1.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling1.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/ps/dashboard_avd2.php">TRONDHEIM</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/ps/ubehandledeordre2.php">Ubehandlede Ordre</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre2.php">Sendt ProdLinja</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert2.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling2.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/ps/dashboard_avd3.php">FREDRIKSTAD</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/ps/ubehandledeordre3.php">Ubehandlede Ordre</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre3.php">Sendt ProdLinja</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert3.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling3.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre.php">PRODUKSJONSLINJA</a>';
  
}
else if($usertype == '4'){
  // PRODUKSJONSLINJA
  echo               '<div class="toptext" >PRODUKSJON OSLO</div><a href="'.$baseurl.'/produksjon/dashboard.php">DASHBOARD</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre.php">PRODUKSJON</a>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="#">STOR OSLO</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre1.php">UBEHANDLEDE</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert1.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling1.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="#">TRONDHEIM</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre2.php">UBEHANDLEDE</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert2.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling2.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="#">FREDRIKSTAD</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/produksjon/ubehandledeordre3.php">UBEHANDLEDE</a>';
  echo               '<a href="'.$baseurl.'/produksjon/ferdigprodusert3.php">Ferdig Produsert</a>';
  echo               '<a href="'.$baseurl.'/produksjon/mottattavdeling3.php">Mottatt Avdeling</a>';
  echo               ' </div>';
  echo               '</div>';
}
else if($usertype == '5'){
  // REGNSKAP
  echo               '<div class="toptext" >REGNSKAP</div><a href="'.$baseurl.'/regnskap/dashboard.php">DASHBOARD</a>';

  echo               '<div class="dropdown1"><button class="dropbtn1"><a href="#">FORSKUDD FAKTURA</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/regnskap/ubehandledeordre.php">FF - SENDE</a>';
  echo               '<a href="'.$baseurl.'/regnskap/forskuddfakturasendt.php">FF - SENDT</a>';
  echo               '<a href="'.$baseurl.'/regnskap/forskuddfakturabetalt.php">FF - BETALT</a>';
  echo               ' </div>';
  echo               '</div>';
  echo               '<a href="'.$baseurl.'/regnskap/sluttfaktura.php">SLUTTFAKTURA</a>';
}
else if($usertype == '6'){
  // MONTERINGSLEDER

  echo               '<div class="toptext" >MONTERINGSLEDER</div><div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/monteringsleder/dashboard.php">DASHBOARD</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/monteringsleder/monteringsordre.php">Monteringsordrer</a>';
  echo               '<a href="'.$baseurl.'/monteringsleder/fraktordre.php">Frakt ordrer</a>';
  echo               '<a href="'.$baseurl.'/monteringsleder/sendtmontor.php">Sendt Montør</a>';
  echo               ' </div>';
  echo               '</div>';
 
}

else if($usertype == '7'){
  // MONTØR
   echo               '<div class="toptext" >MONTØR</div><div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/montor/dashboard.php">DASHBOARD</a><i class="fa fa-caret-down"></i></button>';
  echo               '<div class="dropdown-content1">';
  echo               '<a href="'.$baseurl.'/montor/monteringsordre.php">Monteringsordre</a>';
  echo               '<a href="'.$baseurl.'/montor/monteringavtalt.php">Montering Avtalt</a>';
  echo               '<a href="'.$baseurl.'/montor/monteringutfort.php">Montering Utført</a>';
  echo               ' </div>';
  echo               '</div>';
 
}
else if($usertype == '10'){
  // ADM DIR
    echo               '<div class="toptext" >ADM DIR</div><div class="dropdown1"><button class="dropbtn1"><a href="'.$baseurl.'/ledelse/dashboard_admdir.php">DASHBOARD</a><i class="fa fa-caret-down"></i></button>';
    echo               '<div class="dropdown-content1">';
    echo               ' </div>';
    echo               '</div>';
 
}
else 
{
  echo "";
}
?>
<!---------NY MENY ??? ----------------------->






<!--------------------------------------------->


    <div class=rightmeny>
        <div class='dropdown2'>
            <button class='dropbtn2'>Konto
                <i class='fa fa-caret-down'></i>
            </button>
                <div class='dropdown-content2 '><div class="dropdown-menu-right">
                <a href='<?php echo $baseurl;?>/minkonto.php'>Min Konto</a>
                <a href='<?php echo $baseurl;?>/xtra/forslag.php'>Forslag/ideer</a>
                <a href='<?php echo $baseurl;?>/xtra/salgsmuligheter.php'>Salg Interessenter</a>
                <a href="<?php echo $baseurl;?>/logout.php">Logg Ut</a>
                </div></div>
        </div>
    </div>
   
 
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<script>
  /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav1") {
    x.className += " responsive";
  } else {
    x.className = "topnav1";
  }
}
</script>

