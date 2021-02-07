<?php
namespace App;

class Connexion  {

    public static function getPDO (){
        return new \PDO('mysql:host=sql7.freesqldatabase.com:3306;sql7390456', 'sql7390456', 'S5yVTQSP1d', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }
}
