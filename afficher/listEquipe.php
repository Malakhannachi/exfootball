<?php ob_start(); ?> <!-- contenu de la page -->
<h1>Liste des equipes</h1>
<table class="table">
    <thead>
        <tr>
            <th>nom</th>
            <th>Année de Creation</th>
            <th>id_pays</th>
            <th>Pays</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($requete->fetchAll() as $equipe) { ?>
                <tr>
                    <td><a href="index.php?action=listEquipeJoueur&id=<?= $equipe['id_equipe'] ?>">
                    <?= $equipe['nom'] ?></td> <!-- nom de l'equipe url -->
                    <td><?= $equipe['date_Cr'] ?></td>
                    <td><?= $equipe['id_pays'] ?></td>
                    <td><?= $equipe['nom_P'] ?></td>
                </tr>
                <?php } ?>
    </tbody>
</table>
<?php
$titre = "liste des equipes ";
$contenu = ob_get_clean();

require 'template.php';