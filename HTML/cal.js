// Sélectionner l'élément qui contiendra les cellules du calendrier
const calendarBody = document.getElementById('calendar-body');

// Sélectionner les éléments de la modal
const eventModal = document.getElementById('event-modal');
const eventInput = document.getElementById('event-input');
const eventSubmit = document.getElementById('event-submit');
const closeModal = document.querySelector('.close');

// Ouvrir la modal et ajouter l'événement
function openModal(cell) {
    eventModal.style.display = 'block';
    eventSubmit.addEventListener('click', () => {
        const event = eventInput.value;
        if (event) {
            cell.innerHTML += '<br>' + event;
        }
        eventInput.value = '';
        eventModal.style.display = 'none';
    });
}

// Fermer la modal
closeModal.addEventListener('click', () => {
    eventModal.style.display = 'none';
});

// Afficher le mois courant
const today = new Date();
let year = today.getFullYear();
let month = today.getMonth();

showCalendar(year, month);

// Afficher le calendrier pour un mois et une année donnés
function showCalendar(year, month) {
    // Vider le contenu de l'élément calendarBody avant de remplir le calendrier avec les nouvelles dates
    calendarBody.innerHTML = '';

    // Obtenir le premier jour du mois
    const firstDay = new Date(year, month, 1).getDay();

    // Obtenir le nombre de jours dans le mois
    const lastDay = new Date(year, month + 1, 0).getDate();

    // Remplir le calendrier avec les dates
    let date = 1;
    for (let i = 0; i < 6; i++) {
        const row = document.createElement('tr');
        for (let j = 0; j < 7; j++) {
            const cell = document.createElement('td');
            if (i === 0 && j < firstDay) {
                // Ajouter des cellules vides pour les jours avant le premier du mois
                cell.classList.add('empty');
            } else if (date > lastDay) {
                // Ajouter des cellules vides pour les jours après le dernier du mois
                cell.classList.add('empty');
            } else {
                cell.textContent = date;
                date++;
            }
            cell.addEventListener('click', () => openModal(cell));
            row.appendChild(cell);
        }
        calendarBody.appendChild(row);
    }
}
