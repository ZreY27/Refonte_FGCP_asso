<?php

require 'debug.php';
require_once '../../vendor/autoload.php';
require '../app/BDDConnect.php';
require '../app/BDUser.php';
require '../app/Authentification.php';

$bdd = new BDDConnect();

$pdo = $bdd->getConnection();
$trousseau = new BDUser($pdo);
$auth = new Authentification($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $retour = $auth->register($_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);
        $message = "Vous êtes enregistré. Vous pouvez vous authentifier";
        $code = "success";
    }
    catch(Exception $e) {
        $retour = false;
        $message = "Enregistrement impossible : " . $e->getMessage();
        $code = "warning";
    }


    $_SESSION['flash'][$code] = $message;

    if ($retour) {
        $direction = $_SERVER['HTTP_ORIGIN'] ?? 'http://localhost';
        header("Location: $direction/index.php");
        exit;
    } else {
        echo $message;
    }

}


//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $user['nom'] = $_POST['nom'];
//    $user['prenom'] = $_POST['prenom'];
//    $user['email'] = $_POST['email'];
//    $user['password'] = $_POST['password'];
//    $user['civilite'] = $_POST['civilite'];
//
//    // Vérification de l'adresse e-mail
//    if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
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