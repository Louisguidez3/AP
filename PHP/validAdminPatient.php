<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html>

<head></head>

<body>
    <?php

$numSecuSupp = $_POST['numSecuSupp'];
 
/*Activation des erreurs msqli */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost','dev','sio','clinique');

/*définir le jeu de caractères (syntaxes) après la connextion*/
mysqli_set_charset($mysqli, 'utf8mb4');
//printf("sucess... %s\n", mysqli_get_host_info($mysqli));

mysqli_select_db($mysqli, "clinique");

$result = mysqli_query($mysqli, "select nomNaiss, prenom from patients where NumSecuSociale ='$numSecuSupp';");
printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$nomPatient = $row["nomNaiss"];
$prenomPatient = $row["prenom"];

echo $numSecuSupp;


$query = "delete FROM `couverturesociale` WHERE NumSecu = " . $numSecuSupp . "; ";
mysqli_query($mysqli, $query);

$query = "delete FROM `documents` WHERE NumSecuSociale = " . $numSecuSupp . "; ";
mysqli_query($mysqli, $query);

$query = "delete FROM `hospitalisations` WHERE NumSecuSociale = " . $numSecuSupp . "; ";
mysqli_query($mysqli, $query);

$query = "delete FROM `patients` WHERE NumSecuSociale = " . $numSecuSupp . "; ";
mysqli_query($mysqli, $query);

echo "suppression de toutes les données du patient ".$nomPatient." ".$prenomPatient;







?>
</body>

</html>