<body>
    <header>
        <div id="logoNom">
            <img id="logo" src="assets/img/accueil/logo_FGCP.png" alt="logo FGCP" />
            <h2 id="nom">Fédération France Greffes Cœur et/ou Poumons</h2>
            <nav>
                <ul type="none">
                    <li><a href="index.php" title="Accueil">Accueil</a></li>
                    <li><a href="presentation.php" title="Présentation de la FGCP">Qui sommes-nous</a></li>
                    <li><a href="actus.php" title="Voir la page d'actualité">Actus</a></li>
                    <li class="menuDeroulant">
                        <a href="<?php echo isset($_SESSION['user']) ? '#' : 'formulaire.php'; ?>" class="monCompte">Mon compte</a>
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="menuDeroulantContenu">
                                <a href="formulaire.php">Mon profil</a>
                                <a href="enquete.php">Enquête</a>
                                <?php if ($_SESSION['user']['admin']): ?>
                                    <a href="indicateurs.php">Indicateurs</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </li>

                    <li class="don"><a href="don.php" title="Faire un don">Faire un don</a></li>
                </ul>
            </nav>
            <div id="navMobile">
                <p class="don"><a href="don.php" title="Faire un don">Faire un don</a></p>
                <img id="menuMobile" src="assets/img/mobile/menu.png" alt="Menu">
            </div>
        </div>
        <div>
            <nav id="navVersionMobile">
                <ul type="none" id="menuVersionMobile">
                    <li><a href="index.php" title="Accueil">Accueil</a></li>
                    <li><a href="presentation.php" title="Présentation de la FGCP">Qui sommes-nous</a></li>
                    <li><a href="actus.php" title="Voir la page d'actualité">Actualités</a></li>
                    <li><a href="formulaire.php" title="Se connecter ou s'inscrire">Mon compte</a></li>
                </ul>
            </nav>
        </div>
    </header>

