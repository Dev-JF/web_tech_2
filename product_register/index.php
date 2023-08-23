<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    // ???
}

//instantiate variable(s)
$email = '';

if ($action == 'login_customer') {
    // ???
} else if ($action == 'get_customer') {
    $email = filter_input(INPUT_POST, 'email');
	
	
	 include('product_register.php');
		
} else if ($action == 'product_register') {
    $customer_id = filter_input(INPUT_POST, 'customerID');
	$product = filter_input(INPUT_POST, 'products');
	$date_time = filter_input(INPUT_POST, 'dateTime');
	
	$product_code = get_product_code($product);
	$product_code = $product_code['productCode'];
	echo $product_code;
  
	add_registration($customer_id, $product_code, $date_time);
}
?>