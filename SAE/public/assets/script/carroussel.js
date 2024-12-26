let currentSlide = 0;
/**
 * Permet de changer l'image du carrousel lorsque l'utilisateur clique
 * sur la flèche à gauche ou à droite
 * @param direction
 */
function changeSlide(direction) {
    const slides = document.querySelector('.slides');
    const totalSlides = slides.children.length;

    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

document.querySelector('.prev').addEventListener('click', () => changeSlide(-1));
document.querySelector('.next').addEventListener('click', () => changeSlide(1));
