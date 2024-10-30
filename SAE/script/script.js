/*------------Ancre : apparaît apres avoir scroller ---------*/
const backToTopButton = document.querySelector('.ancre');

// Fonction pour afficher ou masquer la flèche en fonction du scroll
window.onscroll = function() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopButton.style.display = "block"; // si on scroll plus de 200px la fleche apparait
    } else {
        backToTopButton.style.display = "none";
    }
};

// Pour que ca défile fluidement
backToTopButton.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/** --------------Page Actus -----------*/


const articles = [
    {
        id : 1,
        titre : "Rapport médical et scientifique 2023 de l'ABM",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2024/00206_abm_rapport_scientifique_2023.php" ,
        date: "20/09/2024",
        type : "rapport",
        image : "img/actus/1.jpg",
    },
    {
        id : 2,
        titre : "30éme congrès de la FGCP, 5 avril 2024 - Paris",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2024/00116_30eme_congres_FGCP_5_avril_2024.php" ,
        date: "05/04/2024",
        type : "actus",
        image : "img/actus/2.jpg",
    },
    {
        id : 3,
        titre : "La Fédération des Greffés Coeur et/ou Poumons (FGCP), a rejoint l'alliance ESOT* – ETPO*",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2023/00108_la_FGCP_rejoint_European_Society_of_Organ_Transplantation.php" ,
        date: "07/10/2023",
        type : "actus",
        image : "img/actus/3.jpg"
    },
    {
        id : 4,
        titre : "FormationS super Témoin 1&2 + ETP",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2023/00112_formations_pour_2023_2024.php" ,
        date: "16/12/2023",
        type : "formation",
        image : "img/actus/4.jpg"
    },
    {
        id : 5,
        titre : "Covid-19 et personnes immunodéprimées - Le sort des personnes immunodéprimées",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2024/00114_Le_sort_des_personnes_immunodeprimees.php" ,
        date: "07/03/2024",
        type : "actus",
        image : "img/actus/5.jpg"
    },
    {
        id : 6,
        titre : "Aux journées nationales de la FFC",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2022/00095_medaille_thierry_gesson.php" ,
        date: "18/11/2022",
        type : "actus",
        image : "img/actus/6.jpg"
    },
    {
        id : 7,
        titre : "Loréna, 22 ans, a été greffée du coeur à l'âge de 6 ans.",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2022/00087_interview_Lorena_greffee_du_coeur_a_6_ans.php" ,
        date: "20/05/2022",
        type : "actus",
        image : "img/actus/7.jpg"
    },
    {
        id : 8,
        titre : "Résultats de la grande enquête Vivre avec des médicaments anti-rejet",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2021/00071_resultats_enquete-medicaments-anti-rejet.php" ,
        date: "25/11/2021",
        type : "rapport",
        image : "img/actus/8.jpg"
    },
    {
        id : 9,
        titre : "DON D’ORGANES ET DE TISSUS, UN LIEN QUI NOUS UNIT TOUS.",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2021/00060_2021_06_22_don_dorganes.php" ,
        date: "22/06/2021",
        type : "actus",
        image : "img/actus/9.jpg"
    },
    {
        id : 10,
        titre : "LE DON D'ALICE",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2020/00004_florence_boute.php" ,
        date: "27/11/2019",
        type : "actus",
        image : "img/actus/10.jpg"
    },
    {
        id : 11,
        titre : "Transplantation : un coeur transporté en TGV pour être greffé sur un patient",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2020/00044_coeur_TGV_pour_greffe_patient.php" ,
        date: "25/11/2020",
        type : "actus",
        image : "img/actus/11.jpg"
    },
    {
        id : 12,
        titre : "17 octobre journée mondiale du don d'organes",
        lien: "http://www.france-coeur-poumon.asso.fr/news/2024/00207_17_octobre_journee_mondiale_don_organes.php" ,
        date: "14/10/2024",
        type : "actus",
        image : "img/actus/12.jpg"
    },

]

const newArticleTemplate = document.querySelector('#article_vide');
const articleContainer = document.querySelector('#listeArticles');
const currentPageButton = document.querySelector('#currentPage');

const articlesParPage = 6; // Nombre d'articles max par page
let currentPage = 1;
let articlesFiltres = articles;

// Fonction pour afficher les articles en fonction du filtre et de la page actuelle
function afficherArticles(filtre = 'all') {
    // Filtrer les articles : soit tous, soit par un filtre
    articlesFiltres = articles.filter(article => {
        return filtre === 'all' || article.type === filtre;
    });

    // Réinitialiser la page courante à 1 lors d'un nouveau filtre
    currentPage = 1;
    afficherPage(currentPage);
}

// Fonction pour afficher une page donnée
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

// Fonction pour changer de page
function changerPage(direction) {
    if (direction === 'next' && currentPage * articlesParPage < articlesFiltres.length) {
        currentPage++;
    } else if (direction === 'prev' && currentPage > 1) {
        currentPage--;
    }
    afficherPage(currentPage);
}

// Fonction pour gérer l'état des boutons de navigation
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

// Afficher tous les articles par défaut quand la page est chargée
window.onload = function() {
    afficherArticles('all');
};


// Met en surbrillance les boutons filtres
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

// Récupère le bouton sur lequel a cliqué l'utilisateur et appelle la fonction pour changer de couleur
filtresDiv.addEventListener('click', (event) => {
    const boutonActif = event.target;
    btnClique(boutonActif);
});


/*------------ Menu format mobile : apparaît et disparaît quand on clique sur l'image menu ---------*/
const nav = document.querySelector('#navVersionMobile');
const menuButton = document.getElementById('menuMobile');

menuButton.addEventListener('click', function() {
    if (nav.style.display === 'none' || nav.style.display === '') {
        nav.style.display = 'block';
        setTimeout(() => {
            nav.style.maxHeight = '200px';        }, 0);
    }
    else {
        nav.style.maxHeight = '0'; // Ferme le menu
        setTimeout(() => {
            nav.style.display = 'none';
        }, 500);
    }
});



/*------------ Footer format PC petit écran : change comment est écrit l'adresse ---------*/
// vérifie la taille de l'écran
function verifierTailleEcran() {
    const mediaQuery = window.matchMedia("(min-width: 768px) and (max-width: 992px)");
    const adr = document.getElementById("adresse");

    if (mediaQuery.matches) {
        // Si l'écran est entre 768px et 992px, on change l'adresse
        adr.innerHTML = "<img src=\"img/footer/contact/adresse.png\" alt=\"Adresse\" class=\"image\">" +
            "Fédération France Greffes<br>Cœur et/ou Poumons<br>36 rue Petit, 75019 PARIS";
    }
    else{ // Sinon on garde la même
        adr.innerHTML = "<img src=\"img/footer/contact/adresse.png\" alt=\"Adresse\" class=\"image\">" +
            "Fédération France Greffes Cœur<br>et/ou Poumons<br>36 rue Petit, 75019 PARIS";
    }
}

// Quand on modifie la taille de l'écran, ça appelle la fonction
window.addEventListener('resize', verifierTailleEcran);

// Charge les actus dans le caroussel des articles à la une
let articlesTri = articles.sort((a, b) => {
    const dateA = new Date(a.date.split("/").reverse().join("-"));
    const dateB = new Date(b.date.split("/").reverse().join("-"));
    return dateB - dateA;
});

