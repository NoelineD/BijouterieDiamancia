// const filters = document.querySelectorAll('.filter');
// const cards = document.querySelectorAll('.card');

// // Fonction pour afficher ou cacher une carte
// function toggleCard(card, show) {
//   card.style.display = show ? 'block' : 'none';
// }

// // Fonction pour filtrer les cartes
// function filterCards() {
//   const selectedFilters = Array.from(filters).filter(filter => filter.checked).map(filter => filter.value);

//   // Si aucun filtre n'est sélectionné, afficher toutes les cartes
//   if (selectedFilters.length === 0) {
//     cards.forEach(card => toggleCard(card, true));
//     return;
//   }

//   // Sinon, filtrer les cartes en fonction des filtres sélectionnés
//   cards.forEach(card => {
//     const categories = card.dataset.categories.split(',');
//     const show = selectedFilters.some(filter => categories.includes(filter));
//     toggleCard(card, show);
//   });
// }

// // Ajouter un écouteur d'événements à tous les filtres
// filters.forEach(filter => filter.addEventListener('change', filterCards));

// // Au chargement de la page, afficher toutes les cartes
// window.addEventListener('load', () => {
//   cards.forEach(card => toggleCard(card, true));
// });

// Récupération des valeurs des listes déroulantes
const stone = document.getElementById('filterStone').value;
const metal = document.getElementById('filterMetal').value;
const color = document.getElementById('filterColor').value;
const price = document.getElementById('filterPrice').value;

// Envoi de la requête AJAX avec les valeurs sélectionnées
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    const filteredRings = JSON.parse(this.responseText);
    // Boucle pour générer les cartes des bijoux filtrés
    // ...
  }
};
xhr.open('GET', 'index.php?action=listofrings&stone=' + stone + '&metal=' + metal + '&color=' + color + '&price=' + price, true);
xhr.send();