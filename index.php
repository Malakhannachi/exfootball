<?php

use Controller\Controleur; // nom du namespace et classe


spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$controleur = new Controleur(); 

$id = isset($_GET['id']) ? $_GET["id"] : null; // recuperer l'id

if(isset($_GET['action']))  // verefier de clique sur un bouton
{
    switch($_GET['action']) {
        case "listJoueur":$controleur->listJoueur(); break;
        case 'listEquipe':$controleur->listEquipe(); break;
        case "listEquipeJoueur":$controleur->listEquipeJoueur($id); break;
        case "listJoueurEquipe":$controleur->listJoueurEquipe($id); break;
        case "addJoueur":$controleur->addJoueur(); break;
        case "addEquipe":$controleur->addEquipe(); break;
        case "rajout":$controleur->rajout(); break;
        case "delJoueur":$controleur->delJoueur($id); break;
           
    }
}
