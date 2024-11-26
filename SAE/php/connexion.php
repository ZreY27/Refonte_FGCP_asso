<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/connexion.css">
    <title>Connexion</title>
</head>

<?php require 'header.php'; ?>

<form method="POST" action="connexion.php" id="connexion_form">
    <h2>Se connecter</h2>
    <div class="separation"></div>

    <div class="champs">
        <label for="identifiant" class="label_text">Identifiant</label>
        <input type="text" id="identifiant" name="identifiant" class="input_icone"/>
    </div>

    <div class="champs">
        <label for="mdp" class="label_text">Mot de passe</label>
        <input type="password" id="mdp" name="mdp" class="input_mdp"/>
        <span id="mdp_cache" onclick="Mdp('mdp', 'mdp_cache')"></span>
    </div>

    <input type="submit" name="submit-connexion" class="form-button" value="Valider"/>
</form>

<?php require 'footer.php'; ?>
</html>
