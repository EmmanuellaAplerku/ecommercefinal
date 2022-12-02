<?php

/**
 * Manages the database functions
 */
include_once '../settings/db_class.php';

class product_class extends db_connection
{
    //Inserts brands
    function add_brand_cls($ella_brand)
    {
        $mysql = "INSERT INTO `brands`(`brand_name`) VALUES ('$ella_brand')";
        return $this->db_query($mysql);
    }
    //Select All brands
    function select_all_brands_cls()
    {
        $mysql = 'SELECT * FROM `brands`';
        return $this->db_fetch_all($mysql);
    }
    //Select One brand
    function select_one_brand_cls($brd_id)
    {
        $mysql = "SELECT `brand_name`,`brand_id` FROM `brands` WHERE `brand_id`='$brd_id'";
        return $this->db_fetch_one($mysql);
    }
    //Update Brand
    function update_one_brand_cls($brd_id, $ella_brand)
    {
        $mysql = "UPDATE `brands` SET `brand_name`='$ella_brand'WHERE `brand_id`=$brd_id";
        return $this->db_query($mysql);
    }

    //Delete brand
    function delete_brand_cls($brd_id)
    {
        $sql = "DELETE FROM `brands` WHERE brand_id = '$brd_id'";
        return $this->db_query($sql);
    }

    //Add Category
    function add_category_cls($category)
    {
        $mysql = "INSERT INTO `categories`(`cat_name`) VALUES ('$category')";
        return $this->db_query($mysql);
    }

    //Select All Category
    function select_all_categories_cls()
    {
        $mysql = 'SELECT * FROM `categories`';
        return $this->db_fetch_all($mysql);
    }

    //Select One Category
    function select_one_category_cls($ctg_id)
    {
        $mysql = "SELECT `cat_name`,`cat_id` FROM `categories` WHERE `cat_id`='$ctg_id'";
        return $this->db_fetch_one($mysql);
    }

    //Update Category
    function update_one_category_cls($ctg_id, $category)
    {
        $mysql = "UPDATE `categories` SET `cat_name` = '$category' WHERE `cat_id`=$ctg_id";
        return $this->db_query($mysql);
    }

    //Delete brand
    function delete_category_cls($ctg_id)
    {
        $sql = "DELETE FROM `categories` WHERE cat_id = '$ctg_id'";
        return $this->db_query($sql);
    }

    //Add Product
    function add_product_cls(
        $product_cat,
        $product_brand,
        $product_title,
        $product_price,
        $product_desc,
        $product_image,
        $product_key
    ) {
        $mysql = "INSERT INTO `products` (`product_cat`,`product_brand`,`product_title`,`product_price`,`product_desc`,`product_image`,`product_keywords`)
        VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_key')";
        return $this->db_query($mysql);
    }

    function select_all_products_cls()
    {
        $mysql =
            'SELECT brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id, products.product_id, products.product_cat, products.product_brand, products.product_title, products.product_price, products.product_desc, products.product_image, products.product_keywords from products join brands on (products.product_brand = brands.brand_id) join categories on (products.product_cat = categories.cat_id)';

        return $this->db_fetch_all($mysql);
    }

    function select_one_product_cls($prod_id)
    {
        $mysql = "SELECT `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`,
		`products`.`product_title`,`products`.`product_id`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`product_keywords`
		 from `products`
		JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`)
		JOIN categories ON (`products`.`product_cat` = `categories`.`cat_id`)
		WHERE `products`.`product_id` = '$prod_id'";
        return $this->db_fetch_one($mysql);
    }

    function update_product_cls(
        $prod_id,
        $category,
        $ella_brand,
        $prod_title,
        $prod_pri,
        $prod_desc,
        $prod_key
    ) {
        $mysql = "UPDATE `products` SET product_cat='$category', product_brand ='$ella_brand', product_title='$prod_title', 
        product_price='$prod_pri', product_desc='$prod_desc', product_keywords='$prod_key'
        WHERE product_id='$prod_id'";

        return $this->db_query($mysql);
    }

    function search_product_cls($title)
    {
        $sql = "SELECT * FROM products WHERE product_title LIKE '%$title%'";
        return $this->db_fetch_all($sql);
    }

    function delete_product_cls($prod_id)
    {
        $sql = "DELETE FROM `products` WHERE product_id = '$prod_id'";
        return $this->db_query($sql);
    }
}
?>

