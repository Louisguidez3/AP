<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/validModif.css">
<html><head></head><body>
<?php

session_start();

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $IDhospi=$_POST['IDadmiss'];
    $_SESSION['IDhospi'] = $IDhospi;
    
     


if(empty($IDhospi) ){
    echo("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
    echo("<div class='petitmessage'><a href='../HTML/panelAdmin.html'> Revenir à la page précédente </a></div>");
}
else{

/*Activation des erreurs msqli */
mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost','dev','sio','clinique');

/*définir le jeu de caractères (syntaxes) après la connextion*/
mysqli_set_charset($mysqli, 'utf8mb4');
//printf("sucess... %s\n", mysqli_get_host_info($mysqli));

mysqli_select_db($mysqli, "clinique");
$result = mysqli_query($mysqli, "select * from hospitalisations where ID_PreAdmin ='$IDhospi';");
//printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$DateAdmi = $row["DateAdmi"];
$DateAdmi2 = strval($DateAdmi);
//echo $DateAdmi;
$Heure_inter = $row["Heure_inter"];
$IDmed = $row["ID_medecin"];
$IDMotif = $row["ID_MotifAdmi"];
$NumSecu = $row["NumSecuSociale"];
$_SESSION['NumSecu'] = $NumSecu;
//echo $NumSecu;


mysqli_select_db($mysqli, "clinique");
$result = mysqli_query($mysqli, "select NomMedecin from personnel where ID_Personnel ='$IDmed';");
//printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$IDmed = $row["NomMedecin"];

mysqli_select_db($mysqli, "clinique");
$result = mysqli_query($mysqli, "select NomMotif from motifspreadmin where ID_MotifAdmin ='$IDMotif';");
//printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$IDMotif = $row["NomMotif"];

mysqli_select_db($mysqli, "clinique");
$result = mysqli_query($mysqli, "select NomNaiss, Prenom from patients where NumSecuSociale ='$NumSecu';");
//printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$nomPatient = $row["NomNaiss"];
$prenomPatient = $row["Prenom"];

$_SESSION['prenom']=$prenomPatient;
$_SESSION['nom']=$nomPatient;


    echo ('
    <div class="page">
    <div class="contenu">
    <form method="post" action="../PHP/validModifHospi2.php" >
    <h2>Modification admission</h2>
    Date admission :
    <input class="DateAdmi" value="'.$DateAdmi2.'" type="text" name="DateAdmi" style="width:200px;">    
    <br>
    Heure admission :
    <input class="HeureAdmi" value="'.$Heure_inter.'"type="text" name="HeureAdmi" style="width:200px;">   
    <br>


    Nom du medecin :
    <select name="nomMedecin" class="nomMedecin" style="width:200px; require="">
    <br>
');



mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     mysqli_set_charset($mysqli, 'utf8mb4');
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="select * from personnel where IDservice = 1 or IDservice = 2 or IDservice = 5 or IDservice = 6 or IDservice = 7 ;";
     $result = $mysqli->query($query);

     while ($row = $result->fetch_assoc()) {
        echo("<option> ".$row["NomMedecin"]."</option>");
     }






echo('
     </select>
    <br><br>
    motif d admission:

    <select name="choixListe" class="choixListe" style="width:200px; require="">
');


mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     mysqli_set_charset($mysqli, 'utf8mb4');
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="select * from motifspreadmin;";
     $result = $mysqli->query($query);

     while ($row = $result->fetch_assoc()) {
        echo("<option>".$row["NomMotif"]."</option>");
     }

echo('
     </select>
     
    <br>
    Nom du patient :
    <input class="NomPatient" value="'.$nomPatient.'"type="text" name="NomPatient" style="width:200px;">   
    <br>
    Prénom du patient :
    <input class="PrenomPatient" value="'.$prenomPatient.'"type="text" name="PrenomPatient" style="width:200px;">   
    <br>
    <data class="NumSecu" value="'.$NumSecu.'" name="NumSecu">'.'Numéro de sécurité sociale : '.$NumSecu.'</data>
    <br>
    <input class="envoyer" type="submit">
     </div>
     </div>');
}

   

?>
</body></html>