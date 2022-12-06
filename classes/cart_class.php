<?php

/**
 *
 */
include_once dirname(__FILE__) . '/../settings/db_class.php';

class cart_class extends db_connection
{
    //Add to cart
    function add_to_cart_cls($pid, $cid, $quantity)
    {
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$pid', '','$cid','$quantity')";
        return $this->db_query($sql);
    }

    function add_to_cart_ip_cls($pid, $ipadd, $quantity)
    {
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`) VALUES ('$pid', '$ipadd','$quantity')";
        return $this->db_query($sql);
    }

    function select_all_cart_cls($cid)
    {
        // $sql = "SELECT * FROM `products`";
        $sql = "SELECT products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, cart.qty FROM products left join cart on products.product_id = cart.p_id WHERE cart.c_id='$cid'";
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

    //Check duplicates in cart when logged in
    function check_cart_lg_cls($p_id, $c_id)
    {
        return $this->db_fetch_one("select p_id, c_id from cart where p_id='$p_id' and c_id='$c_id'");
    }

    //Check duplicates in cart item when not logged in
    function check_cart_gst_cls($p_id, $ip_add)
    {
        return $this->db_fetch_one("select p_id, ip_add from cart where p_id='$p_id' and ip_add='$ip_add' ");
    }


    // //Customer logged in: Select all items in cart
    // function select_all_cart_lg($c_id)
    // {
    //     return $this->db_fetch_all("select products.product_id, products.product_title, products.product_price, products.product_image, cart.p_id, cart.c_id, cart.quantity from cart join products on (products.product_id = cart.p_id) where cart.c_id = '$c_id'");
    // }


    //ORDERS & PAYMENTS --------------------------------
    //Add orders
    function add_order($user_id, $invoice_no, $order_date, $order_status)
    {
        return $this->db_query(
            "insert into orders (customer_id, invoice_no, order_date, order_status) values('$user_id','$invoice_no', '$order_date', '$order_status')"
        );
    }

    //Add Order Details
    function add_order_details($order_id, $product_id, $quantity)
    {
        return $this->db_query(
            "insert into orderdetails (order_id,product_id,	qty) values('$order_id','$product_id', '$quantity')"
        );
    }
    //Get Last Order
    function get_last_order()
    {
        return $this->db_fetch_one(
            'select max(order_id) as currentOrder from orders'
        );
    }

    //Add payment
    function payment_cart(
        $amt,
        $user_id,
        $order_id,
        $currency,
        $payment_date
    ) {
        return $this->db_query(
            "insert into payment (amt,customer_id,order_id,currency,payment_date) values ('$amt','$user_id','$order_id','$currency','$payment_date')"
        );
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

    function approveOrder($order_id, $status)
    {
        return $this->db_query("update orders set order_status = '$status' where order_id='$order_id'");
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

    function clear_cart($cid)
    {
        $sql = "DELETE FROM cart WHERE c_id='$cid'";
        return $this->db_query($sql);
    }


    function select_orderDetails_admin()
    {
        return $this->db_fetch_all("select products.product_id, products.product_title, products.product_image, products.product_price, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status, orderdetails.qty, orderdetails.qty * products.product_price as result from orderdetails join products on (orderdetails.product_id = products.product_id) join orders on (orderdetails.order_id = orders.order_id)");
    }

    function select_payment_admin()
    {

        return $this->db_fetch_all("select customer.customer_name, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status, payment.amt, payment.currency, payment.payment_date, payment.pay_id from payment join orders on (orders.order_id = payment.order_id) join customer on (customer.customer_id = payment.customer_id) ");
    }


    function select_customer_uploads_cls(){
        $sql = "SELECT customer.customer_id, customer.customer_name, customer.customer_email, customer.customer_contact, customeruploads.description, customeruploads.files FROM customer join customeruploads on customer.customer_id = customeruploads.customer_id";
        return $this->db_fetch_all($sql);
    }
    
}
?>
