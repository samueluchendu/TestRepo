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

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

        <h3> <a class="navbar-brand" href="#">SNH</a> </h3>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <h4> <a class="navbar-brand">Pay Bill</a></h4>
            </li>

        </ul>
    </nav>


    <br>
    <br>


    <div class="container">
        <div class="row mb-3 mt-5">
            <div class=" mx-auto col-md-6">
                <div class="card shadow-lg bg-white">
                    <div class="card-header bg-info">
                        <h2 class="card-title text-center font-weight-bolder text-uppercase text-white-50">Pay Bill</h2>

                    </div>
                    <div class="card-body">



                        <form action="processCardPayment.php" method="POST" class="needs-validation" novalidate>

                            <div class="form-group">
                                <label class="font-weight-bold" for="email">First Name</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Name" name="fname" value="<?php echo $_SESSION['userDetails']['firstname']; ?>" readonly>
                                <div class="valid-feedback">Valid.</div>

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="text" class="form-control"  placeholder="Enter Lastname" name="email" value="<?php echo $_SESSION['userDetails']['lastname']; ?>" readonly>
                                <div class="valid-feedback">Valid.</div>

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $_SESSION['userDetails']['email']; ?>" readonly>
                                <div class="valid-feedback">Valid.</div>

                            </div>

                            <div class="form-group ">
                                <label class="font-weight-bold" for="pwd">Enter Amount</label>
                                <input type="text" class="form-control" id="pwd" placeholder="Enter Amount" name="amount" required>
                                <div class="valid-feedback">Valid.</div>

                            </div>


                            <center class="mt-3">
                                <input type="submit" name="Submit" class="btn btn-info w-50" value="Pay">
                            </center>
                        </form>






                    </div>
                </div>
            </div>
        </div>
    </div>























    <?php include("lib/footer.php");  ?>