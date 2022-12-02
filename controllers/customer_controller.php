<?php
//make the controller aware of the existence of the class
include_once('../classes/customer_class.php');

//--INSERT--//
function addcustomer_ctr($fullname, $email, $password, $country, $city, $contact, $role){
    //create an instance of the class
    $add_item = new CustomerClass();


//run the method
    return $add_item->addcustomer_class($fullname, $email, $password, $country, $city, $contact, $role);
}  
//Login
function select_one_customer_ctr($email){
    //create an instance of the class
    $selectcustomer = new CustomerClass();

    return $selectcustomer->select_one_customer_class($email);

}


function select_one_email_ctr($id){
    $selectcustomer = new CustomerClass();

    return $selectcustomer->select_one_email_class($id);

}