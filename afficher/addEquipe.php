<?php ob_start(); ?> 


<form action="index.php?action=addEquipe" method="post">
    <input type="text" name="nom" placeholder="nom">
    <input type="number" name="date_Cr" placeholder="date_Création">
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
$titre = "Ajouter un équipe";
$contenu = ob_get_clean();
require "afficher/template.php";