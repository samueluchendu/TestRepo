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





                         <a href="cardPayment.php" class="btn btn-info btn-lg" role="button">Pay Via Card</a>  <a href="accountPayment.php" class="btn btn-info btn-lg" role="button">Pay Via Account</a>
                        <!--  
                         <form action="processBill.php" method="POST" class="needs-validation" novalidate>

                            <div class="form-group">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php //echo $_SESSION['userDetails']['email']; 
                                                                                                                                    ?>" readonly>
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
                        </form>  -->




                       





                    </div>
                </div>
            </div>
        </div>
    </div>

















    <!-- 
    <form>
        <a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK_TEST-ec3f26a9c96cc33be8db2642715fe553-X" data-txref="rave-123456" data-amount="2000" data-customer_email="user@example.com" data-currency="NGN" data-pay_button_text="Pay Now" data-country="NG" data-redirect_url="http://localhost:8080/startng/authentication/webHook.php" data-payment_options="account"></a>

        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    </form> -->





    <!-- <form>
                            <a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK_TEST-ec3f26a9c96cc33be8db2642715fe553-X" data-txref="rave-123456" data-amount="2000" data-customer_email="user@example.com" data-currency="NGN" data-pay_button_text="Pay Now" data-country="NG" data-redirect_url="http://localhost:8080/startng/authentication/webHook.php" data-payment_options="card"></a>

                            <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                        </form> -->












































    <?php include("lib/footer.php");  ?>