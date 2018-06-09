<?php
    class Respond
    {
        public function __construct() {
            // 
        }

        public function respond($phone) {
            $from = $_POST['12345'];
            $to = $_POST['to'];
            $text = $_POST['text'];
            $date = $_POST['date'];
            $id = $_POST['id'];
            // $linkId = $_POST['linkId']; //This works for onDemand subscription products

            //Manipulate the data as required

            // Include Africa's Talking gateway
            require_once('resources/AfricasTalkingGateway.php');
    
    
            // Specify your authentication credentials
            require_once('env.php');

            // Client phone number
            $recipients = $phone;

            // And of course we want our recipients to know what we really do
            $message = "I am a lumberjack. I sleep all night and work all day!";

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