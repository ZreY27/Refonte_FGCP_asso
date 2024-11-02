/**
 * Affiche ou non la flèche d'ancrage en fonction du scroll
 */
const backToTopButton = document.querySelector('.ancre');
window.onscroll = function() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopButton.style.display = "block"; // si on scroll plus de 200px la fleche apparait
    } else {
        backToTopButton.style.display = "none";
    }
};

/**
 * Pour que la remontée en haut de page soit fluide
 */
backToTopButton.addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


/**
 * Menu format mobile : permet de faire apparaître ou disparaître le menu
 * lorsqu'on clique sur le hamburger
 */
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