<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html>

<head></head>

<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
    <?php
    session_start();
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    $dateNaiss = $_GET['dateNaiss'];
    $adresse = $_GET['adresse'];
    $codep = $_GET['codep'];
    $mail = $_GET['mail'];
    $numtel = $_GET['numtel'];
    $numSociale = $_GET['numSociale'];



    


    $genre = $_GET['genre'];
    $ville = $_GET['ville'];


    $var_nom = $_SESSION['nom'];
    $var_prenom = $_SESSION['prenom'];
    $var_numtel = $_SESSION['numtel'];
    $var_adresse = $_SESSION['adresse'];


    $var_nomprev = $_SESSION['nomprev'];
    $var_prenomprev = $_SESSION['prenomprev'];
    $var_numtelprev = $_SESSION['numtelprev'];
    $var_adresseprev = $_SESSION['adresseprev'];

    echo ($var_nom . $var_prenom . $var_numtel . $var_adresse."<br>\n\n\n\r\r\r");
    
    echo ($var_nomprev . $var_prenomprev . $var_numtelprev . $var_adresseprev."<br>\n\n\n\r\r\r");
    /*echo ($heure);
    echo '<br>';
    echo ($motif);
    echo '<br>';
    echo ($choix);
    echo '<br>';*/

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost','dev','sio','clinique');

    /*définir le jeu de caractères (syntaxes) après la connextion*/
    mysqli_set_charset($mysqli, 'utf8mb4');
    //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
    mysqli_select_db($mysqli, "clinique");

    $result = mysqli_query($mysqli, "select * from clinique.personnesautres where Nom = '" . $var_nom . "' and Prenom = '" . $var_prenom . "' and Telephone = " . $var_numtel . " and Adresse = '" . $var_adresse . "'");

    $nblignes = mysqli_num_rows($result);

    echo '<br>';
    echo $nblignes;
    echo '<br>';
    echo '<br>';
    echo '<br>';

    if ($nblignes < 1) {


        $mysqli = mysqli_connect('localhost','dev','sio','clinique');

        /*définir le jeu de caractères (syntaxes) après la connextion*/
        mysqli_set_charset($mysqli, 'utf8mb4');
        //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
        mysqli_select_db($mysqli, "clinique");

        $query = "insert into clinique.personnesautres (Nom, Prenom, Telephone, Adresse) VALUES('" . $var_nom . "', '" . $var_prenom . "', " . $var_numtel . ", '" . $var_adresse . "');";
        mysqli_query($mysqli, $query);

        /*Activation des erreurs msqli */
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect('localhost','dev','sio','clinique');

        /*définir le jeu de caractères (syntaxes) après la connextion*/
        mysqli_set_charset($mysqli, 'utf8mb4');
        //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
        mysqli_select_db($mysqli, "clinique");

        $result = mysqli_query($mysqli, "select * from clinique.personnesautres where Nom = '" . $var_nom . "' and Prenom = '" . $var_prenom . "' and Telephone = " . $var_numtel . " and Adresse = '" . $var_adresse . "'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        printf($row["IDpersonne"]);
        $IDPERS = $row["IDpersonne"];
        $IDPERSCONF = $row["IDpersonne"];
    } else {

        /*Activation des erreurs msqli */
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect('localhost','dev','sio','clinique');

        /*définir le jeu de caractères (syntaxes) après la connextion*/
        mysqli_set_charset($mysqli, 'utf8mb4');
        //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
        mysqli_select_db($mysqli, "clinique");

        $result = mysqli_query($mysqli, "select * from clinique.personnesautres where Nom = '" . $var_nom . "' and Prenom = '" . $var_prenom . "' and Telephone = " . $var_numtel . " and Adresse = '" . $var_adresse . "'");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        printf($row["IDpersonne"]);
        $IDPERS = $row["IDpersonne"];
        $IDPERSCONF = $row["IDpersonne"];
    }

    


    if (empty($prenom) or empty($nom) or empty($dateNaiss) or empty($adresse) or empty($codep) or empty($mail) or empty($numtel)) {
        echo ("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
        echo ("<div class='petitmessage'><a href='../HTML/enregistrementClient.php'> Revenir à la page précédente </a></div>");
    } else {
        /*Activation des erreurs msqli */
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $mysqli = mysqli_connect('localhost','dev','sio','clinique');

        /*définir le jeu de caractères (syntaxes) après la connextion*/
        mysqli_set_charset($mysqli, 'utf8mb4');
        //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
    
        mysqli_select_db($mysqli, "clinique");

        $query = "INSERT INTO clinique.patients (NumSecuSociale, Civilite, NomNaiss, NomEpouse, Prenom, DateNaiss, Adresse, CodeP, Ville, Email, Telephone, ID_persCONFIANCE, ID_persPREVENIR) VALUES($numSociale, '$genre', '$nom', 'default', '$prenom', '$dateNaiss', '$adresse', $codep, '$ville', '$mail', $numtel, $IDPERSCONF, $IDPERS);";
        mysqli_query($mysqli, $query);

        echo ("Patient ajouté !<br>");
        echo ("Redirection en cours pour ajouter sa couverture sociale...");


    ?>
    <script type="text/javascript">
        var obj = 'window.location.replace("../HTML/couvertureSociale.php");';
        setTimeout(obj, 2000);
    </script>
    <?php

            }

    ?>
</body>

</html>