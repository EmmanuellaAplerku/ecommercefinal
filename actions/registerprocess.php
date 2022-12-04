<?php

//making the action aware of the controller
require '../controllers/customer_controller.php';

//collecting form data
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $role = 2;

    //insert user into database
    if ($fullname && $email && $contact && $password !== '') {
        $verify_email = verify_email($email);

        if ($verify_email) {
            echo "<script type='text/javascript'> alert('Email already exists');              
            window.history.back();
            </script>";
        } else {
            $result = addcustomer_ctr(
                $fullname,
                $email,
                $password,
                $country,
                $city,
                $contact,
                $role
            );

            if ($result) {
                header('Location: ../Login/login.php');
            } else {
                echo 'failed to save';
            }
        }
    }
}

?>
