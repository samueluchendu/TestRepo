<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
require_once('functions/validation.php');


$errors = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    

        if (empty($_POST['fname'])) {

                $errors++;

              
                  set_alert('firstname_error', 'Name is required');
                 header('location: Admin_register.php');


        } else {

                $firstname = $_POST['fname'];

                if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $firstname)) {

                        $errors++;

                       
                        set_alert('firstname_error', 'Numbers not required in name field');
                        header('location: Admin_register.php');

                   }

                if (strlen($firstname) <= 2) {

                        $errors++;

                      
                        set_alert('firstname_error', 'Name must not be short');

                        header('location: Admin_register.php');

                  }

                if (is_numeric($firstname)) {

                      $errors++;

                      
                      set_alert('firstname_error', 'Numbers not allowed in name field');
                      header('location: Admin_register.php');

            }

            }  



   

                if (empty($_POST['lname'])) {

                        $errors++;

                      
                        set_alert('lastname_error', 'LastName is required');
                        header('location: Admin_register.php');

           } else {

                  $lastname = $_POST['lname'];

                  if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $lastname)) {

                          $errors++;

                          
                          set_alert('lastname_error', 'Numbers not required in lastname field');
                          header('location: Admin_register.php');

                      }


                  if (strlen($lastname) <= 2) {

                          $errors++;

                         
                          set_alert('lastname_error', 'LastName must not be short');
                          header('location: Admin_register.php');

                  }


                  if (is_numeric($lastname)) {

                          $errors++;

                         
                          set_alert('lastname_error', 'Numbers not allowed in lastname field');
                          header('location: Admin_register.php');}


                    }  


     
            if ($_POST['gender'] == " ") {

                    $errors++;

                   
                    set_alert('gender_error', 'Gender is required');
                    header('location: Admin_register.php');



            } else{

                      $gender=$_POST['gender'];

            } 



            if ($_POST['department'] == " ") {

                  $errors++;

                 
                  set_alert('department_error', 'department is required');
                  header('location: Admin_register.php');

            }else{

                  $department=$_POST['department'];

            }


    
      if ($_POST['designation'] == " ") {

            $errors++;

           
            set_alert('designation_error', 'designation is required');
            header('location: Admin_register.php');


      }else{

            $designation=$_POST['designation'];

      }

     

            if (empty($_POST['password'])) {

                    $errors++;

                    
                    set_alert('password_error', 'password is required');
                    header('location: Admin_register.php');


            } else {

                  $password = $_POST['password'];

                  if (strlen($password) <= 7) {

                        $errors++;

                       
                        set_alert('password_error', 'password must atleast be 8 characters');
                        header('location: Admin_register.php');
                      
                    }

        }





  //Validation for Email field//////////
            if (empty($_POST['email'])) {

                  $errors++;

               
                  set_alert('email_error', 'Email is required');
                  header('location: Admin_register.php');
                  
      } else {

               $email = $_POST['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                  $errors++;

                 
                  set_alert('email_error', 'Email is invalid');
                  header('location: Admin_register.php');
              
              }

            if (strlen($email) <= 5) {

                  $errors++;

                  set_alert('email_error', 'Email must not be less than 5');
                  header('location: Admin_register.php');
              
              }

              if (!strpos($email, '.')) {

                    $errors++;

                    set_alert('email_error', 'Email must contain ' . ". " . 'symbol');
                    header('location: Admin_register.php');
              
              }


  }







    if ($errors > 0) {

      
      'you have  errors';
      
    } else{

           
   
          $all_users= scandir("db/user/");
          $count_users = count($all_users);

          $user_id = $count_users-1;
          date_default_timezone_set("Africa/Lagos");

          $register_time =date("h:i:sa");
          $register_date = date("Y-m-d");


//putting user info into an array object for proper storage in the file system
          $NewUserDetails=[

            'id' => $user_id,
            'reg_time' => $register_time,
            'reg_date' => $register_date,
           
            'firstname' =>$firstname,
            'lastname' =>$lastname,
            'email' =>$email,
            'gender' =>$gender,
            'designation' =>$designation,
            'department' =>$department,
            'password' =>password_hash($password, PASSWORD_DEFAULT)

          ];


           $_SESSION['NewUserDetails']= $NewUserDetails;

            

            for ($counter=0; $counter < $count_users ; $counter++) {

                   $current_user = $all_users[$counter];

           

                  if($current_user == $email . ".json" ){

                        $errors++ ;

                       
                        set_alert('email_error', 'user already exist');
                        header('location: Admin_register.php');
                    
                      
                  }
            }


             set_alert('message', 'User Registered successfully');
            
            file_put_contents("db/user/".$email.".json" , json_encode($NewUserDetails));
         
            header('location:  Admin_dashboard.php');

}






}
     


 ?>
