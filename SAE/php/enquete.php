<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/accueil/logo_FGCP.png">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/enquete.css">
    <title>Enquête</title>
</head>

<?php require 'header.php'; ?>

<div id="entete-enquete">
    <h2>Enquête</h2>
</div>
<div id="entete-texte" >
    <p>Dans le cadre de sa mission confiée par France Assos Santé, notre association met en place une enquête destinée
        à mieux comprendre les besoins et les préoccupations de ses adhérents adultes et adolescents. Cette enquête nous
        permettra d'identifier vos attentes et de mieux adapter nos actions à vos besoins. Vous pourrez
        y participer facilement en répondant directement en ligne, via le site web de l'association. </p>

    <h4>L’enquête sera diffusée et gérée au travers du site web de l’association</h4>
</div>
<div class="enquete">
    <h5><em>* Pour chaque question veuillez selectionner un choix</em></h5>
    <div class="options">
    <label for="age" class="form-label">Votre tranche d'age :  </label>
    <select class="select" aria-label="Default select example" id="age">
        <option value="1" selected>Supérieur à 18 ans </option>
        <option value="2">Inférieur à 18 ans</option>
    </select>
    </div>
    <div class="options">
    <label for="sexe" class="form-label">Votre sexe :  </label>
    <select class="select" aria-label="Default select example" id="sexe">
        <option value="1" selected>F</option>
        <option value="2">H</option>
    </select>
    </div>
</div>
</html>


