<?php

function messageFlash() : void {
    if (isset($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $type => $message) {
            echo "<div class='alert alert-{$type}'>{$message}</div>";
        }
        // Supprimer les messages flash après affichage
        unset($_SESSION['flash']);
    }

}