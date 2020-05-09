<?php
require_once('functions/alert.php');
require_once('functions/users.php');






function validateFirstName($firstname){

    $errors=0;


    if (empty($_POST['fname'])) {

        $errors++;


        set_alert('firstname_error', 'Name is required');
        header('location: register.php');
    } else {
        $firstname = $_POST['fname'];

        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $firstname)) {

            $errors++;


            set_alert('firstname_error', 'Numbers not required in name field');
            header('location: register.php');
        }

        if (strlen($firstname) <= 2) {

            $errors++;


            set_alert('firstname_error', 'Name must not be short');
            header('location: register.php');
        }

        if (is_numeric($firstname)) {

            $errors++;


            set_alert('firstname_error', 'Numbers not allowed in name field');
            header('location: register.php');
        }
    }


    return $firstname;


}



function validateLastName($lastname){

    $errors=0;

    if (empty($_POST['lname'])) {

        $errors++;

        set_alert('lastname_error',  'LastName is required');
        header('location: register.php');
    } else {

        $lastname = $_POST['lname'];

        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $lastname)) {

            $errors++;


            set_alert('lastname_error',   'Numbers not required in lastname field');
            header('location: register.php');
        }

        if (strlen($lastname) <= 2) {

            $errors++;


            set_alert('lastname_error',   'LastName must not be short');
            header('location: register.php');
        }


        if (is_numeric($lastname)) {

            $errors++;


            set_alert('lastname_error',   'Numbers not allowed in lastname field');
            header('location: register.php');
        }
    }  


 return $lastname;



}




function validateGender($gender){
     
    $errors=0;

    if ($_POST['gender'] == " ") {

        $errors++;


        set_alert('gender_error',  'Gender is required');
        header('location: register.php');
    } else {

        $gender = $_POST['gender'];
    }





}



function validateDesignation($designation){
  
    $errors=0;

    if ($_POST['designation'] == " ") {

        $errors++;


        set_alert('designation_error',  'designation is required');
        header('location: register.php');
    } else {

        $designation = $_POST['designation'];


}


   return $designation;

}




function validatePassword($password){

        $errors=0;

    if (empty($_POST['password'])) {

        $errors++;

        //$_SESSION['password_error'] = 'password is required';
        set_alert('password_error',   'password is required');

        header('location: register.php');
    } else {

        $password = $_POST['password'];

        if (strlen($password) <= 7) {

            $errors++;


            set_alert('password_error',   'paasword must atleast be 8 characters');

            header('location: register.php');
        }
    } 

     return $password;

}


function validateEmail($email){

    $errors=0;

    if (empty($_POST['email'])) {

        $errors++;

        set_alert('email_error',   'email is required');
        header('location: register.php');
        
    } else {

        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $errors++;

            // $_SESSION['email_error'] = 'Email is invalid';
            set_alert('email_error',   'Email is invalid');
            header('location: register.php');
        }

        if (strlen($email) <= 5) {

            $errors++;


            set_alert('email_error',  'Email must not be less than 5');
            header('location: register.php');
        }

        if (!strpos($email, '.')) {

            $errors++;


            set_alert('email_error',  'Email must contain ' . ". " . 'symbol');
            header('location: register.php');
        }
    }


     return $email;

}

?>