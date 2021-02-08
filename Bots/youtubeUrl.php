<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../vendor/autoload.php';

use App\YouTubeDownloader;
use App\RepChatfuel;

$json = new RepChatfuel();

$actions = [
	'getResolution' ,
	'getVideo'
];
	
if(isset($_GET['url']) && isset($_GET['action'])){



	$url = $_GET['url'];
	$action = $_GET['action'];

	$downloadUrl = "https://www.youtube.com/watch?v=CH50zuS8DD0" ;
	$downloadUrl = $url ;
	//ICI LE LOGIQUE YOUTUBE
	$tube = new YouTubeDownloader();
	$tube->setUrl($downloadUrl);
	$downloads = $tube->getVideoDownloadLink();


	if ($action === 'getResolution') {

		$resolution = null;

		if(is_array($downloads)) {
			foreach ($downloads as $one) {
				$resolution[] = $one['qualityLabel'];
			}

			$json->addQuickReplies($downloads[0]['title'] .', Veuillez choisir la resolution' ,$resolution);
	        echo $json->reponse();
		}


	} elseif($action === 'getVideo') {

			if(isset(($_GET['resolution']))) {
				foreach ($downloads as $download) {
					if(($download['qualityLabel']) == trim($_GET['resolution'])){
						
						$json->addVideo($download['url']);
					} 
				}
			}
	        echo $json->reponse();
	}

	//FIN DE LOGIQUE YOUTUBE





} else {


	echo 'YoutubeUrl APIs ( Params = url et action : [ '. implode(' , ', $actions).' ] )';

?>

<form method="get" action=""> 
	<input type="text" name="url">
	<select name="action">
		<option value="getResolution">getResolution</option>
		<option value="getVideo">getVideo</option>
	</select>
	<select name="resolution">
		<option value="360p">360p</option>
		<option value="720p">720p</option>
	</select>	
	
	<button type="submit">Envoyer</button>
</form>

<?php
} 


?>

