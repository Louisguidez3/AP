<!DOCTYPE HTML>
<link rel="stylesheet" href="../CSS/style.css">
<html><head></head><body>
<?php

error_reporting(E_ALL);
session_start();
ini_set("display_errors", 1);
$identifiant=$_POST['ID'];
$motdepasse = $_POST['mdp'];    

if(isset($_POST['captcha'])){
    if($_POST['captcha']==$_SESSION['code']){
        if(empty($identifiant) or empty($motdepasse)){
            echo("VEUILLEZ REMPLIR TOUS LES CHAMPS ! ");
            echo("<div class='petitmessage'><a href='../HTML/enregistrementClient.html'> Revenir à la page précédente </a></div>");
        }
        
        else{
             /*Activation des erreurs msqli */
             mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
             $mysqli = mysqli_connect('localhost','dev','sio','clinique');
         
             /*définir le jeu de caractères (syntaxes) après la connextion*/
             mysqli_set_charset($mysqli, 'utf8mb4');
             //printf("sucess... %s\n", mysqli_get_host_info($mysqli));
         
             mysqli_select_db($mysqli, "clinique");
         
        
            $result = mysqli_query($mysqli, "select * from clinique.personnel where Identifiant='$identifiant' and MotDePasse='$motdepasse';");
            printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
            $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
            //printf($row["IDservice"]);
        
        
            if($row["IDservice"]==3){
                echo("Bievenue Admin, redirection en cours...");
                $_SESSION['connexion'] = 'admin';
                ?>
                
                <script type="text/javascript">
                var obj = 'window.location.replace("../HTML/panelAdmin.php");';
                setTimeout(obj,100);
                </script> 
                
                <?php
                
            }
            else if($row["IDservice"]==5 or $row["IDservice"]==1 or $row["IDservice"]==2 or $row["IDservice"]==6 or $row["IDservice"]==7){
                echo("Bievenue Médecin généraliste, redirection en cours pour afficher les statistiques...");
                $_SESSION['connexion'] = 'medecin';
                ?>
                <script type="text/javascript">
                var obj = 'window.location.replace("../HTML/stats.php");';
                setTimeout(obj,100);
                </script> 
                
                <?php
                
            } 
        
            else if($row["IDservice"]==4){
                echo("Bievenue Secrétaire, redirection en cours pour ajouter un patient...");
                $_SESSION['connexion'] = 'secretaire';
                ?>
                <script type="text/javascript">
                var obj = 'window.location.replace("../HTML/personnes.php");';
                setTimeout(obj,100);
                </script> 
                
                <?php
                
            } 
            else 
            {
                echo("Votre grade ne vous permet pas d'accéder à une redirection ou à un espace dédié. <br>");
                echo("Les identifiants peuvent aussi être incorrects; si vous pensez que c'est le cas, veuillez contacter un administrateur.");
            }
                
            } 
    } else {
        ?>
        <script type="text/javascript">
            var obj = 'window.location.replace("../erreur.html");';
            setTimeout(obj,100);
        </script> ;
<?php
    }
}
?>
</body></html>