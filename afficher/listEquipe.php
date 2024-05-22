<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>nom</th>
            <th>Année de Creation</th>
            <th>id_pays</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $equipe) { ?>
                <tr>
                    <td><a href="index.php?action=listEquipeJoueur&id=<?= $equipe['id_equipe'] ?>"><?= $equipe['nom'] ?></td>
                    <td><?= $equipe['date_Cr'] ?></td>
                    <td><?= $equipe['id_pays'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php

$contenu = ob_get_clean();

require 'template.php';