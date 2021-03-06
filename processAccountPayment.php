        <?php session_start();



        if ($_POST['Submit'] && !empty($_POST['amount'])) {

            $email = $_SESSION['userDetails']['email'];
            $firstname = $_SESSION['userDetails']['firstname'];
            $lastname = $_SESSION['userDetails']['lastname'];
            $amount = $_POST['amount'];

            $_SESSION['amount'] = $amount;



            $curl = curl_init();

            $customer_email = $email;
            $customer_firstname = $firstname;
            $customer_lastname = $lastname;
            $amount = $amount;
            $currency = "NGN";
            $txref = "rave-" . uniqid(true); // ensure you generate unique references per transaction.
            $PBFPubKey = "FLWPUBK_TEST-ec3f26a9c96cc33be8db2642715fe553-X"; // get your public key from the dashboard.
            $redirect_url = "http://localhost:8080/startng/authentication/success.php";
            $payment_options = "account";



            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'amount' => $amount,
                    'customer_email' => $customer_email,
                    'customer_firstname' => $customer_firstname,
                    'customer_lastname' => $customer_lastname,
                    'currency' => $currency,
                    'txref' => $txref,
                    'PBFPubKey' => $PBFPubKey,
                    'redirect_url' => $redirect_url,
                    'payment_options' => $payment_options

                ]),
                CURLOPT_HTTPHEADER => [
                    "content-type: application/json",
                    "cache-control: no-cache"
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            if ($err) {
                // there was an error contacting the rave API
                die('Curl returned error: ' . $err);
            }

            $transaction = json_decode($response);

            if (!$transaction->data && !$transaction->data->link) {
                // there was an error from the API
                print_r('API returned error: ' . $transaction->message);
                
            }

            // uncomment out this line if you want to redirect the user to the payment page
            //print_r($transaction->data->message);


            // redirect to page so User can pay
            // uncomment this line to allow the user redirect to the payment page
            header('Location: ' . $transaction->data->link);

        } else {
            echo "Amount is required";
            header('location: cardPayment.php');
        }
