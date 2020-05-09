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
        <h3> Add User</h3>
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


    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <header class="card-header">
            <a href="Admin_dashboard.php" class="float-right btn btn-outline-primary mt-3">Go Back</a>
            <h4 class="card-title mt-3">Sign up</h4>
          </header>
          <article class="card-body">
            <form action="AdminProcessRegister.php" method="POST">

              <div class="form-row">
                <div class="col form-group">
                  <label>First name </label>
                  <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
                  <?php print_error('firstname_error'); ?>
                </div> <!-- form-group end.// -->

                <div class="col form-group">
                  <label>Last name</label>
                  <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
                  <?php print_error('lastname_error'); ?>
                </div> 
              </div> 

              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
                <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                <?php print_error('email_error'); ?>
              </div>
             


              <div class="form-group">

                <label for="gender">Department</label>
                <select name="department" class="form-control">
                  <option value=" "> Choose...</option>
                  <option value="Radiology">Radiology</option>
                  <option value="Laboratory">Laboratory</option>

                </select>
                <?php print_error('department_error'); ?>
              </div> <!-- form-group end.// -->



              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="gender">Gender</label>
                  <select name="gender" class="form-control">
                    <option value=" "> Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>

                  </select>
                  <?php print_error('gender_error'); ?>
                </div> <!-- form-group end.// -->

                <div class="form-group col-md-6">
                  <label for="designation">Designation</label>
                  <select name="designation" class="form-control">
                    <option value=" "> Choose...</option>
                    <option value="Staff">Staff</option>
                    <option value="Patient">Patient</option>

                  </select>
                  <?php print_error('designation_error'); ?>
                </div> <!-- form-group end.// -->

              </div> <!-- form-row.// -->


              <div class="form-group">
                <label for="password"> Password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter Password">
                <?php print_error('password_error'); ?>
              </div> <!-- form-group end.// -->

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="submit"> Register </button>
              </div> <!-- form-group// -->
              <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
            </form>








           <?php include("lib/footer.php"); ?>