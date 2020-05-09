<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (!staffLogin()) {

     header('location: login.php');
}

?>



<body>

     <div class="container">

          <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
               
               <a class="navbar-brand" href="#">
                    <h3> WELCOME STAFF</h3>
               </a>

              
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


          <?php
          if (isset($_SESSION['success'])) {

               echo "<span style='color:green';>" . $_SESSION['success'] . "</span><br>";
               unset($_SESSION['success']);
          }
          ?>



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
                         <p> <a href='viewAppointment.php' style="color:#ffff">View Appointment</a></p>
                    </h3>
                 
               </div>
               <div class="col-sm-3 bg-warning">
                    <h3>
                         <p> Name:<?php echo $_SESSION['userDetails']['firstname']; ?> </p>
                    </h3>
               </div>
               <div class="col-sm-3 bg-warning">
                    <h3>
                         <p> Department: <?php echo $_SESSION['userDetails']['department']; ?> </p>
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