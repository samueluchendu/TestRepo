<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (!adminLogin()) {

    header('location: login.php');
}




$allStaff = scandir("db/user/");





?>



<body>

    <div class="container">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
          
            <a class="navbar-brand" href="#">
                <h3> View Staff</h3>
            </a>

            <a class="navbar-brand" href="Admin_dashboard.php">
                <h4> Go Back</h4>
            </a>


            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                   <h4> <a class="navbar-brand" href="logout.php">Logout</a></h4>
                </li>
            </ul>
        </nav>
        <br>
        <br>
        <br>
        <!-- <hr> -->


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Designation</th>
                </tr>
            </thead>

            <?php


            for ($counter = 2; $counter < count($allStaff); $counter++) {

                $currentStaff = $allStaff[$counter];

                $staffContent = file_get_contents("db/user/" . $currentStaff);

                $staffContentObject = json_decode($staffContent);

            


                $staffDesignationFromDB = $staffContentObject->designation;

                $staffFirstNameFromDB = $staffContentObject->firstname;
                $staffLastNameFromDB = $staffContentObject->lastname;
                $staffEmailFromDB = $staffContentObject->email;
                $staffDepartmentFromDB = $staffContentObject->department;;

            ?>
                <tbody>


                    <?php if ($staffDesignationFromDB == "Staff") { ?>


                        <tr>
                            <td><?php echo $staffFirstNameFromDB    ?></td>
                            <td><?php echo $staffLastNameFromDB    ?></td>
                            <td><?php echo $staffEmailFromDB    ?></td>
                            <td><?php echo $staffDepartmentFromDB    ?></td>
                            <td><?php echo $staffDesignationFromDB   ?></td>
                        </tr>

                <?php }
                } ?>


            





                </tbody>
        </table>


    </div>









 

<?php include("lib/footer.php"); ?>