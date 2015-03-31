<?php 
// Save this code in sendMT.php. Configure the callback URL for your phone number
// to point to the location of this script on the web
// e.g http://yoursite.rhcloud.com/sendMTMessage.php

//require_once('DBConn.php'); //this is your Database connection information
require_once('AfricasTalkingGateway.php');

//next we receive notification from API
//and read in post params to our variables

if($_POST)
{

$number = $POST_['phoneNumber'];
$shortcode = $_POST['shortCode'];
$keyword = $_POST['keyword'];
$updateType = $POST_['updateType'];

/*
$number = '+254721748323';
$shortcode = '22384';
$text = 'love';
$updateType = 'Addition';
*/

if($updateType=='Addition')
{

	//Create a SQL query
	//persist in db

	//invoke sendMessage and try to send
	$apiUsername = 'jani';
	$apikey = '680fdfa9eae83b8649c7d3884ad0679b827c7393140bc68b85e0e5b0a31dcb68';
	$recipients = $number; 
	$message = "You are my love";
	$gateway = new AfricasTalkingGateway($apiUsername, $apikey);

	try
	{
		$from = '22384';
		$bulkSmsMode = '0';
		$params = array();
		$params['keyword'] = 'sheng';

		// Thats it, hit send and we'll take care of the rest.
		$results = $gateway->sendMessage($recipients, $message,$from,$bulkSmsMode,$params);

		foreach($results as $result) 
		{
		$messageId = $result->messageId;
		$status = $result->status;

		//persist in outbox

		}

	}

	catch ( AfricasTalkingGatewayException $e )
	{
	//echo "Encountered an error while sending: ".$e->getMessage();
	error_log($e->getMessage());
	}
	//exit

}

}

?>
