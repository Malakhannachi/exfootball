<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom_J</th>
            <th>Prenom</th>
            <th>Date_N</th>
            <th>Nationalité</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $joueur) { ?>
                <tr>
                    <td><a href="index.php?action=listJoueurEquipe&id=<?= $joueur['id_joueur'] ?>"><?= $joueur['nom_J'] ?></td>
                    <td><?= $joueur['prenom'] ?></td>
                    <td><?= $joueur['date_N'] ?></td>
                    <td><?= $joueur['id_pays'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php

$contenu = ob_get_clean();

require 'template.php';


