<?php
require('../model/database.php');
include '../model/product_db.php';
include '../model/customer_db.php';
include '../model/incidents_db.php';
require('../model/registration_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_incident';
    }
}

if ($action == 'customer_incident') {
    // Get Customer
	
	
		include('customer_incident.php');
	
} else if ($action == 'create_incident') {
    $email = filter_input(INPUT_POST, 'email');
	$email_exist = email_check($email);
	
	// checks if email exists 
	if ($email_exist['COUNT(email)'] === 0){
		
		$error = "A customer with that email address does not exist.";
        include('../errors/error.php');
	} else if ($email == NULL){
		
		$error = "Please enter an email.";
        include('../errors/error.php');
	}
		
	else if ($email_exist['COUNT(email)'] === 1){
	
	
	
	// Display the create incident page
	include('create_incident.php');}
}

  else if ($action == 'incident_complete') {
		
		$customer_id = filter_input(INPUT_POST, 'customerID');
		$product_name = filter_input(INPUT_POST, 'products');

		$title = filter_input(INPUT_POST, 'title');
		$description = filter_input(INPUT_POST, 'description');
		
		$phptime = time();	
		$date_opened = date('Y-m-d H:i:s', $phptime); 
		
		// validate if data being entered has value
		if($customer_id == NULL){
			$error = "Customer ID has no value";
			include('../errors/error.php');
			
		}
		else if($product_name == NULL) {
			$error = "Product Name has no value";
			include('../errors/error.php');
			
		}
		else if($date_opened == NULL){
			$error = "Date Opened has no value";
			include('../errors/error.php');
			
		}
		else if($title == NULL) {
			$error = "Title has no value";
			include('../errors/error.php');
			
		}
		else if($description == NULL){
			
			$error = "Description has no value";
			include('../errors/error.php');
		}
		else {
			
			
			$product = get_product_code($product_name);
			$product_code = $product['productCode'];
		
		
			add_incident($customer_id, $product_code, $date_opened, $title, $description);
	
			include('incident_created.php');
		}
}
?>