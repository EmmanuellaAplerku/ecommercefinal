<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

if(isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    if(isset($_POST['updateQty'])){
        $product_id = $_POST['prod_id'];
        // select the item
        $get_item = select_one_cart_ctr($product_id, $cid);
        foreach($get_item as $item){
            $oldQty = $item['qty'];
            $newQty = $_POST['qty'];
            // update the item with the new quantity
            $result = update_quant_ctr($product_id, $newQty, $cid);
            if($result){
                // echo "quantity updated: `{$newQty}`";
                header("Location:../view/cart.php");
            }else{
                echo "failed to update";
            }
        }
    }
}




?>