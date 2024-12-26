<?php
function debugForm($variable, $type = "post") : void {

    $output = print_r($variable, true);
    $output = preg_replace('/^Array\n\(\n|\n\)$/', '', $output);

    $message = "Vous avez envoyé un formulaire de type : ";
    $spe = "<span class='text-danger'>$type </span>";

    echo "<h1>$message $spe</h1>";
    echo "<p class='lead'>Contenu du formulaire : </p>";
    echo "<pre class='text-white bg-warning rounded'>" . $output . "</pre>";
}


