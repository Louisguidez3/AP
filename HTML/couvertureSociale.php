<!DOCTYPE HTML>
<meta charset="utf-8">
<link rel="stylesheet" href="../CSS/couvSociale.css">
<html><head>
    
</head>
<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>

<?php

session_start();

    if($_SESSION['connexion']!='secretaire'){
        header('location:../index.html');
        exit;
    }

?>




    <h1>Bienvenue sur la page d'enregistrement d'un patient !</h1>
    <div class="page">
    <div class="contenu">
    
    <br>
    <form action="../PHP/validationCouvSoci.php" method="get">
        Couverture sociale :
        <input class="CouvSoci" type="text" name="CouvSoci" style="width:200px;">    
        <br>
        Numéro de sécurité sociale :
        <input class="NumSecu" type="text" name="NumSecu" style="width:200px;">    
        <br>
        Êtes-vous assuré ?
        <input class="EstAssure" type="checkbox" name="EstAssure" style="width:200px;">    
        <br>
        Êtes-vous ALD (maladie de longue durée)
        <input class="IsALD" type="checkbox" name="IsALD" style="width:200px;">
        <br>
        Nom de la mutuelle
        <input class="NomMutu" type="text" name="NomMutu">
        <br>
        Numéro d'adhérent
        <input class="NumAdh" type="text" name="NumAdh" style="width:200px;">    
        <br>
        Nom de la chambre
        <input class="NomChambre" type="text" name="NomChambre" style="width:200px;">    
        <br>
        <input type="submit" value="envoyer">
</form>

</div>
</div>


</body>
</html>