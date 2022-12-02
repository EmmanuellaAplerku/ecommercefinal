<?php
session_start();

//making the action aware of the controller
include("../controllers/customer_controller.php");

//Retrieving and comparing the register data with login data when the login button is clicked
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $result = select_one_customer_ctr($email);
    $encryptedpassword = $result['customer_pass'];

    //print_r($result);
    //Display an error message if the login credentials do not match what was used in the registeration form 
    $errormessage = "Ooops! Wrong login credentials";

    if (password_verify($password, $encryptedpassword) == true){
       $_SESSION['fullname'] = $result['customer_name'];
       $_SESSION['customer_email'] = $result['customer_email'];
       $_SESSION['customer_id'] = $result['customer_id'];
        $_SESSION['role'] = $result['user_role'];

        // echo $_SESSION['role'];
        // echo $_SESSION['customer_id'];


       if ($_SESSION['role']== 2) {
        header("Location: ../index.php");
    
       }

       else {
        header("Location: ../admin/admin_main.php");
        }
       

    }

    else{
    header("Location: ../Login/login.php");
        $_SESSION["error_message"] = $errormessage;
    }


}
?>