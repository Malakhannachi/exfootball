<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Equipe</th>
            <th>Nom joueur</th>
            <th>Prenom joueur</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $equipe) { ?>
                <tr>
                <td><?= $equipe['nom'] ?></td>
                    <td><?= $equipe['nom_J'] ?></td>
                    <td><?= $equipe['prenom'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php

$contenu = ob_get_clean();

require 'template.php';