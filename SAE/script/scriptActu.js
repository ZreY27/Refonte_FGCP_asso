import {article} from './articles.js'

/** --------------Page Actus -----------*/

console.log(article)
const articles = JSON.parse(JSON.stringify(article));
console.log(articles)

const newArticleTemplate = document.querySelector('#article_vide');
const articleContainer = document.querySelector('#listeArticles');
const currentPageButton = document.querySelector('#currentPage');

const articlesParPage = 6; // Nombre d'articles max par page
let currentPage = 1;
let articlesFiltres = articles;

/**
 * Affiche les artciles en fonction du filtre et de la page actuelle
 * @param {string}filtre
 */
function afficherArticles(filtre = 'all') {
    // Filtrer les articles : soit tous, soit par un filtre
    articlesFiltres = articles.filter(article => {
        return filtre === 'all' || article.type === filtre;
    });

    // Réinitialiser la page courante à 1 lors d'un nouveau filtre
    currentPage = 1;
    afficherPage(currentPage);
}

// Ajoute un écouteur d'événements pour le bouton "Tout"
document.getElementById('filtreTout').addEventListener('click', () => afficherArticles('all'));
// Ajoute un écouteur d'événements pour le bouton "Rapport"
document.getElementById('filtreRapport').addEventListener('click', () => afficherArticles('rapport'));
// Ajoute un écouteur d'événements pour le bouton "Actus"
document.getElementById('filtreActu').addEventListener('click', () => afficherArticles('actus'));
// Ajoute un écouteur d'événements pour le bouton "Formation"
document.getElementById('filtreForma').addEventListener('click', () => afficherArticles('formation'));

/**
 * Affiche une page donnée
 * @param page
 */
function afficherPage(page) {
    // Calculer l'index de début et de fin pour afficher les articles
    const startIndex = (page - 1) * articlesParPage;
    const endIndex = startIndex + articlesParPage;

    // Vider le conteneur d'articles avant d'afficher les nouveaux
    articleContainer.innerHTML = '';

    // Obtenir les articles à afficher pour cette page
    const articlesPage = articlesFiltres.slice(startIndex, endIndex);

    // Afficher les articles de la page courante
    articlesPage.forEach(article => {
        const clone = document.importNode(newArticleTemplate.content, true);

        const image = clone.querySelector('.imageActus');
        const titre = clone.querySelector('.titreActus');
        const date = clone.querySelector('.dateActus');
        const lien = clone.querySelector('.lienActus');
        image.src = article.image;
        image.alt = article.titre;
        titre.textContent = article.titre;
        date.textContent = article.date;
        lien.href = article.lien;

        articleContainer.appendChild(clone);
    });

    // Mettre à jour le numéro de la page actuelle
    currentPageButton.textContent = currentPage;

    // Gérer l'affichage des boutons de navigation
    gererNavigation();
}

/**
 * Pour changer de page
 * @param direction
 */
function changerPage(direction) {
    if (direction === 'next' && currentPage * articlesParPage < articlesFiltres.length) {
        currentPage++;
    } else if (direction === 'prev' && currentPage > 1) {
        currentPage--;
    }
    afficherPage(currentPage);
}

// Ajoute un écouteur d'événements pour le bouton "arrowLeft"
document.getElementById('arrowLeft').addEventListener('click', () => changerPage('prev'));
// Ajoute un écouteur d'événements pour le bouton "arrowRight"
document.getElementById('arrowRight').addEventListener('click', () => changerPage('next'));


/**
 * Gérer l'état des boutons de navigation
 */
function gererNavigation() {
    const arrowLeft = document.querySelector('#arrowLeft');
    const arrowRight = document.querySelector('#arrowRight');

    // Désactiver le bouton "Précédent" si on est sur la première page
    if (currentPage === 1) {
        arrowLeft.disabled = true;
    } else {
        arrowLeft.disabled = false;
    }

    // Désactiver le bouton "Suivant" si on est sur la dernière page
    if (currentPage * articlesParPage >= articlesFiltres.length) {
        arrowRight.disabled = true;
    } else {
        arrowRight.disabled = false;
    }
}


/**
 * Par défaut, le filtre est mis sur "Tout" quand la page est chargée
 */
window.onload = function() {
    afficherArticles('all');
};


/**
 * Met en surbrillance les boutons filtres
 * @param {Element}bouton
 */
const filtresDiv = document.querySelector('#filtres');
const buttons = document.querySelectorAll('#filtres button');

function btnClique(bouton) { // Fonction pour mettre en surbrillance le filtre sélectionné
    buttons.forEach(button => {
        if (button === bouton) {
            button.style.backgroundColor = '#f44336';
            button.style.color = 'white';
        } else {
            button.style.backgroundColor = 'white';
            button.style.color = 'black';
        }
    });
}


/**
 * Récupère le bouton sur lequel a cliqué l'utilisateur et appelle la fonction pour changer de couleur
 */
filtresDiv.addEventListener('click', (event) => {
    const boutonActif = event.target;
    btnClique(boutonActif);
});

// Charge les actus dans le caroussel des articles à la une
let articlesTri = articles.sort((a, b) => {
    const dateA = new Date(a.date.split("/").reverse().join("-"));
    const dateB = new Date(b.date.split("/").reverse().join("-"));
    return dateB - dateA;
});
// Sélectionne toutes les divs avec la classe "actusALaUne"
const actusDivs = document.querySelectorAll(".actusALaUne");

// Boucle pour assigner une image de fond et un événement onclick à chaque div
actusDivs.forEach((div, index) => {
    if (articlesTri[index]) { // Vérifie qu'il y a bien un article pour cet index
        div.style.backgroundImage = `url(${articlesTri[index].image})`; // Assigne l'image de fond
        div.onclick = () => {
            window.location.href = articlesTri[index].lien; // Redirige vers le lien quand on clique
        };
    }
});

// Variables globales pour suivre la position actuelle dans le carrousel
let currentIndex = 0;
const container = document.getElementById('container');

// Fonction de défilement pour le carrousel
function scrollCarousel(direction) {
    // Récupère dynamiquement la largeur de `#container`
    const containerWidth = container.offsetWidth;

    // Met à jour l'index en fonction de la direction
    currentIndex = direction === 'next' ? currentIndex + 1 : currentIndex - 1;

    // Limite l'index pour éviter de dépasser les limites
    const maxIndex = container.children.length - 1;
    if (currentIndex < 0) currentIndex = 0;
    if (currentIndex > maxIndex) currentIndex = maxIndex;

    // Calcule et effectue le défilement
    const scrollPosition = currentIndex * containerWidth;
    container.scrollTo({ left: scrollPosition, behavior: 'smooth' });
}

// Ajoute un écouteur d'événements pour le bouton "Précédent"
document.getElementById('btnPrev').addEventListener('click', () => scrollCarousel('prev'));

// Ajoute un écouteur d'événements pour le bouton "Suivant"
document.getElementById('btnNext').addEventListener('click', () => scrollCarousel('next'));


// Écoute l'événement de redimensionnement de la fenêtre
window.addEventListener('resize', () => {
    // Récupère la nouvelle largeur de `#container`
    const containerWidth = container.offsetWidth;

    // Recalcule la position de défilement en fonction de l'index actuel
    const scrollPosition = currentIndex * containerWidth;
    container.scrollTo({ left: scrollPosition });
});