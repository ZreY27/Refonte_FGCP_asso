<?php
if (!session_id()) {
    session_start();
}

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
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    try {
        // Authentification
        if ($auth->authenticate($username, $password)) {
            // Récupérer les données utilisateur
            $utilisateur = $auth->getUser($username);

            if ($utilisateur) {
                // Stocker les informations utilisateur dans la session
                $_SESSION['user'] = [
                    'nom' => $utilisateur->getNom(),
                    'prenom' => $utilisateur->getPrenom(),
                    'email' => $utilisateur->getMail(),
                ];
                $_SESSION['flash']['success'] = "Connexion réussie. Bienvenue, " . htmlspecialchars($utilisateur->getPrenom()) . " !";

                // Redirection vers la page formulaire
                header('Location: formulaire.php');
                exit;
            } else {
                throw new Exception("Impossible de récupérer les informations de l'utilisateur.");
            }
        } else {
            throw new Exception("Nom d'utilisateur ou mot de passe incorrect.");
        }
    } catch (Exception $e) {
        // En cas d'erreur, afficher un message
        $_SESSION['flash']['error'] = "Authentification impossible : " . $e->getMessage();

        // Redirection vers le formulaire de connexion
        header('Location: formulaire.php');
        exit;
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


