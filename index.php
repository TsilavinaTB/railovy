<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<h1>TEST RAILOVY</h1>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'src/Facebook/autoload.php';
use Facebook\Facebook;

 $fb = new  Facebook([
  'app_id' => 2891856974472829,
  'app_secret' => '98be3ab63d0d2b76a3ef55facf760f3c',
  'default_graph_version' => 'v2.10',
  'default_access_token' => 'EAApGIOu0ZAn0BAIJ5PGbkvKbeCgzZCzpdZCSmsKX5AvlGMRyNC7m09aBsammZA6c2rY2NcwZA42GvEYCBPYrFntt837XJ20ZAxI1PbZBWkoFb7mgAoATyTVnG6Lz6NTEuRRMhrt135dNa6KcY0etFLLqk4l25XGWs4XZC0gxjuQFdOCqdsMCZBZBRCvvMLmAkeKnPGkbqEvLF8KeSsEJ5uYsDczo1WvEv4SbiME8clJl7CfwZDZD', // optional
]);

# login.php

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://tsilavina.herokuapp.com/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

$response = $fb->get('/me');
$response = $response->getGraphUser();
var_dump($response);
?>
