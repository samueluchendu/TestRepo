<?php session_start();


require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");

if (!isUserLogin()) {

      header('location: login.php');
}


if (adminLogin()) {

      header('location: admin_dashboard.php');
}


if (staffLogin()) {

      header('location: staff_dashboard.php');
}
?>




<body>



      <div class="container">

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">


                  <h3 class="navbar-brand"> WELCOME PATIENT</h3>



                  <ul class="navbar-nav">
                        <li class="nav-item">
                              <h6> <a class="navbar-brand"" href=" logout.php">Logout</a></h6>
                        </li>
                  </ul>
            </nav>
            <hr>
            <br>
            <br>
            <br>
            <br>


            <?php echo print_error('message'); ?>
            <?php echo print_error('success'); ?>


            <div class="row">
                  <div class="col bg-success">
                        <p><strong style="color:#ffff"> Registration time:</strong><?php echo  $_SESSION['userDetails']['reg_time']; ?> </p>

                  </div>
                  <div class=" col bg-success">
                        <p><strong style="color:#ffff"> Registration Date:</strong> <?php echo  $_SESSION['userDetails']['reg_date']; ?> </p>
                  </div>
                  <div class="col bg-success">
                        <p><strong style="color:#ffff"> Login Time:</strong> <?php echo $_SESSION['userDetails']['login_time']; ?> </p>
                  </div>
                  <div class="col bg-success">
                        <p><strong style="color:#ffff"> Login Date:</strong><?php echo $_SESSION['userDetails']['login_date']; ?> </p>
                  </div>
            </div>


            <div class="row">
                  <div class="col-sm-3 bg-success">
                        <h3>
                              <p> <a href="bookAppointment.php" style="color:#ffff">Book Appointment</a></p>
                        </h3>
                        <p> <a href="patientPaymentHistory.php" style="color:#ffff">View Payment History</a></p>
                  </div>

                  <div class="col-sm-3 bg-warning">
                        <h3>
                              <p><a href="payBill.php" style="color:#ffff">Pay Bill</a> </p>
                        </h3>
                  </div>
                  <div class="col-sm-3 bg-warning">
                        <h3>
                              <p> Name:<?php echo $_SESSION['userDetails']['firstname']; ?> </p>
                        </h3>
                  </div>

                  <div class="col-sm-3 bg-success">
                        <h3>
                              <p><strong> Designation:</strong><?php echo $_SESSION['userDetails']['designation']; ?> </p>
                        </h3>
                  </div>
            </div>




            <div class="row bg-danger">
                  <div class="col-sm-3">
                        <p> Last Login Time:<?php echo $_SESSION['userDetails']['logout_time']; ?> </p>
                  </div>

                  <div class="col-sm-3">
                        <p> Last Login Date:<?php echo $_SESSION['userDetails']['logout_date']; ?> </p>
                  </div>
            </div>






            <?php include("lib/footer.php"); ?>