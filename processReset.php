<?php
session_start();
require_once('functions/alert.php');
require_once('functions/users.php');
require_once('functions/email.php');

$errors= array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $token= $_POST['token'];
        $_SESSION['token'] = $token;


        if (empty($_POST['email'])) {

            $errors['email'] = "";
           
            set_alert('email_error', 'Email is required');
            header('location: reset.php');

        }else {

            $email = $_POST['email'];
        }



        if (empty($_POST['password'])) {

            $errors['password'] = "";
         
            set_alert('password_error', 'Password is required');
            header('location: reset.php');

        }else {

            $password = $_POST['password'];
            
        }



        if (count($errors) > 0) {

            'you have  errors';

        }else {

            $allUsersToken = scandir("db/tokens/");
        
            $countAllUsersToken = count($allUsersToken);

        
        for ($counter = 0; $counter < $countAllUsersToken; $counter++) {
                $currentTokenFile = $allUsersToken[$counter];

           
                if($currentTokenFile==$email.".json"){

               
                    $tokenContent = file_get_contents("db/tokens/" . $currentTokenFile);

                    $tokenObject = json_decode($tokenContent);
                    $tokenFromDB = $tokenObject->token;

                    if($tokenFromDB == $token){

                   

                    $all_users = scandir("db/user/");
                    $count_users = count($all_users);

                    for ($counter = 0; $counter < $count_users; $counter++) {
                        $current_user = $all_users[$counter];

                   


                        if ($current_user == $email . ".json") {

                            $userString = file_get_contents("db/user/" . $current_user);
                            $userObject = json_decode($userString);
                            $userObject->password = password_hash($password, PASSWORD_DEFAULT);

                             unlink("db/user/" . $current_user);

                    

                            file_put_contents("db/user/" . $email . ".json", json_encode($userObject));


                           
                            set_alert('message', 'Password reset successful, you can login now');
                            

                            $subject = "Password Reset Successful";
                            $message = "password reset was successful,if this wasnt done by you kindly visit smh.org to reset your password";

                             sendMail($subject,$message,$email);
                             header("location: login.php");
                                

                        }
                   }


                    die();
                    
                }
               

                









}
}

   
    set_alert('error', 'Invalid token/email address');
    header("location: reset.php?token=" . $token);

}

}

                  

