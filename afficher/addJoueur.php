<?php ob_start(); ?>


<form action="index.php?action=addJoueur" method="post">
    <input type="text" name="nom_J" placeholder="nom">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="date" name="date_N" placeholder="date_Naissance"> 
    <select name="id_pays" id="id_pays">       <!--liste roulant des pays--> 
            <option value="">Sélectionnez un pays</option>
            <?php
                
                while ($pays = $id_pays->fetch()) {
                    echo "<option value=" . $pays["id_pays"] . ">" . $pays["nom_P"] . "</option>"; //liste des pays
                }
            ?>
        </select> 
    <input type="submit" name="submit" value="Ajouter">
</form>
<?php
$titre = "Ajouter un joueur";
$contenu = ob_get_clean();
require "afficher/template.php";