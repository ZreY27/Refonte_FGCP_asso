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