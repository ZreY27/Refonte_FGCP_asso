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
    <link rel="icon" href="./assets/img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/formulaire.css">
    <script language="JavaScript" src="assets/script/script.js" type="module"></script>
    <title>Connexion</title>
</head>

<?php require 'header.php'; ?>

<main>
    <div class="container">
        <?php if (isset($_SESSION['user'])): ?>
            <!-- Afficher les informations de l'utilisateur connecté -->
            <div class="user-summary">
                <h2>Mon compte</h2>
                <p><strong>Nom :</strong> <?= htmlspecialchars($_SESSION['user']['nom']) ?></p>
                <p><strong>Prénom :</strong> <?= htmlspecialchars($_SESSION['user']['prenom']) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
                <br>
                <p><a href="enquete.php" class="btn-enquete">Accéder à l'enquête</a></p>
                <br>
                <form method="post" action="deconnexion.php">
                    <button type="submit" class="btn-deconnexion">Se déconnecter</button>
                </form>
            </div>
        <?php else: ?>
            <!-- Afficher les formulaires pour les utilisateurs non connectés -->
            <div class="form-header">
                <div class="toggle-buttons">
                    <button type="button" class="toggle-btn" onclick="showForm('login')">Se connecter</button>
                    <button type="button" class="toggle-btn" onclick="showForm('register')">S'inscrire</button>
                </div>
            </div>

            <form id="loginForm" class="hidden" method="post" action="connexion.php">
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="submit-btn">Se connecter</button>
            </form>

            <form id="registerForm" class="hidden" method="post" action="inscription.php">
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
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="submit-btn">S'inscrire</button>
            </form>
        <?php endif; ?>
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
