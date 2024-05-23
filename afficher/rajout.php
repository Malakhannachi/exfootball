<?php ob_start(); ?> 
<h1>Ajouter </h1>

<form action="index.php?action=rajout" method="post">
    
    
    <select name="id_joueur" id="id_joueur">       <!--liste roulant des joueurs--> 
            <option value="">Sélectionnez un joueur</option>
            <?php
                
                while ($joueur = $id_joueur->fetch()) {
                    echo "<option value=" . $joueur["id_joueur"] . ">" . $joueur["nom_J"] . "</option>";
                }
            ?>
        </select> 
        <select name="id_equipe" id="id_equipe">       <!--liste roulant des equipes--> 
            <option value="">Sélectionnez un equipe</option>
            <?php
                
                while ($equipe = $id_equipe->fetch()) {
                    echo "<option value=" . $equipe["id_equipe"] . ">" . $equipe["nom"] . "</option>";
                }
            ?>
        </select> 

        <input type="date" name="date_rejoint" placeholder="date_rejoint">  
    <input type="submit" name="submit" value="Ajouter">
</form>
<?php
$titre = "Ajout";
$contenu = ob_get_clean();
require "afficher/template.php";