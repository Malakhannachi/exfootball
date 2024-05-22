<?php

use Controller\Controleur; // nom du namespace et classe


spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

$controleur = new Controleur();
$id = isset($_GET['id']) ? $_GET["id"] : null;


if(isset($_GET['action'])) 
{
    switch($_GET['action']) {
        case "listJoueur":$controleur->listJoueur(); break;
        case 'listEquipe':$controleur->listEquipe(); break;
        case "listEquipeJoueur":$controleur->listEquipeJoueur($id); break;
        case "listJoueurEquipe":$controleur->listJoueurEquipe($id); break;
        case "addJoueur":$controleur->addJoueur(); break;
           
    }
}
