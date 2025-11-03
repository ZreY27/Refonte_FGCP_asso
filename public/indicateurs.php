<?php
if (!session_id()) {
    session_start();

    require '../app/BDDConnect.php';

    // on récupère les données de la bdd
    $db = new BDDConnect();
    $resultQ1 = $db->getSurveyAnswersByQuestion('q1');
    $resultQ2 = $db->getSurveyAnswersByQuestion('q2');
    $resultQ3 = $db->getSurveyAnswersByQuestion('q3');

}?>
<script>
    var surveyData = {
        q1: <?php echo $resultQ1; ?>,
        q2: <?php echo $resultQ2; ?>,
        q3: <?php echo $resultQ3; ?>
    };
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/indicateurs.css">
    <script language="JavaScript" src="assets/script/indicateurs.js" type="module"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>


    <title>Indicateurs - France Greffe Coeurs et Poumons</title>
</head>

<?php require 'header.php'; ?>
<div id="resultats">
    <h2 class="h2Indi"> Qui a répondu à l'enquête? <br></h2>
        <h3 class="h3Indi">Visualisation du statut des utilisateurs ayant répondu à l'enquête</h3>
    <div id="pie-chart"></div>
        <h2 class="h2Indi"> Besoin de soutien : <br></h2>
        <h3 class="h3Indi">Comparaison des différents types de soutien que les utilisateurs aimerait reçevoir de la part de l'association</h3>
    <div id="bar-chart"></div>
        <h2 class="h2Indi">Qualité de vie : <br></h2>
        <h3 class="h3Indi">Représentation détaillée en chiffre des personnes ressentant des limitations physiques dans la vie quotidiennes </h3>
    <table id="response-table">
    <thead>
    <tr>
        <th>Réponse</th>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>
</div>
<?php require 'footer.php'; ?>



