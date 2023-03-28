<!DOCTYPE html>
<meta charset="utf-8" />
<link rel="stylesheet" href="../CSS/personnes.css" />
<html>

<head> </head>

<body>
  <div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>


  <script>



function afficherPositionCurseur() {
  let lastX = -1;
  let lastY = -1;
  
  setInterval(() => {
    const x = window.event.clientX;
    const y = window.event.clientY;
    
    if (x !== lastX || y !== lastY) {
      console.log(`Position du curseur : x=${x} y=${y}`);
      lastX = x;
      lastY = y;
    }
  }, 5000);
}

afficherPositionCurseur();

  </script>



  <?php
  session_start();

  if ($_SESSION['connexion'] != 'secretaire') {
    header('location:../index.html');
    exit;
  }

  ?>


  <h1>
    Bienvenue sur la page d'enregistrement des personnes à prévenir et des
    personnes de confiance
  </h1>

  <div class="contenu contenu2">

    <h2>MODIFICATION D'UNE HOSPITALISATION</h2>
    <form method="post" action="../PHP/validModifHospi.php">
      ID d'admission :
      <input class="IDadmiss" type="text" name="IDadmiss" style="width:200px;">
      <br>
      <input class="envoyer" type="submit">
    </form>





    <h2>SUPPRESSION D'UNE HOSPITALISATION</h2>
    <form method="post" action="../PHP/validSuppHospi.php">
      ID d'admission :
      <input class="IDadmiss" type="text" name="IDadmiss" style="width:200px;">
      <br>
      <input class="envoyer" type="submit">
    </form>

  </div>

  <div class="contenu contenu3">

    <h2>RAPPORTS D'HOSPITALISATIONS</h2>
    <form method="post" action="../PHP/validRapportHospi.php">
      Date de sélection (Sélection de la semaine entière de la date sélectionnée)
      <input class="DateSelec" type="date" name="DateSelec" style="width:200px;" required="required">
      <br>


      <input class="envoyer" type="submit">

      <a href="formulaire.php">
        <p>Ajouter une pré-admission</p>
      </a>

    </form>

  </div>


  <div class="contenu contenu4">

    <h2>ACCES AUX HOSPITALISATIONS</h2>
    <form method="post" action="../PHP/validAffichHospi.php">
      Date de sélection (Sélection de la semaine entière de la date sélectionnée)
      <input class="DateSelec" type="date" name="DateSelec" style="width:200px;" required="required">
      <br>
      Sélection du service
      <select class="box form" name="choix" require>

        <?php

        error_reporting(E_ALL ^ E_NOTICE);
        ini_set("display_errors", 0);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect('localhost', 'dev', 'sio', 'clinique');

        mysqli_set_charset($mysqli, 'utf8mb4');

        mysqli_select_db($mysqli, "clinique");

        $query = "select * from motifspreadmin";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
          $service = $row["NomMotif"];
          echo ("<option value='" . $service . "' >" . $service . "</option>");
        }

        ?>


      </select>


      <input class="envoyer" type="submit">
    </form>

  </div>



  <div class="contenu contenuPersonnes">
    <br />
    <form action="enregistrementClient.php" method="get">
      <br />
      <h2>Personne de confiance</h2>
      <div class="box">
        <input class="nom" type="text" name="nom" required="required" />
        <label> Nom :</label>
      </div>

      <br />

      <div class="box">
        <input class="prenom" type="text" name="prenom" required="required" />
        <label>Prenom :</label>
      </div>

      <br />

      <div class="box">
        <input class="adresse" type="text" name="adresse" required="required" />
        <label>Adresse :</label>
      </div>

      <br />

      <div class="box">
        <input class="numtel" type="text" name="numtel" required="required" />
        <label>Numéro de téléphone :</label>
      </div>

      <h2>Personne à prévenir</h2>


      <div class="box">
        <input class="nomprev" type="text" name="nomprev" required="required" />
        <label> Nom :</label>
      </div>

      <br />

      <div class="box">
        <input class="prenomprev" type="text" name="prenomprev" required="required" />
        <label>Prenom :</label>
      </div>

      <br />

      <div class="box">
        <input class="adresseprev" type="text" name="adresseprev" required="required" />
        <label>Adresse :</label>
      </div>

      <br />

      <div class="box">
        <input class="numtelprev" type="text" name="numtelprev" required="required" />
        <label>Numéro de téléphone :</label>
      </div>


      <input class="envoyer" type="submit" value="envoyer" />


    </form>


  </div>
</body>

</html>