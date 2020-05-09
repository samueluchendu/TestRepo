<?php session_start();
require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (!isUserLogin()) {

    header('location: login.php');
}

if (adminLogin()) {

    header('location: login.php');
}


if (staffLogin()) {

    header('location: login.php');
}


?>



<body>

    <div class="container">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <!-- Brand/logo -->

            <h3 class="navbar-brand"> WELCOME PATIENT</h3>


            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <h6> <a class="navbar-brand"" href=" dashboard.php">Go Back</a></h6>
                </li>
                <li class="nav-item">
                    <h6> <a class="navbar-brand"" href=" logout.php">Logout</a></h6>
                </li>
            </ul>
        </nav>
        <hr>
        <br>
        <br>
        <br>



        <div class="container">
            <div class="row mb-3 mt-5">
                <div class=" mx-auto col-md-6">
                    <div class="card shadow-lg bg-white">
                        <div class="card-header bg-info">
                            <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50">Book Appointment Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="processAppointment.php" method="POST">

                                <div class="form-group">
                                    <label for="uname">First Name:</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $_SESSION['userDetails']['firstname']; ?>" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please type user name.</div>
                                    <?php print_error('firstname_error'); ?>
                                </div>



                                <div class="form-group">
                                    <label for="email">Last Name:</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $_SESSION['userDetails']['lastname']; ?>" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please type email address.</div>
                                    <?php print_error('lastname_error'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['userDetails']['email']; ?>" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please type email address.</div>
                                    <?php print_error('email_error'); ?>
                                </div>

                                <?php print_error('department_error'); ?>
                                <div class="form-group ">
                                    <label class="font-weight-bold" for="pwd">Department</label>
                                    <select name="department" class="form-control">

                                        <option value=" " class="form-control">please select</option>
                                        <option value="Laboratory" class="form-control">Laboratory</option>
                                        <option value="Radiology" class="form-control">Radiology</option>

                                    </select>


                                </div>

                                <div class="form-group">
                                    <label for="NatureOfAppointment">Nature Of Appointment:</label>
                                    <input type="text" class="form-control" name="NatureOfAppointment">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please type email address.</div>
                                    <?php print_error('nature_error'); ?>
                                </div>

                                <div class="form-group ">
                                    <label class="dateOfAppointment" for="pwd">Date Of Appointment</label>
                                    <input type="date" class="form-control" name="dateOfAppointment" required>

                                </div>

                                <div class="form-group ">
                                    <label class="TimeOfAppointment" for="pwd">Time Of Appointment</label>
                                    <input type="time" class="form-control" name="timeOfAppointment" required>

                                </div>
                                <div class="form-check">
                                    <label class="Initial-Complaintl" for="radio1">Initial Complaint:
                                        <textarea name="complaint" rows="4" cols="60" class="form-control" required></textarea>

                                    </label>
                                    <?php print_error('complaint_error'); ?>
                                </div>

                                <center class="mt-3">
                                    <input type="submit" class="btn btn-info w-50" value="Book Appointment">
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>














        <?php include("lib/footer.php"); ?>