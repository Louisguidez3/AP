<?php

    $date = $_POST['id'];

    $date_arr = explode("-", $date);
    $year = $date_arr[0];
    $month = $date_arr[1];
    $day = $date_arr[2];

    if ($month < 10) {
        $month = "0" . $month;
    }

    if ($day < 10) {
        $day = "0" . $day;
    }

    $formatted_date = $year . "-" . $month . "-" . $day;

    /*Activation des erreurs msqli */
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost', 'dev', 'sio', 'clinique');

    /*définir le jeu de caractères (syntaxes) après la connextion*/
    mysqli_set_charset($mysqli, 'utf8mb4');
    //printf("sucess... %s\n", mysqli_get_host_info($mysqli));

    mysqli_select_db($mysqli, "clinique");

    // Effectuer la requête
    $ligne = "SELECT patients.NumSecuSociale, personnel.PrenomMedecin, personnel.NomMedecin, patients.NomNaiss, patients.Prenom, hospitalisations.DateAdmi, hospitalisations.Heure_inter FROM personnel INNER JOIN hospitalisations
    ON personnel.ID_Personnel = hospitalisations.ID_medecin
    INNER JOIN patients ON hospitalisations.NumSecuSociale = patients.NumSecuSociale WHERE hospitalisations.DateAdmi = '$formatted_date';";
    $resultat = mysqli_query($mysqli, $ligne);

    // Afficher le tableau HTML
    echo "<table id='planning'>";
    echo "<tr><th>NumSecu</th><th>Nom</th><th>Prenom</th><th>NomMedecin</th><th>PrenomMedecin</th><th>Date</th><th>Heure</th></tr>";
    while ($row = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["NumSecuSociale"] . "</td>";
        echo "<td>" . $row["NomNaiss"] . "</td>";
        echo "<td>" . $row["Prenom"] . "</td>";
        echo "<td>" . $row["NomMedecin"] . "</td>";
        echo "<td>" . $row["PrenomMedecin"] . "</td>";
        echo "<td>" . $row["DateAdmi"] . "</td>";
        echo "<td>" . $row["Heure_inter"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

?>