<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (!adminLogin()) {

  header('location: login.php');
}


?>



<body>

  <div class="container">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="#">
        <h3> WELCOME ADMIN</h3>
      </a>

      <!-- Links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <h6> <a class="navbar-brand" href="logout.php">Logout</a> </h6>
        </li>
      </ul>
    </nav>
    <hr>
    <br>
    <br>
    <br>



    <?php print_error('message'); ?>

    <?php

    // "<div class= 'alert alert-success' role='alert'>" .  print_error('message') . "</div>";

    ?>


    <div class="row">
      <div class="col bg-success">
        <p><strong style="color:#ffff"> Registration time:</strong><?php echo  $_SESSION['userDetails']['reg_time'] . "<br>"; ?> </p>

      </div>
      <div class=" col bg-success">
        <p><strong style="color:#ffff"> Registration Date:</strong> <?php echo  $_SESSION['userDetails']['reg_date'] . "<br>"; ?> </p>
      </div>
      <div class="col bg-success">
        <p><strong style="color:#ffff"> Login Time:</strong><?php echo $_SESSION['userDetails']['login_time'] . "<br>"; ?> </p>
      </div>
      <div class="col bg-success">
        <p><strong style="color:#ffff"> Login Date:</strong><?php echo $_SESSION['userDetails']['login_date'] . "<br>"; ?> </p>
      </div>
    </div>


    <div class="row">
      <div class="col-sm-3 bg-warning">
        <h3>
          <p> <a href="viewPatient.php" class="navbar-brand" > View Patient </a></p>


        </h3>

      </div>
      <div class="col-sm-3 bg-warning">
        <h3>
          <p> <a href="viewStaff.php" class="navbar-brand">View Staff</a></p>
        </h3>
        <p> <a href="viewPaymentHistory.php" class="navbar-brand" style="color:#ffff">View Payment History</a></p>
      </div>
      <div class="col-sm-3 bg-warning">
        <h3>
          <p> <a href="Admin_register.php" class="navbar-brand">Add User</a></p>
        </h3>
      </div>
      <div class="col-sm-3 bg-success">
        <h3>
          <p><strong> Designation:</strong><?php echo $_SESSION['userDetails']['designation'] . "<br>"; ?> </p>
        </h3>
      </div>
    </div>


    <div class="row bg-danger">
      <div class="col-sm-3">
        <p> Last Login Time:<?php echo $_SESSION['userDetails']['logout_time'] . "<br>"; ?> </p>
      </div>

      <div class="col-sm-3">
        <p> Last Login Date:<?php echo $_SESSION['userDetails']['logout_date'] . "<br>"; ?> </p>
      </div>
    </div>







    <?php include("lib/footer.php"); ?>