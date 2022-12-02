<?php

//making the action aware of the controller
require("../controllers/customer_controller.php");


//collecting form data
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $role = 1;


    $result = addcustomer_ctr($fullname, $email, $password, $country, $city, $contact, $role);

    if($result){
        header("Location: ../Login/login.php");
    } else {
        echo "failed to save";
    }

}



?>