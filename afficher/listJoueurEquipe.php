<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Nom joueur</th>
            <th>Prenom joueur</th>
            <th>Equipe</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $joueur) { ?>
                <tr>
                    <td><?= $joueur['nom_J'] ?></td>
                    <td><?= $joueur['prenom'] ?></td>
                    <td><?= $joueur['nom'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php

$contenu = ob_get_clean();

require 'template.php';