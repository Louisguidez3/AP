<!DOCTYPE HTML>
<meta charset="utf-8">
<link rel="stylesheet" href="style_connexion.css">
<html><head>
    
</head>
<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<div class="contenu">
    <h1>Bienvenue sur la page de pré-admission de la clinique !</h1>
    <br>
    <h3>Première hospitalisation ? <a href="personnes.php">Enregistrez-vous ici !</a></h3>  
    <form action="../PHP/validation.php" method="get">
        Motif de pré-admission :
    <select name="choixMotif" require="">



<?php
    
            session_start();
            if($_SESSION['connexion']!='secretaire'){
                header('location:../index.html');
                exit;
            }


     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     mysqli_set_charset($mysqli, 'utf8mb4');
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="select * from motifspreadmin;";
     $result = $mysqli->query($query);

     while ($row = $result->fetch_assoc()) {
        echo("<option value='1'>".$row["NomMotif"]."</option>");
     }

     
     ?>
    </select>
    <br>
    Date de pré-admission : 
    <input type="date" name="date" require>
    <br>
    Heure de pré-admission : 
    <input type="time" name="heure" require>
    <br>
    Choix du médecin : 
    <select name="choix" require>
    <?php
    



    mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost','dev','sio','clinique');

    mysqli_set_charset($mysqli, 'utf8mb4');

    mysqli_select_db($mysqli, "clinique");


    $query="select * from personnel;";
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
       echo("<option value='".$row["ID_Personnel"]."'>Dr. ".$row["NomMedecin"]."</option>");
    }

    
    ?>
    </select>
    <br>
    <input type="text" name="numsocial" placeholder="Numéro de sécurité sociale" style="width:200px;" require>
    <br>
    <input type="submit" value="envoyer">
</form>

</div>

</body>
</html>