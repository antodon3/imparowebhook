<?php 

$siti = [];
$notizie = [];
$method = $_SERVER['REQUEST_METHOD'];

function stampaMessaggio() {
    	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->result->parameters->text;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			stampaMessaggio();
			break;

		case 'bye':
			$speech = "Bye, good night";
			stampaMessaggio();
			break;
		
		case 'news':
			for ($x = 0; $x <= 10; $x++) {
			    	$speech = "belle news";
				stampaMessaggio();
			} 
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			stampaMessaggio();
			break;
	}

}
else
{
	echo "Method not allowed";
}

?>
