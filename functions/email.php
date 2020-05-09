<?php
require_once('alert.php');



function sendMail($subject,$message,$email){

   
    $headers = "From: no-reply@smh.com" . "\r\n" .
        "CC: samueluchendu47@gmail.com";

    $mail =  mail($email, $subject, $message, $headers);
 
                                       
     if($mail){

        return true;
     }
     else{

        return false;
     }

                



}




?>