<?php
require_once('alert.php');




function checkAppointment($complaint, $natureOfAppointment, $dateOfAppointment, $firstname, $lastname, $email, $timeOfAppointment, $department){
    
      $errors=0;

    $allAppointments = scandir("db/appointments/");
    $countAppointment = count($allAppointments);

    $appointment_id = $countAppointment - 1;

    date_default_timezone_set("Africa/Lagos");
    $register_time = date("h:i:sa");
    $register_date = date("Y-m-d");



    $appointmentDetails = [

        'id'                  =>     $appointment_id,
        'complaint'           =>     $complaint,
        'natureOfAppointment' =>     $natureOfAppointment,
        'dateOfAppointment'   =>     $dateOfAppointment,
        'firstname'           =>     $firstname,
        'lastname'            =>     $lastname,
        'email'               =>     $email,
        'timeOfAppointment'   =>     $timeOfAppointment,
        'department'          =>     $department,
        'paymentStatus'       =>     0,


    ];

    $_SESSION['appointmentDetails'] = $appointmentDetails;

    for ($counter = 0; $counter < $countAppointment; $counter++) {

                $currentAppointment = $allAppointments[$counter];

                if ($currentAppointment == $email . "-" . $department . $dateOfAppointment . ".json") {

                    $errors++;

                    
                    set_alert('email_error', 'Appointment already exist');
                    header('location: bookAppointment.php');

                    die();
                }
            }


            saveAppointment($appointmentDetails);
            // set_alert('message', 'Appointment booked successfully');
            // header('location:  dashboard.php');


        }








function saveAppointment($appointmentDetails){

    file_put_contents("db/appointments/" . $appointmentDetails['email'] . "-" . $appointmentDetails['department'] . $appointmentDetails['dateOfAppointment'] . ".json", json_encode($appointmentDetails));

}











?>