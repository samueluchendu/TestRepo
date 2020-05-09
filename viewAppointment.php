<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");



if (!staffLogin()) {

    header('location: login.php');
}


$staffDepartment = $_SESSION['userDetails']['department'];

$allAppointments = scandir("db/appointments/");

?>


<body>

    <div class="container">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <h3> View Appointment</h3>
            </a>

            <a class="navbar-brand" href="staff_dashboard.php">
                <h4> Go Back</h4>
            </a>


            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- <hr> -->

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Date Of Appointment</th>
                    <th>Nature of Appointment</th>
                    <th>Initial Complaint</th>
                    <th>Department</th>
                    <th>Payment Status</th>
                </tr>
            </thead>

            <?php



            for ($counter = 2; $counter < count($allAppointments); $counter++) {

                $currentAppointments = $allAppointments[$counter];

                $Appointmentcontent = file_get_contents("db/appointments/" . $currentAppointments);

                $AppointmentcontentObject = json_decode($Appointmentcontent);


                $patientDepartmentFromDB  = $AppointmentcontentObject->department;
                $patientFirstNameFromDB   = $AppointmentcontentObject->firstname;
                $patientLastNameFromDB    = $AppointmentcontentObject->lastname;


                $patientDateOfAppointmentFromDB   = $AppointmentcontentObject->dateOfAppointment;
                $patientNatureOfAppointmentFromDB = $AppointmentcontentObject->natureOfAppointment;
                $patientComplaintFromDB           = $AppointmentcontentObject->complaint;
                $patientPaymentStatusFromDB       = $AppointmentcontentObject->paymentStatus;






                if ($patientDepartmentFromDB == $staffDepartment) {
            ?>

                    <tbody>

                        <tr>
                            <td> <?php echo  $patientFirstNameFromDB; ?></td>
                            <td> <?php echo $patientLastNameFromDB; ?></td>
                            <td> <?php echo  $patientDateOfAppointmentFromDB; ?></td>
                            <td> <?php echo $patientNatureOfAppointmentFromDB; ?></td>
                            <td><?php echo $patientComplaintFromDB; ?></td>
                            <td><?php echo $patientDepartmentFromDB; ?></td>
                            <td>
                                <?php

                                if ($patientPaymentStatusFromDB == 0) {
                                    echo 'Not Paid';
                                } else {

                                    echo 'Paid';
                                }

                                ?>

                            </td>

                        </tr>

                <?php }
            }  ?>



                    </tbody>
        </table>


    </div>




    <?php include("lib/footer.php"); ?>