<?php
//make the controller aware of the existence of the class
include_once (dirname(__FILE__)) . '/../classes/customer_class.php';

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

function select_all_users_ctr()
{
    // create an instance of the user class
    $user_instance = new CustomerClass();
    // call the method from the class
    return $user_instance->select_all_users();
}

function select_one_email_ctr($id){
    $selectcustomer = new CustomerClass();

    return $selectcustomer->select_one_email_class($id);
}

//check if mail exists function 
 
function verify_email($email)
{
    //create an instance of the user class
    $user_instance = new CustomerClass();
    return $user_instance->verify_email($email);
}

function insert_uploads_ctr($customer_id, $description, $files){
    //create an instance of the class
    $upload_file = new CustomerClass();
    //run the method
    return $upload_file->insert_uploads_class($customer_id, $description, $files);
}  

?>