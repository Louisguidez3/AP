<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html><head></head><body>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $nomService=$_POST['nomService'];
    



if(empty($nomService)){
    echo("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
    echo("<div class='petitmessage'><a href='../HTML/panelAdmin.php'> Revenir à la page précédente </a></div>");
}
else{
     /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
 
     $query="INSERT INTO clinique.service (NomService) VALUES('$nomService');";
     mysqli_query($mysqli, $query);
 
     echo("<p class='message'>Le service a bien été ajouté, pour revenir à la page précédente <a href=../HTML/panelAdmin.php> cliquez ici </a></p>");
     /*echo '<br>';
     echo '<br>';
     echo($query);*/
}

   

?>
</body></html>