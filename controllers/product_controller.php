<?php
//connect to the user account class
include_once("../classes/product_class.php");


//--INSERT--//
function add_brand_ctr($ella_brand)
{
    $addnewbrand= new product_class();
    return $addnewbrand->add_brand_cls($ella_brand);
}
//Select All brands
function select_all_brands_ctr(){
    $allbrands= new product_class();
    return $allbrands->select_all_brands_cls();
}
//Select One brand 
function select_one_brand_ctr($brd_id){
    $onebrand= new product_class();
    return $onebrand->select_one_brand_cls($brd_id);
}

//Update one Brand
function update_brand_ctr($brd_id,$ella_brand){
    $updt= new product_class();
    return $updt->update_one_brand_cls($brd_id,$ella_brand);

}

//Delete one brand
function delete_brand_ctr($brd_id){
  $delbrand = new product_class();
  return $delbrand->delete_brand_cls($brd_id);
}



//Categories
function add_category_ctr($category)
{
    $addnewcategory= new product_class();
    return $addnewcategory->add_category_cls($category);

}

//Select All categories
function select_all_categories_ctr(){
    $allcategories= new product_class();
    return $allcategories->select_all_categories_cls();

}

//Select One category
function select_one_category_ctr($ctg_id){
    $onecategory= new product_class();
    return $onecategory->select_one_category_cls($ctg_id);

}

//Update one category
function update_category_ctr($ctg_id,$category){
    $updtcat= new product_class();
    return $updtcat->update_one_category_cls($ctg_id,$category);

}

//Delete one category
function delete_category_ctr($ctg_id){
  $deletecat = new product_class();
  return $deletecat->delete_category_cls($ctg_id);
}


//Add Product 
function add_product_ctr($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_key){
    $addprod = new product_class();
  
    return $addprod->add_product_cls($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_key);
  }
  
  function select_one_product_ctr($prod_id){
    $selectproduct = new product_class(); 
    return  $selectproduct-> select_one_product_cls($prod_id);
  }
  function select_all_products_ctr(){
    $selectallproducts = new product_class();
    return $selectallproducts-> select_all_products_cls();
  }

  
  function update_product_ctr($prod_id,$category,$ella_brand,$prod_title,$prod_pri,$prod_desc,$prod_key){
    $updtproduct = new product_class(); 
    return  $updtproduct->update_product_cls($prod_id,$category,$ella_brand,$prod_title,$prod_pri,$prod_desc,$prod_key);
  }

  function search_product($title){
    $searchprod = new product_class(); 
    return $searchprod->search_product_cls($title);
  }

  function delete_product_ctr($prod_id){
    $deleteprod = new product_class();
    return $deleteprod->delete_product_cls($prod_id);
  }
  
?>
