<!DOCTYPE HTML>
<meta charset="utf-8">
<link rel="stylesheet" href="style_connexion.css">
<html><head>
    
</head>
<body>
<div class="deconnexion"><a href="../PHP/logout.php">Se déconnecter</a></div>
<?php

session_start();

if($_SESSION['connexion'] != 'admin'){
    header('location:../index.html');
    exit;
}

?>

    <h1>Bienvenue sur le panneau administrateur !</h1>


<div clalss="general">

    <div class="contenu">
    
    <br>
    <h2>AJOUT D'UN PRESONNEL</h2>
    <form method="post" action="../PHP/validAdminPersonnel.php" >
        Nom du personnel :
        <input class="nomPerso" type="text" name="nomPerso" style="width:200px;">    
        <br>
        Prénom du personnel :
        <input class="PrenPerso" type="text" name="PrenPerso" style="width:200px;">   
        <br>
        Nom du service :
        <input class="NomServ" type="text" name="NomServ" style="width:200px;">   
        <br>
        Identitifiant de connexion :
        <input class="IDcon" type="text" name="IDcon" style="width:200px;">   
        <br>
        Mot de passe de connexion :
        <input class="MDPcon" type="text" name="MDPcon" style="width:200px;">   
        <br>
        <br>
        <input class="envoyer" type="submit">
</form>

<h2>AJOUT D'UN SERVICE</h2>
    <form method="post" action="../PHP/validAdminService.php" >
        Nom du service :
        <input class="nomService" type="text" name="nomService" style="width:200px;">    
        <br>
        <br>
        <input class="envoyer" type="submit">
</form>

</div>


<div class="contenu2">
    
    <br>
    <h2>Modification ou suppression d'une hospitalisation</h2>
    <form method="post" action="../PHP/validModifHospi.php" >
        ID d'admission :
        <input class="IDadmiss" type="text" name="IDadmiss" style="width:200px;">    
        <br>
      
        
        <input class="envoyer" type="submit">
</form>

<h2>SUPPRIMER UN PATIENT</h2>
    <form method="post" action="../PHP/validAdminPatient.php" >
        Numéro de sécurité sociale du patient :
        <input class="numSecuSupp" type="text" name="numSecuSupp" style="width:200px;">    
        <br>
        <br>
        <input class="envoyer" type="submit">
</form>


</div>

</div>










</body>
</html>