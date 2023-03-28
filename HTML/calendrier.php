<!DOCTYPE html>
<html>
<head>
    <title>Calendrier avec flèches pour changer de mois</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="calendrierCSS.css">
    <style type="text/css">
        .calendar {
            position: absolute;
            top: 25%;
            left:  30%;
            width: 600px;
            padding: 10px;
            border: 5px solid #000000;
            font-family: Arial, sans-serif;
        }
        .calendar h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
        }
        .calendar table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .calendar table th,
        .calendar table td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }
        .calendar table th {
            background-color: #eee;
            font-weight: bold;
        }
        .calendar .prev,
        .calendar .next {
            cursor: pointer;
            display: inline-block;
            padding: 5px;
            background-color: #eee;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<img id="logo" src="../LPF.png">
<h1 id="date"></h1>

<script>
    const dateElement = document.getElementById("date");
    const date = new Date();

    // Formater la date en format JJ/MM/AAAA
    const formattedDate = `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;

    // Placer la date formatée dans l'élément h1
    dateElement.innerText = formattedDate;
</script>
<?php
/*Activation des erreurs msqli */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'dev', 'sio', 'clinique');

/*définir le jeu de caractères (syntaxes) après la connextion*/
mysqli_set_charset($mysqli, 'utf8mb4');
//printf("sucess... %s\n", mysqli_get_host_info($mysqli));

mysqli_select_db($mysqli, "clinique");

// Effectuer la requête
$query = "SELECT patients.NumSecuSociale, personnel.PrenomMedecin, personnel.NomMedecin, patients.NomNaiss, patients.Prenom, hospitalisations.DateAdmi, hospitalisations.Heure_inter FROM personnel INNER JOIN hospitalisations
ON personnel.ID_Personnel = hospitalisations.ID_medecin
INNER JOIN patients ON hospitalisations.NumSecuSociale = patients.NumSecuSociale ;";
$result = mysqli_query($mysqli, $query);


$dates = array();

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    array_push($dates, $row["DateAdmi"]);
}

$json = json_encode($dates);

?>
<div class="retour"><a href="stats.php">Retour aux stats</a></div>
<div class="calendar"></div>
<!-- Le modal -->
<div id="myModal" class="modal hidden">
    <!-- Contenu du modal -->
    <div class="modal-content">
        <p></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        var currentDate = new Date();

        showCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1);

        $('.calendar').on('click', '.prev', function(){
            var year = parseInt($('.calendar').attr('data-year'));
            var month = parseInt($('.calendar').attr('data-month')) - 1;
            if (month == 0) {
                year--;
                month = 12;
            }
            showCalendar(year, month);
        });

        $('.calendar').on('click', '.next', function(){
            var year = parseInt($('.calendar').attr('data-year'));
            var month = parseInt($('.calendar').attr('data-month')) + 1;
            if (month == 13) {
                year++;
                month = 1;
            }
            showCalendar(year, month);
        });
        $("td.pread").on("click", function() {
            // Votre code à exécuter lors du clic sur une cellule "pread"
            var id = this.id;
            console.log("ID de la cellule cliquée : " + id);

            let donnees = new FormData();
            donnees.append("id", id);
            let url = 'cal_ajax.php';

            $.ajax({
                data: donnees,
                type: "POST",
                datatype: 'string',
                processData: false,
                contentType: false,
                timeout: 10000,
                url: url,
                success: function (donnees) {
                    // Affichage de la date dans le modal
                    $('#myModal .modal-content').append(donnees);

                    // Affichage du modal
                    openModal();
                },
                error: function() {
                    alert('Une erreur est survenue lors de la récupération de la date.');
                }
            });


        });
        // Sélectionner le modal
        var modal = document.getElementById("myModal");

// Ajouter un gestionnaire d'événement pour le clic sur l'objet document
        document.addEventListener("click", function(event) {
            // Vérifier si le clic est en dehors du modal
            if (event.target === modal) {
                // Cacher le modal en changeant la propriété "display" du style CSS
                document.getElementById("myModal").classList.add('hidden');
                $('#myModal .modal-content').empty();

            }
        });
    });

    function showCalendar(year, month) {
        var tabdates = JSON.parse('<?php echo $json; ?>');
        console.log(tabdates);

        var today = new Date();
        var todayDate = today.getDate();
        console.log(todayDate);
        var todayMonth = today.getMonth() + 1;
        console.log(todayMonth);
        var todayYear = today.getFullYear();
        console.log(todayYear);
        var firstDay = new Date(year, month - 1, 1).getDay();
        var lastDate = new Date(year, month, 0).getDate();
        var tableHtml = '<h2>' + getMonthName(month - 1) + ' ' + year + '</h2>';
        tableHtml += '<table>';
        tableHtml += '<tr><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr>';
        var date = 1;
        for (var i = 0; i < 6; i++) {
            tableHtml += '<tr>';
            for (var j = 0; j < 7; j++) {
                if ((i == 0 && j < firstDay) || date > lastDate) {
                    tableHtml += '<td></td>';
                } else {
                    var cellClass = '';
                    var cellID = '';
                    for (var h = 0; h < tabdates.length; h++) {
                        var dateStr = tabdates[h];
                        var dateObj = new Date(dateStr);

                        var jour = dateObj.getDate();
                        var mois = dateObj.getMonth() + 1;
                        var annee = dateObj.getFullYear();


                        if (date === jour && month === mois && year === annee) {
                            cellClass = 'pread';
                        }
                    }

                    tableHtml += '<td id="'+ year + '-' + month + '-' + date + '" class="' + cellClass + '">' + date + '</td>';
                    date++;
                }
            }
            tableHtml += '</tr>';
            if (date > lastDate) {
                break;
            }
        }
        tableHtml += '</table>';
        tableHtml += '<div class="nav">';
        tableHtml += '<span class="prev">&lt;</span>';
        tableHtml += '<span class="next">&gt;</span>';
        tableHtml += '</div>';
        $('.calendar').html(tableHtml);
        $('.calendar').attr('data-year', year);
        $('.calendar').attr('data-month', month);
    }

    function getMonthName(month) {
        var monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        return monthNames[month];
    }

    // Fonction pour ouvrir le modal
    function openModal() {
        console.log("test2");
        // Code pour afficher le modal
        document.getElementById("myModal").classList.remove('hidden');

    }
</script>
</body>
</html>

