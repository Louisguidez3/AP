<!DOCTYPE HTML>
<meta charset="utf-8">
<link rel="stylesheet" href="../CSS/enregistrPatient.css">
<html>

<head>

</head>

<body>

<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
    <?php
    session_start();

    if($_SESSION['connexion']!='secretaire'){
        header('location:../index.html');
        exit;
    }


    $_SESSION['prenom'] = $_GET['prenom'];
    $_SESSION['nom'] = $_GET['nom'];
    $_SESSION['adresse'] = $_GET['adresse'];
    $_SESSION['numtel'] = $_GET['numtel'];


    $_SESSION['prenomprev'] = $_GET['prenomprev'];
    $_SESSION['nomprev'] = $_GET['nomprev'];
    $_SESSION['adresseprev'] = $_GET['adresseprev'];
    $_SESSION['numtelprev'] = $_GET['numtelprev'];

    ?>


    <h1>Bienvenue sur la page d'enregistrement d'un patient !</h1>
    <div class="page">
    <div class="contenu">

        <br>
        <form action="../PHP/validationClient.php" method="get">


            <div class="box">
                <input class="genre" type="text" name="genre" required="required">
                <label>Civilité :</label>
            </div>

            <br>

            <div class="box">
                <input class="nom" type="text" name="nom" required="required">
                <label> Nom :</label>
            </div>

            <br>

            <div class="box">
                <input class="prenom" type="text" name="prenom" required="required">
                <label>Prenom :</label>
            </div>

            <br>


            <div class="box">
                <input class="numSociale" type="text" name="numSociale" required="required">
                <label> Numéro de sécurité sociale :</label>
            </div>
            <br>


            <div class="box">

                <input class="datenaiss" type="date" name="dateNaiss" required="required" style="height: 70px;">
                <label>Date de naissance :</label>
            </div>
            <br>


            <div class="box">

                <input class="adresse" type="text" name="adresse" required="required">
                <label>Adresse :</label>
            </div>

            <br>


            <div class="box">
                <input class="ville" type="text" name="ville" required="required">
                <label>Ville :</label>
            </div>

            <br>


            <div class="box">
                <input class="codep" type="text" name="codep" required="required">
                <label>Code postal :</label>
            </div>


            <br>


            <div class="box">

                <input class="adressemail" type="text" name="mail" required="required">
                <label>mail :</label>
            </div>

            <br>


            <div class="box">

                <input class="numtel" type="text" name="numtel" required="required">
                <label>Numéro de téléphone :</label>
            </div>


            <input class="envoyer" type="submit" value="envoyer">
        </form>

    </div>
    </div>
</body>

</html>