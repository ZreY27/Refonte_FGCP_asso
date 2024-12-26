<?php

require 'debug.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user['identifiant'] = $_POST['username'];
    $user['password'] = $_POST['password'];

    // Vérification de l'adresse e-mail
    if (filter_var($user['identifiant'], FILTER_VALIDATE_EMAIL) === false) {
        echo "L'adresse e-mail n'est pas valide.";
        exit; // Stoppe l'exécution si l'email est invalide
    }
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    debugForm($_POST, "post");
} elseif ($_SERVER["REQUEST_METHOD"] === 'GET' && !empty($_SERVER['QUERY_STRING'])) {
    debugForm($_GET, "get");
} else {
    echo "Aucune donnée reçue." . PHP_EOL . "Désolé.";
}


