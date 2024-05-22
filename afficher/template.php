<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel = "stylesheet" href = "public/css/style.css" />
<title><?= $titre ?></title>
<head></head>
<body>
    <nav>
    <li><a href="index.php?action=listJoueur"> joueur</a></li>
    <li><a href="index.php?action=listEquipe"> Equipe</a></li>
    <li><a href="index.php?action=addJoueur"> Ajouter Joueur</a></li>
    
    </nav>
    
<main>
     <div id="contenu">
           <?= $contenu ?>
    </div>
    
    </main>
    </div>
</body>