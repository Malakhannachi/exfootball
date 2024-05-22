<?php
namespace Model;
abstract class Connect // classe abstraite pour la connexion a la bdd est static pour ne pas l'instancier
{
    const HOST = "localhost";
    const DB = "football";
    const USER = "root";
    const PASSWORD = "";
    public static function seConnecter(){
        try{
            return new \PDO("mysql:host=".self::HOST.";dbname=".self::DB, self::USER, self::PASSWORD);
        }catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
}