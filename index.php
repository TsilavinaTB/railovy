<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'vendor/autoload.php';

use App\Connexion;

$pdo = Connexion::getPDO();


?>
<a href="Bots/youtubeUrl.php">Youtube APIs</a>
