<?php session_start();

require_once('functions/alert.php');
require_once('functions/users.php');
include("lib/header.php");


if (isUserLogIn()) {

  header('location: dashboard.php');
}


if (@$_SESSION['designation'] == 'Admin') {

  header('location: admin_dashboard.php');
}

?>


<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

    <h3> <a class="navbar-brand" href="#">SNH</a> </h3>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
       <h4> <a class="navbar-brand" href="login.php">Login</a></h4>
      </li>
     
    </ul>
  </nav>


  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">

          <div class="row mb-3 mt-5">
            <div class=" mx-auto col-md-6">
              <div class="card shadow-lg bg-white">
                <div class="card-header bg-info">
                  <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50">Registration Form</h2>
                </div>
                <div class="card-body">


                  <form action="processRegister.php" method="POST" class="form-horizontal">

                    <div class="form-group">
                      <label for="firstname" class="cols-sm-2 control-label">First Name</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                          <input type="text" name="fname" class="form-control" placeholder="Enter email">

                        </div>

                        <?php print_error('firstname_error'); ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="LastName" class="cols-sm-2 control-label">Last Name</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                          <input type="text" name="lname" class="form-control" placeholder="Enter Lastname">
                        </div>

                        <?php print_error('lastname_error'); ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Gender" class="cols-sm-2 control-label">Gender</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                          <select name="gender" class="form-control">

                            <option value=" " class="form-control">please select</option>
                            <option value="Male" class="form-control">Male</option>
                            <option value="Female" class="form-control">Female</option>

                          </select>

                        </div>

                        <?php print_error('gender_error'); ?>

                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Department" class="cols-sm-2 control-label">Department</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                          <select name="department" class="form-control">

                            <option value=" " class="form-control">please select</option>
                            <option value="Laboratory" class="form-control">Laboratory</option>
                            <option value="Radiology" class="form-control">Radiology</option>

                          </select><br>
                        </div>
                        <?php print_error('department_error'); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Designation" class="cols-sm-2 control-label">Designation</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                          <select name="designation" class="form-control">

                            <option value=" " class="form-control">please select</option>
                            <option value="Staff" class="form-control">Staff</option>
                            <option value="Patient" class="form-control">Patient</option>

                          </select>
                        </div>

                        <?php print_error('designation_error'); ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="Email" class="cols-sm-2 control-label">Email</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="email" class="form-control" name="email" id="password" placeholder="Enter your Email" />
                        </div>

                        <?php print_error('email_error'); ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Password</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                          <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                        </div>

                        <?php print_error('password_error'); ?>

                      </div>
                    </div>
                    <div class="form-group ">

                      <input type="submit" name="Submit" value="Register" class="btn btn-primary btn-lg btn-block login-button">
                    </div>
                    <div class="login-register">
                     <h4> <a href="login.php">Login</a></h4>




              

                      <?php include("lib/footer.php"); ?>