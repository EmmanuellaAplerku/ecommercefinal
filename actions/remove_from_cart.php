<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

//action to remove the product
if(isset($_GET['deletePID'])){
    // echo "2";
    // $quantity = 1;
    $pid = $_GET['deletePID'];
    $cid = $_SESSION['customer_id'];
    
    
  
    $removeprod=remove_from_cart_ctr($pid,$cid);
    if($removeprod){
    header('Location: ../view/cart.php');
    }

}

?>