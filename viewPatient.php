<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (!adminLogin()) {

        header('location: login.php');
}



$allPatient = scandir("db/user/");




?>




<body>

        <div class="container">

                <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                        <!-- Brand/logo -->
                        <a class="navbar-brand" href="#">
                                <h3> View Patient</h3>
                        </a>

                        <a class="navbar-brand" href="Admin_dashboard.php">
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



                <table class="table">
                        <thead class="thead-dark">
                                <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                </tr>
                        </thead>

                        <?php


                        for ($counter = 2; $counter < count($allPatient); $counter++) {

                                $currentPatient = $allPatient[$counter];

                                $patientContent = file_get_contents("db/user/" . $currentPatient);

                                $patientContentObject = json_decode($patientContent);



                                $patientDesignationFromDB = $patientContentObject->designation;


                                $patientFirstNameFromDB = $patientContentObject->firstname;
                                $patientLastNameFromDB = $patientContentObject->lastname;
                                $patientEmailFromDB = $patientContentObject->email;


                        ?>
                                <tbody>

                                        <?php if ($patientDesignationFromDB == "Patient") {  ?>

                                                <tr>
                                                        <td><?php echo $patientFirstNameFromDB   ?></td>
                                                        <td><?php echo $patientLastNameFromDB   ?></td>
                                                        <td><?php echo  $patientEmailFromDB   ?></td>
                                                        <td><?php echo $patientDesignationFromDB   ?></td>
                                                </tr>

                                <?php }
                                } ?>







                                </tbody>
                </table>


        </div>





















        <?php include("lib/footer.php"); ?>