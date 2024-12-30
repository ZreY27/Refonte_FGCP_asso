<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/accueil.css">
    <script language="JavaScript" src="assets/script/script.js" type="module"></script>
    <script src="assets/script/carroussel.js" type="module"></script>
    <title>Accueil</title>
</head>


<?php
require 'header.php';       //barre de nav des pages
?>


        <div class="carrousel">
            <div class="slides">
                <img src="assets/img/accueil/image-carrousel1.jpg" alt="Image 1">
                <img src="assets/img/accueil/image-carrousel2.jpg" alt="Image 2">
                <img src="assets/img/accueil/image-carrousel3.jpg" alt="Image 3">
            </div>
            <button class="prev" >&#10094;</button>
            <button class="next" >&#10095;</button>
        </div>

        <h3 class="titre-don">" Offrez la vie, devenez donneur aujourd'hui "</h3>
        <div class="button-container">
            <a href="don.php"><button class="custom-button">
                <b>FAIRE UN DON</b>
            </button></a>
        </div>

        <div class="zoneText">
            <h2>Pourquoi donner ?</h2>
            <div class="aligner">
                <div class=" AlignText">
                    <h3>Bénéfice du don d'organe</h3>
                    <p>Chaque année, le don d’organe permet à des milliers de patients de recevoir des greffes vitales. En France, plus de 6 000 greffes sont réalisées chaque année, mais environ 24 000 personnes restent en attente.

                    Un seul donneur peut sauver jusqu'à 8 vies, en offrant ses organes (cœur, poumons, reins). Malgré ces chiffres, le manque de donneurs reste un défi crucial.

Le don d'organes est un geste solidaire qui peut transformer des vies
                    et combler un besoin médical essentiel.
                    </p>
                </div>
                <div class="AlignText">
                    <h3>Type de don</h3>
                    <p>Le don après décès, les organes d’une personne en état de mort cérébrale sont prélevés pour être transplantés chez des patients.

                    Plus rarement, le don vivant est possible pour certains cas spécifiques, comme le don de lobes pulmonaires.

                    Enfin, les dons financiers permettent de soutenir les associations qui
                    accompagnent les patients et financent la recherche médicale.
                    </p>
                </div>
            </div>
        </div>
        <div class="stats">
            <div class="stat">
                <h1> 5634</h1>
                <p>
                    Avec <b>5 634</b> greffes d'organes réalisées, en hausse de 2,5 % par rapport à 2022,
                    dont 577 greffes issues de donneurs vivants (+ 8,3 %), l’année 2023 témoigne de l’engagement
</p>
            </div>
            <div class="stat">
                <h1> 75% et 60% </h1>
                <p>
En France, le taux de survie à <b>5 ans</b> après une greffe de cœur est d'environ <b>75%</b>,
                    tandis que pour une greffe de poumons, il est d'environ <b>60%</b>.
                    Ces chiffres soulignent l'efficacité des greffes en tant que traitement pour des maladies cardiaques
                    et pulmonaires graves, offrant aux patients une nouvelle chance de vie.
                </p>
            </div>

        </div>

        <div class="ruban">
            <h4>Un symbole commun pour les associations</h4>
            <img src="assets/img/accueil/ruban.png" alt="ruban vert">
            <p>Ce symbole rappelle que nous sommes tous donneurs d’organes et la gratitude de la société à l’égard des donneurs.</p>
        </div>

        <!--Ancre -->
        <a href="#" class="ancre" title="Retour en haut">
            <img src="assets/img/ancre.png">
        </a>

<?php require 'footer.php'; //appelle le fichier contenant le footer
?>
</html>