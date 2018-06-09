<?php

    class App
    {
        public function __construct() {
            // 
        }

        public function app($details, $phone) {
            if (count($details)==1){
                
                $ussd_text="CON \nReply with the message you want to send!";
                ussd_proceed($ussd_text); 

            } else if (count($details)==2) {

                $message = $details[1];

                        
                // Include Africa's Talking gateway
                require_once('resources/AfricasTalkingGateway.php');
    
    
                // Specify your authentication credentials
                require_once('env.php');
    
                // Client phone number
                $recipients = '12345';

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
    }

?>