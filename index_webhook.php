<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	//$text = $input["result"]["action"];
	//$text = $json->result->parameters->text;
	$text = $json->result->metadata->intentName;

	switch ($text) {
		case 'hi':
			$speech = "1.Get the Missing Meter Numbers from DMD report.
                              2.Validate and filter out the meters which are not exist in MDM.
                              3.Get the meter details from CIMS using meter and send out mail to Tim.
                              4.Once Tim flip it to standard meter, Create HPSM ticket.
     
                              Document URL: https://www.spreadsheet.com/";
			break;

		case 'bye':
			$speech = "PECO missing meter number details";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, can you please elobarate more";
			break;
	}

	$response = new \stdClass();
	$response->speech = "$speech";
	$response->displayText = "$speech";
	$response->source = 'source-of-the-response';
	$response->return = "$speech";
	$response->fulfillmentText = "$speech";
	echo json_encode($response);
}
else
{
	$speech = "Ok";
	$response->speech = "$speech";
	echo json_encode($response);
}

?>
