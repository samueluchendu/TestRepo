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
                <tr>
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
                </tr>
            </thead>

            <?php

            //Getting Logged in user
            $customerName = $_SESSION['userDetails']['firstname'] . " " . $_SESSION['userDetails']['lastname'];


            // Getting all users transaction
            $allTransactions = scandir("db/transactions/");


            //Looping through users Transaction

                  
            for ($counter = 2; $counter < count($allTransactions); $counter++) {

                $currentTransaction =   $allTransactions[$counter];

                //Getting Content from the folder
                $transactionContent = file_get_contents("db/transactions/" . $currentTransaction);

                //Decoding Json Object
                $transactionContentObject = json_decode($transactionContent);


                //Getting individual Content  of the Json Object
                $transactionStatusFromDB       = $transactionContentObject->status;
                $transactionCustomerNameFromDB = $transactionContentObject->customerName;
                $transactionEmailFromDB        = $transactionContentObject->customerEmail;
                $transactionCurrencyFromDB     = $transactionContentObject->currency;
                $transactionAmountFromDB       = $transactionContentObject->amount;
                $transactionRefFromDB          = $transactionContentObject->transactionRef;
                $transactionTypeFromDB         = $transactionContentObject->paymentType;

                $transactionDateTimeFromDB     = $transactionContentObject->created_at;

            ?>
                <tbody>
                    <!-- Getting Transaction of Particular User and Displaying Transaction details in Table-->
                    <?php if ($transactionCustomerNameFromDB ==  $customerName) {  ?>

                        <tr>
                            <td><?php echo $transactionCustomerNameFromDB  ?></td>
                            <td><?php echo  $transactionAmountFromDB ?></td>
                            <td><?php echo  $transactionCurrencyFromDB  ?></td>
                            <td><?php echo $transactionRefFromDB  ?></td>
                            <td><?php echo $transactionTypeFromDB  ?></td>
                            <td><?php echo $transactionStatusFromDB   ?></td>
                            <td><?php echo $transactionDateTimeFromDB  ?></td>
                        </tr>

                    <?php } else { ?>

                        <tr>
                            <td colspan="8"><?php require_once('false.php') ?></td>
                        </tr>

                <?php  }
                } ?>







                </tbody>
        </table>





    </div>





    <?php include("lib/footer.php");  ?>