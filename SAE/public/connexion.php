<?php
if(!session_id())
    session_start();

require 'debug.php';
require '../app/Authentification.php';
require '../app/BDDConnect.php';
require '../app/BDUser.php';
require_once '../../vendor/autoload.php';

$bdd = new BDDConnect();

$pdo = $bdd->getConnection();
$trousseau = new BDUser($pdo);
$auth = new Authentification($trousseau);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $retour = $auth->authenticate($_POST['username'], $_POST['password']);
        $message = "Authentification réussie";
        $code = "success";

    } catch (Exception $e) {
        $retour = false;
        $message = "Authentification impossible : " . $e->getMessage();
        $code = "warning";
    }

    $_SESSION['flash'][$code] = $message;

    $direction = $_SERVER['HTTP_ORIGIN'];
    if($code === "success") {
        header("Location: $direction/index.php");
    }
    else{
        header("Location: $direction/formulaire.php");
    }
}

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $user['identifiant'] = $_POST['username'];
//    $user['password'] = $_POST['password'];
//
//    // Vérification de l'adresse e-mail
//    if (filter_var($user['identifiant'], FILTER_VALIDATE_EMAIL) === false) {
//        echo "L'adresse e-mail n'est pas valide.";
//        exit; // Stoppe l'exécution si l'email est invalide
//    }
//}
//
//if ($_SERVER["REQUEST_METHOD"] === 'POST') {
//    debugForm($_POST, "post");
//} elseif ($_SERVER["REQUEST_METHOD"] === 'GET' && !empty($_SERVER['QUERY_STRING'])) {
//    debugForm($_GET, "get");
//} else {
//    echo "Aucune donnée reçue." . PHP_EOL . "Désolé.";
//}


