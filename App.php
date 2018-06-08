<?php

    class App
    {
        public function __construct() {
            // 
        }

        public function app($phone) {
            // Include Africa's Talking gateway
            require_once('resources/AfricasTalkingGateway.php');


            // Specify your authentication credentials
            require_once('env.php');

            // Client phone number
            $recipients = $phone;
            
            // Tell 'em what I am... haha
            $message    = "I am a lumberjack. I sleep all night and work all day!";

            // Create a new instance of the bad ass gateway
            $gateway    = new AfricasTalkingGateway($username, $apikey);
           
            try { 
                // Thats it, hit send and we'll take care of the rest. 
                $results = $gateway->sendMessage($recipients, $message);
                            
                foreach($results as $result) {
                    // 
                }
            }catch ( AfricasTalkingGatewayException $e ) {
                echo "Encountered an error while sending: ".$e->getMessage();
            }

            // Damn it bro!
        }
    }

?>