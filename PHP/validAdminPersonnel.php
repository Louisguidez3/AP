<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html><head></head><body>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $nomPerso=$_POST['nomPerso'];
    $PrenPerso = $_POST['PrenPerso'];
    $NomServ=$_POST['NomServ'];
    $IDcon=$_POST['IDcon'];
    $MDPcon=$_POST['MDPcon'];



     /*Activation des erreurs msqli */
     mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
     $mysqli = mysqli_connect('localhost','dev','sio','clinique');
 
     /*définir le jeu de caractères (syntaxes) après la connextion*/
     mysqli_set_charset($mysqli, 'utf8mb4');
     //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
 
     mysqli_select_db($mysqli, "clinique");
     $result = mysqli_query($mysqli, "select IDservice from service where NomService ='$NomServ';");
     printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
     $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
     $IDservice = $row["IDservice"];



if(empty($nomPerso) or empty($PrenPerso) or empty($NomServ) or empty($IDcon) or empty($MDPcon)){
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
 
     $query="INSERT INTO clinique.personnel (NomMedecin, PrenomMedecin, IDservice, Identifiant, MotDePasse) VALUES('$nomPerso', '$PrenPerso', $IDservice, '$IDcon', '$MDPcon');";
     mysqli_query($mysqli, $query);
 
     echo("<p class='message'>Le personnel a bien été ajouté, pour revenir à la page précédente <a href=../HTML/panelAdmin.php> cliquez ici </a></p>");
     /*echo '<br>';
     echo '<br>';
     echo($query);*/
}

   

?>
</body></html>