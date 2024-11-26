<!DOCTYPE html>
<HTML lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/don.css">

    <script language="JavaScript" src="../script/script.js" type="module"></script>
    <title>Don</title>
</head>

<?php require 'header.php'; ?>

<div id="faire_don">
    <p>Faire un <span class ="mot_rouge">don</span> à notre association</p>
    <img id="img_don" src="../img/don/don.png">
</div>

<p class="merci">
    Nous vous remercions de tout coeur ! <br>
    Votre don permettra de soutenir la Fédération France Greffes Cœur et/ou Poumons <br>
    dans l’ensemble de ses actions. <br><br>
    <a id="lien1" href="presentation.php"> Cliquez pour en savoir plus sur les objectifs de notre association.</a>
</p>
<h2 class="titre">Comment faire un don?</h2>

<div id="par_carte ">
    <div id="carte">
        <div id="carte_texte">
            <h3>Par carte Bancaire via Paypal</h3>
            <p>Ce moyen de paiement sécurisé en ligne vous permet de faire un don rapidement et facilement.
                <br>Le don par paypal est entièrement sécurisé. Il ne nécessite aucune inscription, juste une carte bancaire.
                Il suffit de cliquer sur la mention « Vous n’avez pas de compte PayPal ? ».
                <br>
                Toutefois, si vous posséder un compte paypal, vous pourrez payer avec celui-ci.</p>
        </div>
        <div id="bloc_img_btn">
            <button>Faire un don par CB via Paypal</button>
            <img id="img_carte" src="../img/don/bancaire.png" alt="cb">
        </div>
    </div>
</div>

<div id="par_cheque">
    <div id="cheque_img">
        <img id="cheque"  src="../img/don/cheque.png" alt="chèque">
    </div>
    <div id="cheque_text">
        <h3>Par chèque</h3>
        <p>Pour faire un don par chèque, remplissez le et libellez à l'ordre de :<br>
            <i>"Fédération France Greffes Cœur et/ou Poumons"</i> et envoyez-le à l'adresse suivante : <br><br>
            <b>Fédération France Greffes Cœur et/ou Poumons<br>
                36 rue Petit,<br>75019 PARIS</b></p>
    </div>
</div>

<div id="par_virement">
    <div id="virement_text">
        <h3>Par virement</h3>
        <p>C'est la solution la plus rapide !<br><br>
            La Fédération France Greffes Cœur et/ou Poumons utilise un compte bancaire.
            Vous aurez toutes nos coordonnées en nous contactant par le biais de notre email:
            <br><br>
            <a id= "lien" href="francegreffecoeurpoumon@gmail.com">francegreffecoeurpoumon@gmail.com</a>
        </p>
    </div>
    <img id="virement"  src="../img/don/virement.png">
</div>

<img id="coeur" src="../img/don/coeur.png">

<!--Ancre -->
<a href="#" class="ancre" title="Retour en haut">
    <img src="../img/ancre.png">
</a>

<?php require 'footer.php' ?>
</html>

