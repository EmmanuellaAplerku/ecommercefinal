<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

//get the updated value and pass into t
if(isset($_GET['product_id'])){
    // echo "2";
    $quantity = 1;
    $pid = $_GET['product_id'];
    $cid = $_SESSION['customer_id'];
  
  
    $add_cart=add_to_cart_ctr($pid,$cid,$quantity);
    if($add_cart){
        // echo 'added';
        header('Location: ../view/cart.php');
    }

    
}

?>