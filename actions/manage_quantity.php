<?php
include("../settings/core.php");
include ("../controllers/cart_controller.php");

if(isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    // echo $cid;
    if(isset($_GET['increase_id'])){
        $product_id = $_GET['increase_id'];
        // select the item
        $get_item = select_one_cart_ctr($product_id, $cid);
        // print_r($get_item);
        foreach($get_item as $item){
            $oldQty = $item['qty'];
            $newQty = $oldQty+1;
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

//Decrease quantity
if(isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
   
    if(isset($_GET['decrease_id'])){
        $prod_id = $_GET['decrease_id'];
        //select item
        $get_prod = select_one_cart_ctr($prod_id, $cid);
        // print_r($get_prod);

        foreach($get_prod as $item){
            if ($item['qty']<=1){
                $fixedquant = 1;
                $result = update_quant_ctr($prod_id, $fixedquant, $cid);
                // $oldqty = $item['qty'];
                // $newqty = $oldqty-1;
                if($result){
                    // echo "quantity updated: `{$newqty}`";
                    header("Location:../view/cart.php");
                }else{
                    echo "failed to update";
                }
            }
            else{
                $oldqty = $item['qty'];
                $newqty = $oldqty-1;
                $result = update_quant_ctr($prod_id, $newqty, $cid);

                if($result){
                    // echo "quantity updated: `{$newqty}`";
                    header("Location:../view/cart.php");
                }else{
                    echo "failed to update";
                }

            }
        
    

        }

    }
}


?>