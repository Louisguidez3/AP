<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/documents.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php
session_start();

if(isset($_SESSION['erreurType'])){
    echo('Veuillez choisir le bon type de fichier');
}
if(isset($_SESSION['erreurTaille'])){
    echo('Fichier trop volumineux');
}

    if($_SESSION['connexion']!='secretaire'){
        header('location:../index.html');
        exit;
    }
?>
<h1>Insertion des pièces jointes</h1>
    <div class="page">
    <div class="contenu">
    Type accepté : PNG, JPG, PDF. <br>
    Taille limite : 15Mo.
    <form action="fichiers.php" method="post" enctype="multipart/form-data">
        Carte d'identité
        <input type="file" name="CI" id="CI" class="CI" required> 

        Carte de mutuelle
        <input type="file" name="mutuelle" id="mutuelle" class="mutuelle" required>

        Carte vitale
        <input type="file" name="cVitale" id="cVitale" class="cVitale" required>

        Livret de famille
        <input type="file" name="livrfam" id="livrfam" class="livrfam">

        <input type="submit">
    </form>
    </div>
    </div>
</body>
</html>