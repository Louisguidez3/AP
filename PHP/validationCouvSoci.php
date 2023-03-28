<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html><head></head><body>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $CouvSoci=$_GET['CouvSoci'];
    $NumSecu = $_GET['NumSecu'];
    session_start();
    $_SESSION["NumSecu"]=$NumSecu;
    //$IsAssure=$_GET['EstAssure'];
    //$IsALD=$_GET['IsALD'];
    $NomMutu=$_GET['NomMutu'];
    $NumAdh=$_GET['NumAdh'];
    $NomChambre=$_GET['NomChambre'];


if(isset($_GET['EstAssure'])){
    $IsAssure=1;
}
else{
    $IsAssure=0;
}

if(isset($_GET['IsALD'])){
    $IsALD=1;
}
else{
    $IsALD=0;
}

echo ($IsALD);
echo ($IsAssure);


if(empty($CouvSoci) or empty($NumSecu) or empty($NomMutu) or empty($NumAdh) or empty($NomChambre)){
    echo("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
    echo("<div class='petitmessage'><a href='../HTML/personnes.html'> Revenir à la page précédente </a></div>");
}
else{
     /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="INSERT INTO clinique.couverturesociale (OrganismeSocial, NumSecu, EstAssure, EstALD, NomMutuelleAssu, NumAdherent, NomChambre) VALUES('$CouvSoci', $NumSecu, $IsAssure, $IsALD, '$NomMutu', '$NumAdh', '$NomChambre');";
     mysqli_query($mysqli, $query);
 
    echo("Couverture sociale ajoutée <br>");

    header("location:../HTML/documents.php");

    

}


?>
</body></html>