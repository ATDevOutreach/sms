<?php
// Save this code in sendNORM.php. Configure the callback URL for your phone number
// to point to the location of this script on the web
// e.g http://yoursite.rhcloud.com/sendBulkSMS.php

// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');

// Specify your login credentials
$username   = "YourAPIUserName";
$apikey     = "YourAPIKey";

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254787235065,+254729891801";

// And of course we want our recipients to know what we really do
$message    = "This is a test from atvoice application";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

// Any gateway errors will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
  foreach($results as $result) {
    // Note that only the Status "Success" means the message was sent
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 
?>