<?php 

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

            <a class="navbar-brand" href="#">
                <h3> SNH</h3>
            </a>

            <a class="navbar-brand" href="dashboard.php">
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
                <!-- <tr>
                    <th> My Payment History </th>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <th>Amount Paid</th>
                    <th>Currency</th>
                    <th>Transaction Reference</th>
                    <th>Payment Mode</th>
                    <th>Payment Status</th>
                    <th>Created Date/Time</th>
                </tr> -->
            </thead>

            <tbody>
                <!-- Getting Transaction of Particular User and Displaying Transaction details in Table-->


                <tr>
                    <td colspan="8">
                        <div class="alert alert-info text-center">
                            <strong>No Payment!</strong>
                        </div>
                    </td>

                </tr>













            </tbody>
        </table>





    </div>





    <?php include("lib/footer.php");  ?>