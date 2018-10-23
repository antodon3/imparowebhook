<?php 

$siti = [];
$notizie = [];
$method = $_SERVER['REQUEST_METHOD'];

function stampaMessaggio($speech) {
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
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;
		
		case 'news':
			$speech = "belle news";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	
	stampaMessaggio($speech);

}
else
{
	echo "Method not allowed";
}

?>
