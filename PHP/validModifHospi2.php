<!DOCTYPE HTML>
<link rel="stylesheet" href="../HTML/style_connexion.css">
<html><head></head><body>
<?php
session_start();

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $IDhospi = $_SESSION['IDhospi'];

//echo $_SESSION['NumSecu']." ";

    $DateAdmi=$_POST['DateAdmi'];

//echo $DateAdmi." ";

    $HeureAdmi=$_POST['HeureAdmi'];

//echo $HeureAdmi." ";


    $IDmotif = 1;

    $NomPatient=$_POST['NomPatient'];

//echo $NomPatient." ";

    $PrenomPatient=$_POST['PrenomPatient'];

//echo $PrenomPatient." ";    

    $NumSecu = $_SESSION['NumSecu'];

//echo $NumSecu." ";

    $choixListe = $_POST['choixListe'];

//echo $choixListe." ";

    $nomMedecin = $_POST['nomMedecin'];

//echo $nomMedecin." ";




    /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));



     mysqli_select_db($mysqli, "clinique");
     $result = mysqli_query($mysqli, "Select ID_Personnel from personnel where NomMedecin='".$nomMedecin."' ");
     //printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
     $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
     $IDmedecin = $row["ID_Personnel"];



    //echo('C L ID MEDECIN : '.$IDmedecin);




if($_SESSION['nom'] != $NomPatient or $_SESSION['prenom'] != $PrenomPatient){

    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="update patients set NomNaiss = '".$NomPatient."', Prenom = '".$PrenomPatient."' WHERE NumSecuSociale = ".$NumSecu.";";

     mysqli_query($mysqli, $query);

}




    /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));



     mysqli_select_db($mysqli, "clinique");
     $result = mysqli_query($mysqli, "Select ID_MotifAdmin from motifspreadmin where NomMotif='".$choixListe."' ");
     //printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
     $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
     $IDmotif = $row["ID_MotifAdmin"];







     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="update hospitalisations set DateAdmi='".$DateAdmi."',Heure_inter='".$HeureAdmi."', ID_Medecin = ".$IDmedecin.", ID_MotifAdmi =".$IDmotif." WHERE ID_PreAdmin = ".$IDhospi.";";
     mysqli_query($mysqli, $query);



echo "</br> SUCCES, la base a bien ete modifée";








     //echo "update hospitalisations set DateAdmi='" . $DateAdmi . "',Heure_inter='" . $HeureAdmi . "', ID_MotifAdmi =" . $IDmotif . " WHERE NumSecuSociale = " . $NumSecu . "; ";
     
     



    

?>

<script type="text/javascript">
var obj = 'window.location.replace("../HTML/personnes.php");';
setTimeout(obj,1000);
</script> 
</body></html>