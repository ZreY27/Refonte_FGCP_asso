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


/*------------ Menu format mobile : apparaît et disparaît quand on clique sur l'image menu ---------*/
const nav = document.querySelector('#navVersionMobile');
const menuButton = document.getElementById('menuMobile');

menuButton.addEventListener('click', function() {
    if (nav.style.display === 'none' || nav.style.display === '') {
        nav.style.display = 'block';
        setTimeout(() => {
            nav.style.maxHeight = '200px';
        }, 0);
    } else {
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