<?php
include_once dirname(__FILE__) . '/../settings/db_class.php';

class CustomerClass extends db_connection
{
    //--INSERT--//
    function addcustomer_class(
        $fullname,
        $email,
        $password,
        $country,
        $city,
        $contact,
        $role
    ) {
        //write the sql query

        $sql = "INSERT INTO customer (`customer_name` , `customer_email` , `customer_pass` , `customer_country` , `customer_city` , `customer_contact` , `user_role`) VALUES 
        ('$fullname' , '$email' , '$password' , '$country' , '$city' , '$contact' , '$role')";

        //execute the sql query
        return $this->db_query($sql);
    }

    //Login
    function select_one_customer_class($email)
    {
        $sql = "SELECT * FROM `customer` WHERE `customer_email` = '$email'";
        return $this->db_fetch_one($sql);
    }

    function select_all_users()
	{
		// return array or false
		return $this->db_fetch_all("select * from customer where user_role='2'");
	}


    function select_one_email_class($id)
    {
        $sql = "SELECT `customer_email` FROM `customer` WHERE `customer_id` = '$id'";
        return $this->db_fetch_one($sql);
    }

    function verify_email($email)
	{
		return $this->db_fetch_one("select customer_email from customer WHERE customer_email = '$email'");
	}

  function insert_uploads_class($customer_id, $description, $files){
    $sql= "INSERT INTO `customeruploads` (`customer_id`, `description`, `files`) VALUES ('$customer_id', '$description', '$files')";
    return $this->db_query($sql);
  }

  


    
}
