<?php
include_once("../classes/cart_class.php");

//Function to add to the cart
function add_to_cart_ctr($pid,$cid,$quantity){
    $cart_contr= new cart_class();
    return $cart_contr->add_to_cart_cls($pid,$cid,$quantity);
}

//This function displays all products placed in the cart
function select_one_cart_ctr($prod_id, $cid){
    $show_one_cart = new cart_class();
    return $show_one_cart->select_one_cart_cls($prod_id, $cid);
}

function select_all_cart_ctr($cid){
    $show_cart = new cart_class();
    return $show_cart->select_all_cart_cls($cid);
}

//This function removes a product from the cart when the customer is logged in
function remove_from_cart_ctr($pid,$cid){
    $remove_cart = new cart_class();
    return $remove_cart->remove_from_cart_cls($pid,$cid);
}

function update_quant_ctr($pid, $newquant, $cid){
    $update_quant = new cart_class();
    return $update_quant->update_quant_cls($pid, $newquant, $cid);
}

function sum_all_cart_ctr($cid){
    $calc_total = new cart_class();
    return $calc_total->sum_all_cart_cls($cid);
}

function email_ctr($cid){
    $calc_total = new cart_class();
    return $calc_total->email_cls($cid);
}

function sum_pending_orders_ctr(){
    $sum_orders = new cart_class();
    return $sum_orders->sum_pending_orders_cls();
}

function count_orders_ctr(){
    $count_orders = new cart_class();
    return $count_orders->count_orders_cls();
}

function count_products_ctr(){
    $count_products = new cart_class();
    return $count_products->count_products_cls();
}

function sum_approved_orders_ctr(){
    $sum_approved_orders = new cart_class();
    return $sum_approved_orders->sum_approved_orders_cls();
}

function select_order_admin_ctr(){
    $select_order_admin = new cart_class();
    return $select_order_admin->select_order_admin_cls();
}

?>