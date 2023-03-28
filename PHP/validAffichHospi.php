<!DOCTYPE HTML>
<link rel="stylesheet" href="../HTML/style_connexion.css">
<html><head></head><body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php


$DateSelec=$_POST['DateSelec'];
$choixService = $_POST['choix'];






 /*Activation des erreurs msqli */
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $mysqli = mysqli_connect('localhost','dev','sio','clinique');

 /*définir le jeu de caractères (syntaxes) après la connextion*/
 mysqli_set_charset($mysqli, 'utf8mb4');
 //printf("sucess... %s\n", mysqli_get_host_info($mysqli));

 mysqli_select_db($mysqli, "clinique");

 $result = mysqli_query($mysqli, "select * from clinique.motifspreadmin where NomMotif = '" . $choixService . "'; ");
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 /*printf($row["ID_MotifAdmin"]);*/
 $service = $row["ID_MotifAdmin"];










$ddate = $DateSelec;
$date = new DateTime($ddate);
$week = $date->format("W");
$year = $date->format("Y");
/*
echo "Weeknummer: $week";
echo "Yearnummer: $year";*/

$int_week = (int) $week;
$int_year = (int) $year;

$semaine = $int_week;
$année = $int_year;


/*
echo $choixService;*/

// calculer les dates et rechercher celles correspondant à la semaine recherchée
$tab_dates = array(); // mémoire des dates à trouver
for ($mois=1; $mois<=12; $mois++){
  for ($jour=1; $jour<=31; $jour++){
    // si la date est valide
    if (checkdate($mois, $jour, $année)){
      // si la date correspond à la semaine recherchée
      $date = mktime(0,0,0,$mois, $jour, $année);
      if (date("W", $date) == $semaine){
        // mémoriser la date trouvée
        $tab_dates[] = date("Y-m-d", $date);
      }
    }
  }
}

// afficher les dates de début et de fin de la semaine recherchée
$nb_dates = count($tab_dates); // nombre de dates trouvées
if ($nb_dates <=0) echo "Aucune date n'est trouvée!";
else {
 /* echo "</br>";*/
  $date1=$tab_dates[0];
 /* echo $date1;
  echo "</br>";*/
  $date2=$tab_dates[$nb_dates-1];
 /* echo $date2."</br>"; */
}


error_reporting(E_ALL);
ini_set("display_errors", 1);

 /*Activation des erreurs msqli */
 mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 $mysqli = mysqli_connect('localhost','dev','sio','clinique');

 /*définir le jeu de caractères (syntaxes) après la connextion*/
 mysqli_set_charset($mysqli, 'utf8mb4');
 //printf("sucess... %s\n", mysqli_get_host_info($mysqli));

 mysqli_select_db($mysqli, "clinique");
 $result = mysqli_query($mysqli, "select * from clinique.hospitalisations where DateAdmi between '".$date1."' and '".$date2."' and ID_MotifAdmi = $service;");
 printf("Il y a %d hospitalisations entre le $date1 et le $date2 avec le motif $choixService <br>", mysqli_num_rows($result));
 $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row == 0){
  printf("Aucune pré-admission pour la semaine sélectionnée");
}
else{


 $DateAdmi = $row["DateAdmi"];
 $Heure_inter = $row["Heure_inter"];
 $IDmed = $row["ID_medecin"];
 $IDMotif = $row["ID_MotifAdmi"];
 $NumSecu = $row["NumSecuSociale"];

 

 mysqli_select_db($mysqli, "clinique");
 $result2 = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = ".$IDmed.";");
 $row2=mysqli_fetch_array($result2, MYSQLI_ASSOC);
 $nomMedecin = $row2['NomMedecin'];



 mysqli_select_db($mysqli, "clinique");
 $result3 = mysqli_query($mysqli, "select NomMotif from clinique.motifspreadmin where ID_MotifAdmin = ".$IDMotif.";");
 $row3=mysqli_fetch_array($result3, MYSQLI_ASSOC);
 $nomMotif = $row3['NomMotif'];

 mysqli_select_db($mysqli, "clinique");
 $result4 = mysqli_query($mysqli, "select NomNaiss, Prenom from clinique.patients where NumSecuSociale = ".$NumSecu.";");
 $row4=mysqli_fetch_array($result4, MYSQLI_ASSOC);
 $Prenom = $row4['Prenom'];
 $Nom = $row4['NomNaiss'];

 $i = 0;
 while ($row = $result->fetch_assoc()) {
    echo("Date : ".$DateAdmi." heure : ". $Heure_inter." nom médecin : Dr.". $nomMedecin." avec le motif : ". $nomMotif." pour le patient : ". $Nom. " ".$Prenom." </br>");
 }
}

 ?>

 <a href="../HTML/personnes.php">Revenir à la page précédente</a>
 </body>
 </html>