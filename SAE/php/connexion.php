<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/connexion.css">
    <script language="JavaScript" src="../script/formulaire.js" type="module"></script>

    <title>Connexion</title>
</head>

<?php require 'header.php'; ?>


<main>
    <div class="container">
        <div class="form-header">
            <div class="toggle-buttons">
                <button type="button" class="toggle-btn" onclick="showForm('login')">Se connecter</button>
                <button type="button" class="toggle-btn" onclick="showForm('register')">S'inscrire</button>
            </div>
        </div>

        <form id="loginForm" class="hidden" method="post" action="">
            <div class="form-group">
                <input type="text" name="username" id="username" placeholder="Identifiant" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="submit-btn">Se connecter</button>
        </form>

        <form id="registerForm" class="hidden" method="post" action="">
            <div class="radio-group">
                <label>
                    <input type="radio" name="civilite" value="M" required> M
                </label>
                <label>
                    <input type="radio" name="civilite" value="Mme" required> Mme
                </label>
            </div>
            <div class="form-group">
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="new-password" id="new-password" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="submit-btn">S'inscrire</button>
        </form>
    </div>
<script>
    function showForm(formType) {
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        if (formType === 'login') {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        } else {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        }
    }

    // Show login form by default
    showForm('login');
</script>
</main>

<?php require 'footer.php'; ?>
</html>
