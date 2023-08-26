<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/registration_db.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_customer';
    }
}



if ($action == 'login_customer') {
    
	include('customer_login.php');
} 

else if ($action == 'get_customer') {
    
	$email = filter_input(INPUT_POST, 'email');
	$email_exist = email_check($email);
	
	// checks if email exists 
	if ($email_exist['COUNT(email)'] === 0){
		
		$error = "A customer with that email address does not exist.";
        include('../errors/error.php');
	}
	
	else if ($email_exist['COUNT(email)'] == 1){
	 include('product_register.php');	
	} 
	
	

		
} else if ($action == 'product_register') {
    
	// gets php vars and puts them in the function
	$customer_id = filter_input(INPUT_POST, 'customerID');
	$product = filter_input(INPUT_POST, 'products');
	$date_time = filter_input(INPUT_POST, 'dateTime');
	
	$product_code = get_product_code($product);
	$product_code = $product_code['productCode'];
	
	$phptime = time();	
	$date_time = date('Y-m-d H:i:s', $phptime); 
  
	add_registration($customer_id, $product_code, $date_time);
	
	include('registered.php');
}
?>