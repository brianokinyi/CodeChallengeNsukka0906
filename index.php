<?php 
    // Print the response as plain text so that the gateway can read it
    header('Content-type: text/plain');

    // Try using POST with online NGROK and sandbox
	$phonenumber = $_GET['MSISDN'];  
    $sessionID = $_GET['sessionId'];  
    $servicecode = $_GET['serviceCode'];  
    $ussdString = $_GET['text'];

    // Get the parameters provided by Africa's Talking USSD gateway
    // $phonenumber = $_POST['phoneNumber'];
    // $sessionID = $_POST['sessionId'];  
    // $servicecode = $_POST['serviceCode'];  
    // $ussdString = $_POST['text'];

    // Required my class
    require_once('App.php');

    //set default level to zero
	$level = 0; 

	if($ussdString != ""){  
	    $ussdString=  str_replace("#", "*", $ussdString);  
	    $ussdString_explode = explode("*", $ussdString);
	    $level = count($ussdString_explode);  
    }

    //echo ussd_text
    function ussd_proceed ($ussd_text){  
    	echo $ussd_text;  
    }


    if ($level==0){  
        displaymenu();
    } 
    
    //  
    if ($level>0){  
        switch ($ussdString_explode[0])  
            {  
            case 1: 			
                $app = new App();
                $app->app($phonenumber);
                break;   
            case 2:  //About
                $about = new About();
                $about->about();  
                break;
            default:				
                $ussd_text = "END Ooops! I didn't recognize that response!";
                ussd_proceed($ussd_text);
                break; 
        }//End switch  
    }  	
 
    function displaymenu(){  
		$ussd_text="CON 1. Send Message\n2. About";  
		ussd_proceed($ussd_text);  
    }
?>