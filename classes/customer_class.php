<?php
include_once (dirname(__FILE__)) . '/../settings/db_class.php';



class CustomerClass extends db_connection
{
    //--INSERT--//
    function addcustomer_class($fullname, $email, $password, $country, $city, $contact, $role){
        //write the sql query

        $sql = "INSERT INTO customer (`customer_name` , `customer_email` , `customer_pass` , `customer_country` , `customer_city` , `customer_contact` , `user_role`) VALUES 
        ('$fullname' , '$email' , '$password' , '$country' , '$city' , '$contact' , '$role')";

        //execute the sql query
        return $this->db_query($sql);
    }
    
     //Login
    function select_one_customer_class($email){
		$sql= "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
		return $this->db_fetch_one($sql);
    
    }

    function select_one_email_class($id){
      $sql= "SELECT `customer_email` FROM `customer` WHERE `customer_id` = '$id'";
      return $this->db_fetch_one($sql);
      }
  
}