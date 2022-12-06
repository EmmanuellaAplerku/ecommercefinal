<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

//get the updated value and pass into t
if(isset($_SESSION['customer_id'])){

    if(isset($_GET['product_id'])){
        // echo "2";
        $quantity = 1;
        $pid = $_GET['product_id'];
        $cid = $_SESSION['customer_id'];
      
        // check for duplicates
        $chk_dup = check_cart_lg_ctr($pid, $cid);
        if($chk_dup){
            echo "<script> window.location.href='../view/cart.php?message=Product already in cart. Increase the quantity instead'</script>";
        }else{
            $add_cart=add_to_cart_ctr($pid,$cid,$quantity);
            if($add_cart){
                // echo 'added';
                header('Location: ../view/cart.php');
            }
        }
    
        
    }
}else{
    if(isset($_GET['product_id'])){
        // echo "2";
        $quantity = 1;
        $pid = $_GET['product_id'];
        $ip_add = check_ip();
        // echo $ip_add;
        // echo $pid;

        // check for duplicates
        $chk_dup = check_cart_gst_ctr($pid, $ip_add);

        if($chk_dup){
            echo "<script> window.location.href='../view/cart.php?message=Product already in cart. Increase the quantity instead'
            </script>";
        }else{
            $add_cart=add_to_cart_ip_ctr($pid,$ip_add,$quantity);
            if($add_cart){
                // echo 'added';
                echo "<script> window.location.href='../view/cart.php?message=Product added to cart'
            </script>";
            }
        }
    }
    // echo "hello";
}




?>