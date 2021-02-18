<?php
namespace App;

class Connexion  {

    public static function getPDO (){
        return new \PDO("sqlite:data/data.sql", null, null, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }
}