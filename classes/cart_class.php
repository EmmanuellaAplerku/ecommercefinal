<?php

/**
 *
 */
include_once (dirname(__FILE__)) . '/../settings/db_class.php';

class cart_class extends db_connection
{
    //Add to cart
    function add_to_cart_cls($pid, $cid, $quantity)
    {
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$pid', '','$cid','$quantity')";
        return $this->db_query($sql);
    }

    function select_all_cart_cls($cid)
    {
        // $sql = "SELECT * FROM `products`";
        $sql = "SELECT products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, cart.qty FROM products left join cart on products.product_id = cart.p_id WHERE cart.c_id=$cid";
        return $this->db_fetch_all($sql);
    }
    function select_one_cart_cls($prod_id, $cid)
    {
        $mysql = "SELECT * FROM `cart` WHERE p_id = '$prod_id' AND c_id='$cid'";
        return $this->db_fetch_all($mysql);
    }
    //Remove from cart when customer is logged in
    function remove_from_cart_cls($pid, $cid)
    {
        $sql = "DELETE FROM `cart` WHERE p_id = '$pid' AND c_id = '$cid'";
        return $this->db_query($sql);
    }
    //Remove from cart when customer is not logged in
    function not_logged_remove_from_cart_cls($pid, $ipadd)
    {
        $sql = "DELETE FROM `cart` WHERE p_id = '$pid' AND ip_add = '$ipadd'";
        return $this->db_query($sql);
    }
    //Update product quantity in cart
    function update_quant_cls($pid, $newquant, $cid)
    {
        $sql = "UPDATE `cart` SET qty = '$newquant' WHERE p_id='$pid' AND c_id='$cid'";
        return $this->db_query($sql);
    }

    //Sum of items in the cart when customer is logged in
    function sum_all_cart_cls($cid)
    {
        return $this->db_fetch_one(
            "SELECT sum(products.product_price * cart.qty) as total from `cart` join `products` on (products.product_id = cart.p_id) where cart.c_id = '$cid'"
        );
    }

    function email_cls($c_id)
    {
        $sql = "SELECT customer.customer_email from cart inner join customer on cart.c_id=customer.customer_id where c_id=$c_id limit 1";
        return $this->db_fetch_one($sql);
    }

    function sum_pending_orders_cls()
    {
        return $this->db_fetch_one(
            "select count(order_status) as result from orders where order_status='pending'"
        );
    }

    function count_orders_cls()
    {
        return $this->db_fetch_one('select count(*) as count from orders');
    }

    function count_products_cls()
    {
        return $this->db_fetch_one('select count(*) as count from products');
    }

    function sum_approved_orders_cls()
    {
        return $this->db_fetch_one(
            "select count(order_status) as result from orders where order_status='approved'"
        );
    }

    function select_order_admin_cls()
    {
        return $this->db_fetch_all(
            'select customer.customer_id, customer.customer_name, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status from orders join customer on (customer.customer_id = orders.customer_id)'
        );
    }
}
?>
