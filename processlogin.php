<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
require_once('functions/validation.php');




    $errors = 0;


if($_SERVER["REQUEST_METHOD"] == "POST"){

   validateEmail($email= $_POST['email']);
 


      validatePassword($password = $_POST['password']);










  if ($errors > 0) {
    
       'you have  errors';


  }else{

            userLogin($email, $password);


    }
 }



          
