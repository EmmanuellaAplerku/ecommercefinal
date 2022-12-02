<?php
include("../settings/core.php");
include ("../controllers/product_controller.php");

//action to remove the product
if(isset($_POST['delete_prod'])){
   
     
    $prod_id = $_POST['product_id'];
   
    
  
    $delprod=delete_product_ctr($prod_id);
    if($delprod){
    header('Location: ../admin/viewproduct.php');
    }

}

?>