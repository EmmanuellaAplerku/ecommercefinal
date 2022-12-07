<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

//action to remove the product
if(isset($_GET['deletePID'])){
    $pid = $_GET['deletePID'];
    $cid = $_SESSION['customer_id'] ?? null;
    $ipadd = check_ip();
    
    if(!empty($cid)){
        $removeprod=remove_from_cart_ctr($pid,$cid);
        if($removeprod){
            header('Location: ../view/cart.php');
        }

    }else{
        $removeprod = remove_from_cart_gst_ctr($pid, $ipadd);
        header('Location: ../view/cart.php');

    }

    

}

?>