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

            <a class="navbar-brand" href="#">
                <h3>SNH </h3>
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


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th> View Customer Payment </th>
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




            $allTransactions = scandir("db/transactions/");



            for ($counter = 2; $counter < count($allTransactions); $counter++) {

                $currentTransaction =   $allTransactions[$counter];

                $transactionContent = file_get_contents("db/transactions/" . $currentTransaction);

                $transactionContentObject = json_decode($transactionContent);


                $transactionStatusFromDB = $transactionContentObject->status;
                $transactionCustomerNameFromDB = $transactionContentObject->customerName;
                $transactionEmailFromDB = $transactionContentObject->customerEmail;
                $transactionCurrencyFromDB = $transactionContentObject->currency;
                $transactionAmountFromDB = $transactionContentObject->amount;
                $transactionRefFromDB = $transactionContentObject->transactionRef;
                $transactionTypeFromDB = $transactionContentObject->paymentType;

                $transactionDateTimeFromDB = $transactionContentObject->created_at;

            ?>
                <tbody>

                    <?php if ($transactionContentObject) {  ?>

                        <tr>
                            <td><?php echo $transactionCustomerNameFromDB  ?></td>
                            <td><?php echo  $transactionAmountFromDB ?></td>
                            <td><?php echo  $transactionCurrencyFromDB  ?></td>
                            <td><?php echo $transactionRefFromDB  ?></td>
                            <td><?php echo $transactionTypeFromDB  ?></td>
                            <td><?php echo $transactionStatusFromDB   ?></td>
                            <td><?php echo $transactionDateTimeFromDB  ?></td>
                        </tr>

                <?php }

                     else{

                         echo '<tr><td> NO PAYMENT </td></tr>';
                     }
                } ?>







                </tbody>
        </table>


    </div>











    <?php include("lib/footer.php"); ?>