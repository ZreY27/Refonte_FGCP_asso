<?php
if (!session_id()) {
    session_start();
}

require 'debug.php';
require '../app/Authentification.php';
require '../app/BDDConnect.php';
require '../app/BDUser.php';
require_once '../../vendor/autoload.php';
require_once '../app/msg.php';
messageFlash();

$bdd = new BDDConnect();
$pdo = $bdd->getConnection();
$trousseau = new BDUser($pdo);
$auth = new Authentification($trousseau);

// Vérifiez si l'enquête a déjà été complétée
if ($_SESSION['user']['survey']) {
    $_SESSION['flash']['info'] = "Vous avez déjà complété l'enquête.";
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON envoyées
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (isset($data['answers']) && is_array($data['answers'])) {
        // Traiter les réponses
        $userId = $_SESSION['user']['id'];
        $surveyResponses = new Survey(
            $data['answers'][0]['answer'], //Les questions dont on a besoin pour d3js
            $data['answers'][2]['answer'],
            $data['answers'][6]['answer']
        );

        if ($trousseau->saveEnqueteResponses($surveyResponses, $userId)) {
            $_SESSION['user']['survey'] = true;
            $trousseau->updateSurveyStatus($_SESSION['user']['email'], true);

            $_SESSION['flash']['success'] = "Merci d'avoir complété l'enquête !";
            echo json_encode(['success' => true, 'message' => 'Merci d\'avoir complété l\'enquête !']);
        } else {
            $_SESSION['flash']['error'] = "Erreur lors de l'enregistrement des réponses";
            echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement des réponses']);
        }
    } else {
        $_SESSION['flash']['error'] = "Données invalides";
        echo json_encode(['success' => false, 'message' => 'Données invalides']);
    }
    exit;
}
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


