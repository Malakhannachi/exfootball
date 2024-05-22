<?php ob_start(); ?>


<form action="index.php?action=addJoueur" method="post">
    <input type="text" name="nom" placeholder="nom">
    <input type="date" name="date_Cr" placeholder="date_Création">
    <input type="submit" name="submit" value="Ajouter">
</form>
<?php
$titre = "Ajouter un équipe";
$contenu = ob_get_clean();
require "afficher/template.php";