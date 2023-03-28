<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>

<?php

session_start();


$NumSecu =  $_SESSION['NumSecu'];


if ($_FILES['CI']['size'] <= 1500000)

        {

                // Testons si l'extension est autorisée

                $infosfichier = pathinfo($_FILES['CI']['name']);

                $extension_upload = $infosfichier['extension'];
                echo $infosfichier['extension'];

                $extensions_autorisees = array('jpg', 'jpeg', 'pdf', 'png','PNG','PDF','JPEG','JPG');

                if (in_array($extension_upload, $extensions_autorisees))

                {

                echo("Bonne extension de fichier");

                }
                else{
                    echo("MAUVAIS TYPE DE FICHIER, retour à la page précédente");
                    header('Location:documents.php');
                    exit();
                    
                }

        }
else{
    echo('FICHIER TROP GROS');
    header('Location:documents.php');
    exit();
}







/*Activation des erreurs msqli */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost','dev','sio','clinique');

/*définir le jeu de caractères (syntaxes) après la connextion*/
mysqli_set_charset($mysqli, 'utf8mb4');
//printf("sucess... %s\n", mysqli_get_host_info($mysqli));

mysqli_select_db($mysqli, "clinique");

$result = mysqli_query($mysqli, "select nomNaiss, prenom from patients where NumSecuSociale ='$NumSecu';");
printf("select a retourné %d lignes. <br>", mysqli_num_rows($result));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$NomPatient = $row["nomNaiss"];
$prenomPatient = $row["prenom"];


$nomFichierCI = date('j-m-Y_H.i.s') .$NomPatient.'-'.$prenomPatient.'-'.'CARTEIDENTITE';
move_uploaded_file($_FILES['CI']['tmp_name'], '../fichiers/' . $nomFichierCI. basename($_FILES['CI']['name']));
echo "L'envoi de la carte d'identité bien été effectué ! </br>";

$nomFichierMUTU = date('j-m-Y_H.i.s') .$NomPatient.'-'.$prenomPatient.'-'.'MUTUELLE';
move_uploaded_file($_FILES['mutuelle']['tmp_name'], '../fichiers/' . $nomFichierMUTU. basename($_FILES['mutuelle']['name']));
echo "L'envoi de la carte de mutuelle bien été effectué !  </br> ";

$nomFichierCVITALE = date('j-m-Y_H.i.s').$NomPatient.'-'.$prenomPatient.'-'.'CARTEVITALE';
move_uploaded_file($_FILES['cVitale']['tmp_name'], '../fichiers/' . $nomFichierCVITALE. basename($_FILES['cVitale']['name']));
echo "L'envoi de la carte vitale bien été effectué ! </br>";

if(isset($_FILES['livrfam'])){
    $nomFichierLIVRFAM = date('j-m-Y_H.i.s') .$NomPatient.'-'.$prenomPatient.'-'.'LIVRETFAMILLE';
    move_uploaded_file($_FILES['livrfam']['tmp_name'], '../fichiers/' . $nomFichierLIVRFAM. basename($_FILES['livrfam']['name']));
}





$cheminCI = '../fichiers/'.$nomFichierCI.basename($_FILES['CI']['name']);
echo $cheminCI;
echo'</br>';
$cheminMUTU = '../fichiers/'.$nomFichierMUTU.basename($_FILES['mutuelle']['name']);
echo $cheminMUTU;
echo'</br>';
$cheminCVITALE = '../fichiers/'.$nomFichierCVITALE.basename($_FILES['cVitale']['name']);
echo $cheminCVITALE;



/*Activation des erreurs msqli */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost','dev','sio','clinique');

/*définir le jeu de caractères (syntaxes) après la connextion*/
mysqli_set_charset($mysqli, 'utf8mb4');
//printf("sucess... %s\n", mysqli_get_host_info($mysqli));

mysqli_select_db($mysqli, "clinique");

$query = "INSERT INTO `documents`(`NumSecuSociale`, `CHEMIN_Cidenti`, `CHEMIN_Cvitale`, `CHEMIN_Cmutuelle`, `CHEMIN_LivretFamille`) 
VALUES ('$NumSecu','$cheminCI','$cheminMUTU','$cheminCVITALE','DEFAULT')";
mysqli_query($mysqli, $query);

echo ("pièces jointes ajoutées! Retour à la page d'enregistrement d'un patient.<br>");
?>

    <script type="text/javascript">
        var obj = 'window.location.replace("../HTML/panelAdmin.php");';
        setTimeout(obj, 20000);
    </script>