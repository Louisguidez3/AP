<!DOCTYPE HTML>
<link rel="stylesheet" href="../HTML/style_connexion.css">
<html><head></head><body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php

session_start();

if($_SESSION['connexion']!='secretaire'){
    header('location:../index.html');
    exit;
}

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $IDhospi=$_POST['IDadmiss'];
    
    $mysqli = mysqli_connect('localhost','dev','sio','clinique');

    /*définir le jeu de caractères (syntaxes) après la connextion*/
    mysqli_set_charset($mysqli, 'utf8mb4');
    //printf("sucess... %s\n", mysqli_get_host_info($mysqli));

    mysqli_select_db($mysqli, "clinique");

    $query = "DELETE FROM `hospitalisations` WHERE ID_PreAdmin=$IDhospi; ";
    mysqli_query($mysqli, $query);

    echo("L'hospitalisation a bien été supprimée, retour à la page précédente");

?>

<script type="text/javascript">
        var obj = 'window.location.replace("../HTML/personnes.php");';
        setTimeout(obj, 2000);
    </script>
</body></html>