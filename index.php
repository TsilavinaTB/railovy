<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h1>TEST RAILOVY</h1>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'src/Facebook/autoload.php';
use Facebook\Facebook;

 $fb = new  Facebook([
  'app_id' => 473521257006659,
  'app_secret' => 'a03d6374487834b44f84bf34293d146c',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '', // optional
]);

# login.php

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://tsilavina.herokuapp.com/index.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

//$response = $fb->get('/me');
//$response = $response->getGraphUser();
var_dump($helper);
?>
