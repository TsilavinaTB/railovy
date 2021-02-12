Send SMS
Choose your languagePHP

<?php
	// Account details
	$apiKey = urlencode('eUJY0AIUX6U-gpR1uPLWqs6Vt9VpkGdgwW2vX9ChlA');
	
	// Message details
	$numbers = urlencode('+261348483193');
	$sender = urlencode('Jims Autos');
	$message = rawurlencode('This is your message');
 
	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>
