<?php
require('../model/database.php');
include '../model/product_db.php';
include '../model/customer_db.php';
include '../model/incidents_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'customer_incident';
    }
}

if ($action == 'customer_incident') {
    // Get Customer
	$email = filter_input(INPUT_POST, 'email');
	
	// Display the customer search
	include('customer_incident.php');
	
} else if ($action == 'create_incident') {
    
	
	
	// Display the create incident page
	include('create_incident.php');
}

  else if ($action == 'incident_complete') {
	$customer_id = filter_input(INPUT_POST, 'customerID');
	$product_code = filter_input(INPUT_POST, 'productCode');
	$date_opened = filter_input(INPUT_POST, 'dtaeOpened');
	$title = filter_input(INPUT_POST, 'title');
	$description = filter_input(INPUT_POST, 'description');
	
	add_incident($customer_id, $product_code, $date_opened, $title, $description);
	
	include('incident_created.php');
}
?>