<!DOCTYPE HTML>
<link rel="stylesheet" href="../HTML/style_connexion.css">
<html><head></head><body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php


$DateSelec=$_POST['DateSelec'];

$ddate = $DateSelec;
$date = new DateTime($ddate);
$week = $date->format("W");
$year = $date->format("Y");

echo "Weeknummer: $week";
echo "Yearnummer: $year";

$int_week = (int) $week;
$int_year = (int) $year;

$semaine = $int_week;
$année = $int_year;

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
  echo "</br>";
  $date1=$tab_dates[0];
  echo $date1;
  echo "</br>";
  $date2=$tab_dates[$nb_dates-1];
  echo $date2."</br>"; 
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
 $result = mysqli_query($mysqli, "select * from clinique.hospitalisations where DateAdmi between '".$date1."' and '".$date2."' ORDER BY DateAdmi;");
 printf("Il y a %d hospitalisations entre le $date1 et le $date2. <br>", mysqli_num_rows($result));
 $row=mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row == 0){
  printf("Aucune pré-admission pour la semaine sélectionnée");
    ?>
    <script type="text/javascript">
        var obj = 'window.location.replace("../erreur_PDF.html");';
        setTimeout(obj,100);
    </script> ;
    <?php
}
else{

//    $DateAdmi = $row["DateAdmi"];
//    $Heure_inter = $row["Heure_inter"];
//    $IDmed = $row["ID_medecin"];
//    $IDMotif = $row["ID_MotifAdmi"];
//    $NumSecu = $row["NumSecuSociale"];
//
//
//
//    mysqli_select_db($mysqli, "clinique");
//    $result2 = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = ".$IDmed.";");
//    $row2=mysqli_fetch_array($result2, MYSQLI_ASSOC);
//    $nomMedecin = $row2['NomMedecin'];
//
//
//
//    mysqli_select_db($mysqli, "clinique");
//    $result3 = mysqli_query($mysqli, "select NomMotif from clinique.motifspreadmin where ID_MotifAdmin = ".$IDMotif.";");
//    $row3=mysqli_fetch_array($result3, MYSQLI_ASSOC);
//    $nomMotif = $row3['NomMotif'];
//
//    mysqli_select_db($mysqli, "clinique");
//    $result4 = mysqli_query($mysqli, "select NomNaiss, Prenom from clinique.patients where NumSecuSociale = ".$NumSecu.";");
//    $row4=mysqli_fetch_array($result4, MYSQLI_ASSOC);
//    $Prenom = $row4['Prenom'];
//    $Nom = $row4['NomNaiss'];
//
//    echo("Date : ".$DateAdmi." heure : ". $Heure_inter." nom médecin : Dr.". $nomMedecin." avec le motif : ". $nomMotif." pour le patient : ". $Nom. " ".$Prenom." </br>");
//
//    while ($row = $result->fetch_assoc()) {
// $DateAdmi = $row["DateAdmi"];
// $Heure_inter = $row["Heure_inter"];
// $IDmed = $row["ID_medecin"];
// $IDMotif = $row["ID_MotifAdmi"];
// $NumSecu = $row["NumSecuSociale"];
//
//
//
// mysqli_select_db($mysqli, "clinique");
// $result2 = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = ".$IDmed.";");
// $row2=mysqli_fetch_array($result2, MYSQLI_ASSOC);
// $nomMedecin = $row2['NomMedecin'];
//
//
//
// mysqli_select_db($mysqli, "clinique");
// $result3 = mysqli_query($mysqli, "select NomMotif from clinique.motifspreadmin where ID_MotifAdmin = ".$IDMotif.";");
// $row3=mysqli_fetch_array($result3, MYSQLI_ASSOC);
// $nomMotif = $row3['NomMotif'];
//
// mysqli_select_db($mysqli, "clinique");
// $result4 = mysqli_query($mysqli, "select NomNaiss, Prenom from clinique.patients where NumSecuSociale = ".$NumSecu.";");
// $row4=mysqli_fetch_array($result4, MYSQLI_ASSOC);
// $Prenom = $row4['Prenom'];
// $Nom = $row4['NomNaiss'];
//
// echo("Date : ".$DateAdmi." heure : ". $Heure_inter." nom médecin : Dr.". $nomMedecin." avec le motif : ". $nomMotif." pour le patient : ". $Nom. " ".$Prenom." </br>");
// }


    ob_start();
    require('../FPDF/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

// Table header
    //$pdf->Cell(40,10,"okok");
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Image('../LPF.png', $pdf->GetPageWidth()-50, 0, 50, 50);
    $pdf->Cell(40,10,"Natacha.C,",0,1);
    $pdf->Cell(40,10,"Secretariat de la clinique LPF",0,3);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(40, 10, "Compte-rendu des pre-admissions pour la semaine du " . $date1 . " au " . $date2 ." :", 0, 1);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(25, 8, "Date", 1);
    $pdf->Cell(35, 8, "Heure", 1);
    $pdf->Cell(30, 8, "Medecin", 1);
    $pdf->Cell(35, 8, "Motif", 1);
    $pdf->Cell(35, 8, "Nom", 1);
    $pdf->Cell(35, 8, "Prenom", 1);
    $pdf->Ln();

// Table content
    $pdf->SetFont('Arial', '', 8);
    $DateAdmi = $row["DateAdmi"];
    $Heure_inter = $row["Heure_inter"];
    $IDmed = $row["ID_medecin"];
    $IDMotif = $row["ID_MotifAdmi"];
    $NumSecu = $row["NumSecuSociale"];


    mysqli_select_db($mysqli, "clinique");
    $result2 = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = " . $IDmed . ";");
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $nomMedecin = $row2['NomMedecin'];


    mysqli_select_db($mysqli, "clinique");
    $result3 = mysqli_query($mysqli, "select NomMotif from clinique.motifspreadmin where ID_MotifAdmin = " . $IDMotif . ";");
    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
    $nomMotif = $row3['NomMotif'];

    mysqli_select_db($mysqli, "clinique");
    $result4 = mysqli_query($mysqli, "select NomNaiss, Prenom from clinique.patients where NumSecuSociale = " . $NumSecu . ";");
    $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
    $Prenom = $row4['Prenom'];
    $Nom = $row4['NomNaiss'];

    $pdf->Cell(25, 8, $DateAdmi, 1);
    $pdf->Cell(35, 8, $Heure_inter, 1);
    $pdf->Cell(30, 8, "Dr. " . $nomMedecin, 1);
    $pdf->Cell(35, 8, $nomMotif, 1);
    $pdf->Cell(35, 8, $Nom, 1);
    $pdf->Cell(35, 8, $Prenom, 1);
    $pdf->Ln();
    while ($row = $result->fetch_assoc()) {
        $DateAdmi = $row["DateAdmi"];
        $Heure_inter = $row["Heure_inter"];
        $IDmed = $row["ID_medecin"];
        $IDMotif = $row["ID_MotifAdmi"];
        $NumSecu = $row["NumSecuSociale"];


        mysqli_select_db($mysqli, "clinique");
        $result2 = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = " . $IDmed . ";");
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $nomMedecin = $row2['NomMedecin'];


        mysqli_select_db($mysqli, "clinique");
        $result3 = mysqli_query($mysqli, "select NomMotif from clinique.motifspreadmin where ID_MotifAdmin = " . $IDMotif . ";");
        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        $nomMotif = $row3['NomMotif'];

        mysqli_select_db($mysqli, "clinique");
        $result4 = mysqli_query($mysqli, "select NomNaiss, Prenom from clinique.patients where NumSecuSociale = " . $NumSecu . ";");
        $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
        $Prenom = $row4['Prenom'];
        $Nom = $row4['NomNaiss'];

        $pdf->Cell(25, 8, $DateAdmi, 1);
        $pdf->Cell(35, 8, $Heure_inter, 1);
        $pdf->Cell(30, 8, "Dr. " . $nomMedecin, 1);
        $pdf->Cell(35, 8, $nomMotif, 1);
        $pdf->Cell(35, 8, $Nom, 1);
        $pdf->Cell(35, 8, $Prenom, 1);
        $pdf->Ln();
    }

    $pdf->Output();
    ob_end_flush();

}





?>
</body></html>