<?php
include ('../controllers/product_controller.php');

/**
 * Take data from brand 
 */
if (isset($_POST['addBrand'])){
    $ella_brand = $_POST['brand'];

    $result = add_brand_ctr($ella_brand);
   
    
    if ($result)
    {
       echo"Brand Added";
       header('location:../admin/admin_brands.php');
        }
    
    else{
            echo"Failed To Add Brand";
        }
        
}
        


//Editing the brand
if (isset($_POST['updateBrand'])){
    $ella_brand = $_POST['brand'];
    $brd_id = $_POST['brand_id'];

    $edit = update_brand_ctr($brd_id,$ella_brand);
   
    
    if ($edit)
    {
       echo"Brand Edit";
       header('location:../admin/admin_brands.php');
        }
    
    else{
            echo"Failed To Edit Brand";
        }
        
}
        
//Delete brand
if (isset($_GET['deleteBrandID'])){
    $brd_id = $_GET['deleteBrandID'];
   

    $del = delete_brand_ctr($brd_id);
   
    
    if ($del)
    {
       echo"Brand Deleted";
       header('location:../admin/admin_brands.php');
        }
    
    else{
            echo"Failed To Delete Brand";
        }
        
}
     

?>