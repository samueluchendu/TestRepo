<?php session_start();

require_once('functions/alert.php');
require_once('functions/appointment.php');

$errors = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST['fname'])) {

            $errors++;

          
            set_alert('firstname_error', 'field is required');
            header('location: bookAppointment.php');

        } else {
            
            $firstname = $_POST['fname'];

        }



        if (empty($_POST['lname'])) {

            $errors++;

          
            set_alert('lastname_error', 'field is required');
            header('location: bookAppointment.php');

        } else {

            $lastname = $_POST['lname'];

        }


        if ($_POST['department'] ==" ") {

            $errors++;

           
           set_alert('department_error', 'field is required');
            header('location: bookAppointment.php');

        } else {

            $department = $_POST['department'];

        }



        if (empty($_POST['NatureOfAppointment'])) {

            $errors++;

         
            set_alert('nature_error', 'field is required');
            header('location: bookAppointment.php');

        } else {

            $natureOfAppointment = $_POST['NatureOfAppointment'];

        }



        if ($_POST['dateOfAppointment']) {

             $dateOfAppointment = $_POST['dateOfAppointment'];

             $_SESSION['dateOfAppointment'] = $dateOfAppointment;

        }



        if ($_POST['timeOfAppointment']) {

               $timeOfAppointment = $_POST['timeOfAppointment'];

        }


        if ($_POST['complaint']) {

              $complaint = $_POST['complaint'];

        }



            if (empty($_POST['email'])) {

                    $errors++;

                  
                    set_alert('email_error', 'Email is required');
                    header('location: bookAppointment.php');


            } else {

                    $email = $_POST['email'];

                    $_SESSION['email'] = $email;

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        $errors++;

                       
                       set_alert('email_error', 'Email is invalid');
                        header('location: bookAppointment.php');

                }

                if (strlen($email) <= 5) {

                        $errors++;

                       
                        set_alert('email_error', 'Email must not be less than 5');
                        header('location: bookAppointment.php');
                }

                if (!strpos($email, '.')) {

                    $errors++;

                    
                    set_alert('email_error', 'Email must contain ' . ". " . 'symbol');
                    header('location: bookAppointment.php');
                }

            }




         

            if ($errors > 0) {

                'you have  errors';
            } else {


        checkAppointment($complaint, $natureOfAppointment, $dateOfAppointment, $firstname, $lastname, $email, $timeOfAppointment, $department);
        set_alert('success', 'Appointment booked successfully');
        header('location:  dashboard.php');

    }
}











        







?>