<?php
include_once dirname(__FILE__) . '/../classes/cart_class.php';

//Function to add to the cart
function add_to_cart_ctr($pid, $cid, $quantity)
{
    $cart_contr = new cart_class();
    return $cart_contr->add_to_cart_cls($pid, $cid, $quantity);
}

function add_to_cart_ip_ctr($pid, $ipadd, $quantity)
{
    $cart_contr = new cart_class();
    return $cart_contr->add_to_cart_ip_cls($pid, $ipadd, $quantity);
}

//This function displays all products placed in the cart
function select_one_cart_ctr($prod_id, $cid)
{
    $show_one_cart = new cart_class();
    return $show_one_cart->select_one_cart_cls($prod_id, $cid);
}

function select_all_cart_ctr($cid)
{
    $show_cart = new cart_class();
    return $show_cart->select_all_cart_cls($cid);
}
function select_all_cart_gst_ctr($ip_add)
{
    $show_cart = new cart_class();
    return $show_cart->select_all_cart_gst_cls($ip_add);
}

//This function removes a product from the cart when the customer is logged in
function remove_from_cart_ctr($pid, $cid)
{
    $remove_cart = new cart_class();
    return $remove_cart->remove_from_cart_cls($pid, $cid);
}
//This function removes a product from the cart when the customer is logged in
function remove_from_cart_gst_ctr($pid, $ipadd)
{
    $remove_cart = new cart_class();
    return $remove_cart->not_logged_remove_from_cart_cls($pid, $ipadd);
}

function update_quant_ctr($pid, $newquant, $cid)
{
    $update_quant = new cart_class();
    return $update_quant->update_quant_cls($pid, $newquant, $cid);
}

//Check duplicates in cart controller when logged in
function check_cart_lg_ctr($p_id, $c_id)
{
    //create instance of the cart class
    $cart_duplicate = new cart_class();
    //calls method from Cart class
    return $cart_duplicate->check_cart_lg_cls($p_id, $c_id);
}

//Guest: Check duplicates in cart item controller
function check_cart_gst_ctr($p_id, $ip_add)
{
    //create instance of the cart class
    $cart_duplicate_notlogged = new cart_class();
    //calls method from Cart class
    return $cart_duplicate_notlogged->check_cart_gst_cls($p_id, $ip_add);
}

function sum_all_cart_ctr($cid)
{
    $calc_total = new cart_class();
    return $calc_total->sum_all_cart_cls($cid);
}

function email_ctr($cid)
{
    $calc_total = new cart_class();
    return $calc_total->email_cls($cid);
}

function sum_pending_orders_ctr()
{
    $sum_orders = new cart_class();
    return $sum_orders->sum_pending_orders_cls();
}

function count_orders_ctr()
{
    $count_orders = new cart_class();
    return $count_orders->count_orders_cls();
}

function count_products_ctr()
{
    $count_products = new cart_class();
    return $count_products->count_products_cls();
}

function approve_order_controller($order_id, $order_status){
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->approveOrder($order_id, $order_status);
}


function sum_approved_orders_ctr()
{
    $sum_approved_orders = new cart_class();
    return $sum_approved_orders->sum_approved_orders_cls();
}

function select_order_admin_ctr()
{
    $select_order_admin = new cart_class();
    return $select_order_admin->select_order_admin_cls();
}

//ORDERS & PAYMENTS ------------------------------

function add_order_controller($user_id, $invoice_no, $order_date, $order_status)
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->add_order(
        $user_id,
        $invoice_no,
        $order_date,
        $order_status
    );
}

function select_customer_uploads_ctr(){
    $cart_instance = new cart_class();
    return $cart_instance->select_customer_uploads_cls();
}


function add_order_details_controller($order_id, $product_id, $qty)
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->add_order_details($order_id, $product_id, $qty);
}

function get_last_order_controller()
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->get_last_order();
}

function payment_cart_controller(
    $amount,
    $user_id,
    $order_id,
    $currency,
    $payment_date
) {
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->payment_cart(
        $amount,
        $user_id,
        $order_id,
        $currency,
        $payment_date
    );
}

function clear_cart_controller($user_id)
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->clear_cart($user_id);
}

function select_payment_admin_controller()
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->select_payment_admin();
}

function select_orderDetails_admin_controller()
{
    //create instance of the cart class
    $cart_instance = new cart_class();
    //calls method from cart class
    return $cart_instance->select_orderDetails_admin();
}



?>
