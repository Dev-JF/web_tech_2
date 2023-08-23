<?php
require('../model/database.php');
include '../model/product_db.php';
include '../model/customer_db.php';


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
    
	
	
	//$customers = get_customer_prodcuts($customer_id);
	
	// Display the create incident page
	include('create_incident.php');

} else if ($action == 'create_incident') {
    // ???

	
	include('create_incident.php');
}

  else if ($action == 'incident_complete') {
	echo "yolo";
}
?>