<?php

    class Receive
    {
        public function __construct() {
            // 
        }

        public function receive() {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $text = $_POST['text'];
            $date = $_POST['date'];
            $id = $_POST['id'];
            $linkId = $_POST['linkId']; //This works for onDemand subscription products
        }
    }
?>