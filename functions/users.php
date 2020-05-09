<?php

require_once('alert.php');



//// Checking user from the Database 
   function checkUser($email){

       if(!$email){
           
            set_alert('email_error',  'User is not set');
            die();

       }

            $all_users = scandir("db/user/");
            $count_users = count($all_users);
  


        for ($counter = 0; $counter < $count_users; $counter++) {

            $current_user = $all_users[$counter];

            if ($current_user == $email . ".json") {


                $userContent = file_get_contents("db/user/" . $email . ".json");
                $userContentObject = json_decode($userContent);
                
                return $userContentObject;
            

           

            }
           
        }
         die();
       



   }










/// Function to Login Users

function userLogin($email, $password)
{


  $all_users = scandir("db/user/");
  $count_users = count($all_users);

  date_default_timezone_set("Africa/Lagos");
  $login_time = date("h:i:sa");

  $login_date = date("Y-m-d");


  for ($counter = 0; $counter < $count_users; $counter++) {

    $current_user = $all_users[$counter];


    if ($current_user == $email . ".json") {


      $userContent = file_get_contents("db/user/" . $email . ".json");
      $userContentObject = json_decode($userContent);



      $userPasswordFromDB = $userContentObject->password;


      $user_password = password_verify($password, $userPasswordFromDB);



      if ($userPasswordFromDB == $user_password) {

        $userDetails = [
          
          'id' => $userContentObject->id,
          'reg_time' => $userContentObject->reg_time,
          'reg_date' => $userContentObject->reg_date,
          'logout_time' => $userContentObject->logout_time,
          'logout_date' => $userContentObject->logout_date,
          'login_time' => $login_time,
          'login_date' => $login_date,
          'firstname' => $userContentObject->firstname,
          'lastname' => $userContentObject->lastname,
          'email' => $userContentObject->email,
          'gender' => $userContentObject->gender,
          'designation' => $userContentObject->designation,
          'department' => $userContentObject->department,
          'password' => $userContentObject->password
        ];

        $_SESSION['userDetails'] =  $userDetails;

        header('location: dashboard.php');
        die();

      } else {


        set_alert('email_error',  'Incorrect Email or Password');
        header('location: login.php');
      }


      if ($userContentObject->designation == "Admin") {

        $_SESSION['designation'] = 'Admin';
        header('location: Admin_dashboard.php');
      }


      if ($userContentObject->designation == "Staff") {

        $_SESSION['designation'] = 'Staff';
        header('location: staff_dashboard.php');
      }

      die();
    }
  }

  if ($current_user !== $email . ".json") {



    set_alert('email_error',  'Incorrect Email or Password');
    header('location: login.php');
  }
}





// FUNCTION TO LOGOUT USER /////

  function userLogout($email)
  {


    $all_users = scandir("db/user/");
    $count_users = count($all_users);

    date_default_timezone_set("Africa/Lagos");

    $last_login_time = date("h:i:sa");
    $last_login_date = date("Y-m-d");


    for ($counter = 0; $counter < $count_users; $counter++) {
      $current_user = $all_users[$counter];


      if ($current_user == $email . ".json") {


        $userContent = file_get_contents("db/user/" . $email . ".json");


        $userContentObject = json_decode($userContent);



        $userContentObject->logout_date = $last_login_date;
        $userContentObject->logout_time = $last_login_time;

        unlink("db/user/" . $email . ".json");

        file_put_contents("db/user/" . $email . ".json", json_encode($userContentObject));
      }
    }

    session_destroy();
  }








     function registerUser($firstname, $lastname, $email, $gender, $designation, $department, $password){

            $errors=0;

            $all_users = scandir("db/user/");
            $count_users = count($all_users);

              $user_id = $count_users - 1;

             date_default_timezone_set("Africa/Lagos");

            $register_time = date("h:i:sa");
            $register_date = date("Y-m-d");



             $userDetails = [

            'id' => $user_id,
            'reg_time' => $register_time,
            'reg_date' => $register_date,
            'logout_date' => "",
            'logout_time' => "",
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'gender' => $gender,
            'designation' => $designation,
            'department' => $department,
            'password' => password_hash($password, PASSWORD_DEFAULT)

          ];

          $_SESSION['userDetails']= $userDetails;




    for ($counter = 0; $counter < $count_users; $counter++) {

            $current_user = $all_users[$counter];

            if ($current_user == $email . ".json") {

                  $errors++ ;
              
                 set_alert('email_error',  'user already exist');
                 header('location: register.php');
              
                die();

             }
    }


    
           file_put_contents("db/user/".$email.".json" , json_encode($userDetails));
           
            set_alert('message',  'Registration Successful, you can now login');
            header('location:  login.php');

}





/// SESSION TO CONTROL USER ACCESS

    function isUserLogin(){

      if (isset($_SESSION['userDetails']['designation']) && $_SESSION['userDetails']['designation'] == 'Patient') {

        return true;

      }

      return false;

    }

/// SESSION TO CONTROL ADMIN ACCESS

    function adminLogin(){

      if (isset($_SESSION['userDetails']['designation']) && $_SESSION['userDetails']['designation'] == 'Admin') {

        return true;

      }

      return false;

    }


    /// SESSION TO CONTROL STAFF ACCESS

    function staffLogin(){

      if (isset($_SESSION['userDetails']['designation']) && $_SESSION['userDetails']['designation'] == 'Staff') {

        return true;

      }

      return false;

    }





     

  
?>

