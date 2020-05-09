        <?php session_start();

        require_once('functions/alert.php');
        require_once('functions/users.php');
        require_once('functions/email.php');



        if (isset($_GET['txref'])) {
            // echo $_GET['txref'];

            $ref = $_GET['txref'];

            $amount = $_SESSION['amount']; //Correct Amount from Server
            $currency = "NGN"; //Correct Currency from Server

            $query = array(
                "SECKEY" => "FLWSECK_TEST-d051da638c2c762fb6fa4d4d6496a078-X",
                "txref" => $ref
            );

            $data_string = json_encode($query);

            $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);

            curl_close($ch);

            $resp = json_decode($response, true);

            $paymentStatus = $resp['data']['status'];
            $chargeResponsecode = $resp['data']['chargecode'];
            $chargeAmount = $resp['data']['amount'];
            $chargeCurrency = $resp['data']['currency'];
            $customerName = $resp['data']['custname'];
            $customerEmail =  $resp['data']['custemail'];
            $paymentType =  $resp['data']['paymenttype'];

            $transactionRef = $resp['data']['txref'];

            date_default_timezone_set("Africa/Lagos");

            $register_time = date("h:i:sa");
            $register_date = date("Y-m-d");



            $transactionDetails = [


                'customerName'   =>  $customerName,
                'created_at'     => $register_date . " " . $register_time,
                'status'         => $paymentStatus,
                'customerEmail'  =>  $customerEmail,
                'amount'         =>  $chargeAmount,
                'currency'       => $chargeCurrency,
                'paymentType'    =>  $paymentType,
                'transactionRef' => $transactionRef




            ];

            $_SESSION['transactionDetails'] = $transactionDetails;


            if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount) && ($chargeCurrency == $currency)) {

               

                // Send Email Notification

                // $subject = "Successful Payment Transaction";
                // $message = "Hello {$transactionDetails['customerName']}, Your payment of {$transactionDetails['amount']} was successful";

                // sendMail($subject, $message, $transactionDetails['customerEmail']);



              // /saving and redirect working fine just left with sending mail, face that tomorrow
               file_put_contents("db/transactions/" . $transactionDetails['customerEmail'] . "-" . $transactionDetails['transactionRef'] . ".json", json_encode($transactionDetails));


                      
               //Getting the Appointments and Updating the Payment Status
                    $allAppointments = scandir("db/appointments/");

                for ($counter = 2; $counter < count($allAppointments); $counter++) {

                    $currentAppointments = $allAppointments[$counter];

                    $Appointmentcontent = file_get_contents("db/appointments/" . $currentAppointments);

                    $AppointmentcontentObject =  json_decode($Appointmentcontent);
                    $AppointmentcontentArray = json_decode($Appointmentcontent, true);
                    $_SESSION['appointmentObject'] =  $AppointmentcontentArray;






                    if ($AppointmentcontentArray['email'] == $transactionDetails['customerEmail']) {



                        $_SESSION['appointmentObject']['paymentStatus'] = 1;
                        $AppointmentcontentObject->paymentStatus = 1;


                        unlink("db/appointments/" . $currentAppointments);

                        file_put_contents("db/appointments/"  .  $_SESSION['appointmentObject']['email'] . "-" . $_SESSION['appointmentObject']['department'] . $_SESSION['appointmentObject']['dateOfAppointment'] . ".json", json_encode($AppointmentcontentObject));
                    }
                }

                set_alert('success', 'Transaction successfully');
               header('location: dashboard.php');
                die();

            } else {

                //Dont Give Value and return to Failure page
               
                header('location: dashboard.php');
            }
        }
        //  else {
        // //continue with payment status tomorrow
        //     die('No reference supplied');
        // }

        ?>






