<?php session_start();
require_once('functions/users.php');





        $email = $_SESSION['userDetails']['email'];







        $all_users = scandir("db/user/");
        $count_users = count($all_users);

        date_default_timezone_set("Africa/Lagos");


        $login_time = date("h:i:sa");
        $login_date = date("Y-m-d");




        userLogout($email);



        header('location: login.php');







?>




