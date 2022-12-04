<?php
include '../controllers/product_controller.php';

if (isset($_POST['addProduct'])) {
    $product_brand = $_POST['brand'];
    $product_cat = $_POST['category'];
    $product_price = $_POST['prod_pri'];
    $product_title = $_POST['prod_title'];
    $product_desc = $_POST['prod_desc'];
    $product_key = $_POST['prod_key'];
    //$product_image = NULL;

    //$product_image = $_FILES['prod_image']["tmp_name"];

    // $file = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $FileType = $_FILES['image']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    // selecting the type of file
    $permit = ['jpg', 'jpeg', 'png', 'pdf'];

    // checking the type of file
    if (in_array($fileActualExt, $permit)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = '../assets/img/products/' . $fileNameNew;
                $move = move_uploaded_file($fileTmpName, $fileDestination);
                if ($move) {
                    $addprod = add_product_ctr(
                        $product_cat,
                        $product_brand,
                        $product_title,
                        $product_price,
                        $product_desc,
                        $fileDestination,
                        $product_key
                    );

                    if ($addprod == true) {
                        header('location:../admin/admin_viewproduct.php');
                    } else {
                        header('location:../admin/product.php');
                    }
                } else {
                    echo 'not working';
                }
            } else {
                echo 'The file is large';
            }
        } else {
            echo 'An error occurred while uploading your file';
        }
    } else {
        echo 'Unfortunately you cannot upload this kind of file';
    }
}





//Edit product
if (isset($_POST['updateProduct'])) {
    $product_brand = $_POST['brand'];
    $product_cat = $_POST['category'];
    $product_price = $_POST['prod_pri'];
    $product_title = $_POST['prod_title'];
    $product_desc = $_POST['prod_desc'];
    $product_key = $_POST['prod_key'];
    $prod_id = $_POST['p_id'];
    
    $addprod = update_product_ctr(
        $prod_id,
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $product_desc,
        $product_key
    );

    if ($addprod == true) {
        header('location:../admin/admin_viewproduct.php');
    } else {
        header('location:../admin/product.php');
    }
}



// if (isset($_POST['updateProduct'])){
//     $prodd = $_POST['product'];
//     $prod_id = $_POST['editPID'];

//     $edit = update_product_ctr($prod_id,$category,$ella_brand,$prod_title,$prod_pri,$prod_desc,$prodpicture,$prod_key);
   
    
//     if ($edit)
//     {
//        echo"Product Edit";
//        header('location:../admin/admin_viewproduct.php');
//         }
    
//     else{
//             echo"Failed To Edit Product";
//         }
        
// }


//action to remove the product
if(isset($_GET['deletePID'])){
   
     
    $prod_id = $_GET['deletePID'];
   
    
  
    $delprod=delete_product_ctr($prod_id);
    if($delprod){
    header('Location: ../admin/admin_viewproduct.php');
    }

}

?>