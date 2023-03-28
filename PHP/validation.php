<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html><head></head><body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $date=$_GET['date'];
    $heure = $_GET['heure'];
    $choix=$_GET['choix'];
    $motif=$_GET['choixMotif'];
    $numsociale=$_GET['numsocial'];

/*echo ($heure);
echo '<br>';
echo ($motif);
echo '<br>';
echo ($choix);
echo '<br>';*/

if(empty($date) or empty($heure) or empty($choix) or empty($motif) or empty($numsociale)){
    echo("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
    echo("<div class='petitmessage'><a href='formulaire.html'> Revenir à la page précédente </a></div>");
}
else{
     /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="INSERT INTO clinique.hospitalisations (DateAdmi, Heure_inter, ID_medecin, ID_MotifAdmi, NumSecuSociale) VALUES('{$date}', '{$heure}', $choix, $motif, $numsociale);";
     mysqli_query($mysqli, $query);
 
     echo("<p class='message'>La pré-admission a bien été prise en compte, pour revenir à la page précédente <a href=../HTML/formulaire.php> cliquez ici </a></p>");
     /*echo '<br>';
     echo '<br>';
     echo($query);*/
}

   

?>
</body></html>