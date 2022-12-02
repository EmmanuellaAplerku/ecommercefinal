<?php
include ('../controllers/product_controller.php');

/**
 * Take data from category
 */
if (isset($_POST['addCategory'])){
    $category = $_POST['category'];
    

    $result = add_category_ctr($category);
    
    if ($result)
    {
       echo"Category Added";
       header('location:../admin/admin_categories.php');
        }
    
    else{
            echo"Failed To Add Category";
        }
        
}

//Editing the category
if (isset($_POST['updateCategory'])){
    $category = $_POST['category'];
    $ctg_id = $_POST['cat_id'];

    $edit = update_category_ctr($ctg_id,$category);
   
    
    if ($edit)
    {
       echo"Category Edit";
       header('location:../admin/admin_categories.php');
        }
    
    else{
            echo"Failed To Edit Category";
        }
        
}

        
//Delete category
if (isset($_GET['deleteCatID'])){
    $ctg_id = $_GET['deleteCatID'];
   

    $del = delete_category_ctr($ctg_id);
   
    
    if ($del)
    {
       echo"Category Deleted";
       header('location:../admin/admin_categories.php');
        }
    
    else{
            echo"Failed To Delete Category";
        }
        
}
     

?>

?>
    