<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
require_once('functions/validation.php');

$errors= 0;


if($_SERVER["REQUEST_METHOD"] == "POST"){

      validateFirstName($firstname=$_POST['fname']);


      validateLastName($lastname= $_POST['lname']);

    

      validateGender($gender=$_POST['gender']);
 
         




                  if (isset($_POST['department'])) {

                 
                        $department = $_POST['department'];
                  }


      validateDesignation($designation = $_POST['designation']);

    
      validatePassword($password= $_POST['password']);

     

               if (empty($_POST['email'])) {

                     $errors++ ;

                   
                   set_alert('email_error',   'email is required');
                     header('location: register.php');

              } else {

                       $email=$_POST['email'];

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                          $errors++ ;
                          
                        
                          set_alert('email_error',   'Email is invalid');
                          header('location: register.php');
                    }

                    if (strlen($email) <= 5) {

                        $errors++ ;

                      
                        set_alert('email_error',  'Email must not be less than 5');
                        header('location: register.php');

                    }

                    if (!strpos($email, '.')) {

                          $errors++ ;
                          
                      
                         set_alert('email_error',  'Email must contain ' . ". " . 'symbol');
                          header('location: register.php');

                    }


      }





  //checking for errors and inserting into database;

    if ($errors > 0) {

         'you have  errors';

    } else {

           

            registerUser($firstname, $lastname, $email, $gender, $designation, $department, $password);







}
}








 ?>
