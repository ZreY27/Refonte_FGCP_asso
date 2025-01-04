<?php
if (!session_id()) {
    session_start();
}
require_once '../app/msg.php';
messageFlash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/enquete.css">
    <script language="JavaScript" src="assets/script/enquete.js" type="module"></script>


    <title>Questionnaire - France Greffe Coeurs et Poumons</title>
</head>


<?php require 'header.php'; ?>

<main>
    <div class="container">
        <div class="header">
            <h1>Enquête sur nos donneurs</h1>
        </div>


        <div class="question-container" id="questionContainer">
            <!-- Questions insérées ici -->
        </div>
        <div class="navigation">
            <button class="nav-btn" id="prevBtn" onclick="previousQuestion()">← Précédent</button>
            <button class="nav-btn" id="nextBtn" onclick="nextQuestion()" disabled>Suivant →</button>
        </div>
        <div class="progress-bar">
            <div class="progress" id="progress"></div>
        </div>
    </div>
    <script>

    </script>

</main>

<?php
require 'footer.php'; ?>
</html>


