<?php
namespace Controller;
use Model\Connect;
class Controleur
{
    //afficher liste joueur avec les noms des pays
    public function listJoueur()
    {
        $pdo = Connect:: seConnecter();
        $requete = $pdo->query("
        SELECT * 
        FROM joueur
        INNER JOIN pays ON pays.id_pays = joueur.id_pays");
        require "afficher/listJoueur.php";
    }

    //afficher liste equipe
    public function listEquipe()
    {
        $pdo = Connect:: seConnecter();
        $requete = $pdo->query("
        SELECT * 
            FROM equipe
            INNER JOIN pays ON equipe.id_pays = pays.id_pays");
        require "afficher/listEquipe.php";
    }
    //afficher les détails d'un equipe et un joueur
    public function listEquipeJoueur($id)
    {
        $pdo = Connect:: seConnecter();
        $requete = $pdo->prepare("
        SELECT equipe.nom, joueur.nom_J, joueur.prenom
        FROM jouer
        INNER JOIN equipe ON equipe.id_equipe = jouer.id_equipe
        INNER JOIN joueur ON joueur.`id_joueur` = jouer.`id_joueur`
        WHERE equipe.id_equipe = :id");
        $requete->execute(["id" => $id]);
        //header("index.php?action=listEquipeJoueur&id" . $id);
        require "afficher/listEquipeJoueur.php";
    }

    //afficher les détails d'un joueur 
    public function listJoueurEquipe($id)
    {
        $pdo = Connect:: seConnecter();
        $requete = $pdo->prepare("
        SELECT joueur.nom_J, joueur.prenom, equipe.nom
        FROM jouer
        INNER JOIN joueur ON joueur.id_joueur = jouer.id_joueur
        INNER JOIN equipe ON equipe.id_equipe = jouer.id_equipe  
        WHERE joueur.id_joueur = :id");
        $requete->execute(["id" => $id]);
        //header("index.php?action=listEquipeJoueur&id" . $id);
        require "afficher/listJoueurEquipe.php";
    }
// afficher l'ajout d'un joueur
    public function addJoueur()
    {
        $pdo = Connect:: seConnecter();
        if (isset($_POST["submit"])) {
            // var_dump($_POST);die;
            $nom_J = filter_input(INPUT_POST, "nom_J", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, "prenom",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date_N = filter_input(INPUT_POST, "date_N",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_pays = filter_input(INPUT_POST, "id_pays",FILTER_SANITIZE_NUMBER_FLOAT);
            if ($nom_J && $prenom && $date_N) {
                //ar_dump($nom_J, $prenom, $date_N, $id_pays); die;
                $requeteJoueur = $pdo->prepare("
                    INSERT INTO joueur(nom_J, prenom, date_N, id_pays)
                    VALUES (:nom_J,:prenom,:date_N,:id_pays)");
                    $requeteJoueur->execute([
                        "nom_J" => $nom_J,
                        "prenom" => $prenom, 
                        "date_N" => $date_N,
                        "id_pays" => $id_pays]);
                        
        }
        
    }

    $id_pays = $pdo->query("SELECT * FROM pays");         
            
    require "afficher/addJoueur.php";
}
// afficher l'ajout d'une equipe avec liste roulante des pays 
public function addEquipe()
{
    $pdo = Connect:: seConnecter();
    if (isset($_POST["submit"])) {
        $nom = filter_input(INPUT_POST, "nom",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date_Cr = filter_input(INPUT_POST, "date_Cr",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_pays = filter_input(INPUT_POST, "id_pays",FILTER_SANITIZE_NUMBER_FLOAT);
        if (($nom) &&($date_Cr) && ($id_pays)) {
            // var_dump($id_pays);die;
            //var_dump($nom, $date_Cr, $id_pays);
            $requete = $pdo->prepare("
                INSERT INTO equipe(nom, date_Cr, id_pays)
                VALUES (:nom,:date_Cr,:id_pays)");
                $requete->execute([
                    "nom" => $nom,
                    "date_Cr" => $date_Cr,
                    "id_pays" => $id_pays]);
                    
    }
    
}
$id_pays = $pdo->query("SELECT * FROM pays");
require "afficher/addEquipe.php";
}
    public function rajout(){
        $pdo = Connect:: seConnecter();
        if(isset($_POST["submit"])){
            $nom_J = filter_input(INPUT_POST, "id_joueur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST, "id_equipe",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($nom_J && $nom) { //pour ne pas pouvoir rajouter 2 fois le même joueur dans la même equipe
                $requete = $pdo->prepare("
                    INSERT INTO jouer (id_joueur, id_equipe, date_rejoint)      
                    VALUES (:nom_J,:nom,:date_rejoint)");
                    $requete->execute([
                        "nom_J" => $nom_J,
                        "nom" => $nom,
                        "date_rejoint" => date("Y-m-d")]);
            }
        }
        $id_joueur = $pdo->query("SELECT * FROM joueur");
        $id_equipe = $pdo->query("SELECT * FROM equipe");
        require "afficher/rajout.php";
    }
    public function delJoueur($id) {
        $pdo = connect:: seConnecter ();
        $requeteDel = $pdo-> prepare("
        DELETE FROM jouer
        WHERE id_joueur = :id");
        $requeteDel-> execute(["id"=>$id]);
        
        header("Location: index.php?action=listJoueur");
    }
}