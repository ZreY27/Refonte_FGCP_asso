<?php
if (!session_id()) {
    session_start();

    require '../app/BDUser.php';

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
    <script language="JavaScript" src="assets/script/indicateurs.js" type="module"></script>


    <title>Indicateurs - France Greffe Coeurs et Poumons</title>
</head>

<?php require 'header.php'; ?>


<?php require 'footer.php'; ?>



