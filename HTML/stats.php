<!DOCTYPE HTML>
<meta charset="utf-8">
<link rel="stylesheet" href="stats.css">
<canvas id="graph"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<html>
<img id="logo" src="../LPF.png">

<head>

</head>

<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
  <h1>BIENVENUE SUR LA PAGE DE STATISTIQUES</h1>
    <div class="contenu">
      <h2>FILTRE</h2>
    <form action="stats.php" method="get">

<div class="box">
     
    <input class="DateDebut" type="date" name="dateDebut" required="required" style="height: 70px;">
    <label>Date de début :</label>
</div>

<div class="box">
     
     <input class="DateFin" type="date" name="dateFin" required="required" style="height: 70px;">
     <label>Date de fin :</label>
</div>

<select class="box form" name="choix" require>
    
  <?php
    
    session_start();

    if($_SESSION['connexion'] != 'medecin'){
      header('location:../index.html');
      exit;
    }


    error_reporting (E_ALL ^ E_NOTICE);
    ini_set("display_errors", 0);

    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost','dev','sio','clinique');

    mysqli_set_charset($mysqli, 'utf8mb4');

    mysqli_select_db($mysqli, "clinique");

    $query="select NomService from service WHERE IDservice = 1 or IDservice = 2 or IDservice = 5;";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
      $nomService = $row["NomService"];
      echo("<option value='".$nomService."' >".$nomService."</option>");
    }

?>


</select>

<input class="envoyer" type="submit" value="envoyer">

</form>

        <a href="calendrier.php">Planning médecin</a>
 

<?php

error_reporting (E_ALL ^ E_NOTICE);
ini_set("display_errors", 0);
$service=$_GET['choix'];
$dateDebut=$_GET['dateDebut'];
$dateFin=$_GET['dateFin'];

    session_start();/*
    $var_ID = $_SESSION['ID_Personnel'];*/
    //echo $var_nom;
    

    /*Activation des erreurs msqli */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost', 'dev', 'sio', 'clinique');

    /*définir le jeu de caractères (syntaxes) après la connextion*/
    mysqli_set_charset($mysqli, 'utf8mb4');
    //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
    mysqli_select_db($mysqli, "clinique");

    $result = mysqli_query($mysqli, "SELECT count(hospitalisations.NumSecuSociale) FROM hospitalisations
    INNER JOIN personnel ON hospitalisations.ID_medecin=personnel.ID_Personnel
    INNER JOIN service ON personnel.IDservice=service.IDservice
    WHERE service.NomService='".$service."' AND hospitalisations.DateAdmi BETWEEN '".$dateDebut."' AND '".$dateFin."';");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nbPatients = $row["count(hospitalisations.NumSecuSociale)"];
    /*printf(" sur " . $nbPatients . " patients <br>");*/

    $result = mysqli_query($mysqli, "SELECT count(hospitalisations.NumSecuSociale) FROM hospitalisations;");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nbPatientsTotaux = $row["count(hospitalisations.NumSecuSociale)"];


    /*Activation des erreurs msqli */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost', 'dev', 'sio', 'clinique');

    /*définir le jeu de caractères (syntaxes) après la connextion*/
    mysqli_set_charset($mysqli, 'utf8mb4');
    //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
    mysqli_select_db($mysqli, "clinique");

   /*$result = mysqli_query($mysqli, "select count(ID_PreAdmin) from clinique.hospitalisations where ID_medecin = '".$var_ID."'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nbHospi = $row["count(ID_PreAdmin)"];

    $result = mysqli_query($mysqli, "select NomMedecin from clinique.personnel where ID_Personnel = '".$var_ID."'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nomMedecin = $row["NomMedecin"];
    */


    ?>

    

<script>

const graph = document.getElementById("graph").getContext("2d");

Chart.defaults.global.defaultFontSize = 18;

let massPopChart = new Chart(graph, {
  type: "pie", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: [
      "Nombre de patients",
      "total",

    ],
    datasets: [
      {
        label: "Stats patients - medecin",
        data: [<?php echo json_encode($nbPatients); ?>, <?php echo json_encode($nbPatientsTotaux); ?>],
        // backgroundColor: "blue",
        backgroundColor: [
          "black",
          "blue",
        ],
        hoverBorderWidth: 3,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "PAGE DE STATISTIQUES",
      fontSize: 24,
    },
    legend: {
      display: true,
    },
    // start at 0
    /*scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },*/
    layout: {
      padding: {
        left: 100,
        right: 100,
        top: 50,
      },
    },
  },
});



</script>

</div>
</body>

</html>