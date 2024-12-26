<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="stylesheet" href="../assets/style/actus.css">
    <script language="JavaScript" src="../assets/script/script.js" type="module"></script>
    <script language="JavaScript" src="../assets/script/scriptActu.js" type="module"></script>

    <title>Actualités</title>
</head>

<?php require 'header.php'; ?>


<main>
    <section id="carroussel">
        <div id = "divALaUne">
            <h3 id = "texteALaUne">
                À LA UNE
            </h3>
        </div>
        <div id = "container">
            <div id = "actus1" class = "actusALaUne">
                <div id="titreActusALaUne">
                    <a class="lienActus"> <p class="titreActusALaUne"></p> </a>
                    <p class="dateActusALaUne"></p>
                </div>
            </div>
            <div id = "actus2" class = "actusALaUne"></div>
            <div id = "actus3" class = "actusALaUne"></div>
            <div id = "actus4" class = "actusALaUne"></div>
            <div id = "actus5" class = "actusALaUne"></div>
            <div id = "actus6" class = "actusALaUne"></div>
        </div>

        <button type="button" id="btnPrev" class="boutonALaUne"> < </button>
        <button type="button" id="btnNext" class="boutonALaUne"> > </button>

    </section>

    <div id="navigActu">
        <div id="topNavigActu">
            <div id="filtres">
                <button type="button" class="filtre" id="filtreTout">Tout</button>
                <button type="button" class="filtre" id="filtreRapport">Rapport</button>
                <button type="button" class="filtre" id="filtreActu">Actu</button>
                <button type="button" class="filtre" id="filtreForma">Formation</button>
            </div>
        </div>

        <div id="midNavigActu">
            <!-- template des articles -->
            <template id="article_vide">
                <div class ="actus">
                    <div id="imgActus">
                        <img class="imageActus">
                    </div>
                    <div id="titreActus">
                        <a class="lienActus"> <p class="titreActus"></p> </a>
                        <p class="dateActus"></p>
                    </div>
                </div>
            </template>

            <section id="listeArticles">
                <!-- les articles apparaissent ici-->
            </section>
        </div>

        <div id="bottomNavigActu">
            <div id="navigPages">
                <button type="button" id="arrowLeft" onclick="changerPage('prev')"> << </button>
                <button type="button" id="currentPage"> 1 </button>
                <button type="button" id="arrowRight" onclick="changerPage('next')"> >> </button>
            </div>
        </div>
    </div>
</main>



<!--Ancre ---->
<a href="#" class="ancre" title="Retour en haut">
    <img src="../assets/img/ancre.png">
</a>

<?php require 'footer.php'; ?>
</html>

