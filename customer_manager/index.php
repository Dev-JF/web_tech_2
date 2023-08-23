<?php
require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'search_customers';
    }
}

//instantiate variable(s)
$last_name = '';
$customers = array();

if ($action == 'search_customers') {   
    
	include('customer_search.php');
} else if ($action == 'cust') {
    $last_name = filter_input(INPUT_POST, 'last_name');
	
	

	
	include('../customer_manager/cust.php');
	
} else if ($action == 'customer_display') {
    $last_name = filter_input(INPUT_POST, 'last_name');
	
	include('../customer_manager/customer_display.php');
} else if ($action == 'update_customer') {
    
        $customer_id = filter_input(INPUT_POST, 'customerID');
	    $first_name = filter_input(INPUT_POST, 'firstName');
		$last_name = filter_input(INPUT_POST, 'lastName');
		$address = filter_input(INPUT_POST, 'address');
		$city = filter_input(INPUT_POST, 'city');
		$state = filter_input(INPUT_POST, 'state');
		$postal_code = filter_input(INPUT_POST, 'postalCode');
		$country_code = filter_input(INPUT_POST, 'countryCode');
		$phone = filter_input(INPUT_POST, 'phone');
		$email = filter_input(INPUT_POST, 'email');
		$password = filter_input(INPUT_POST, 'password');
		
    
	update_customer($first_name, $last_name,
        $address, $city, $state, $postal_code, $country_code,
        $phone, $email, $password, $customer_id);
	
	echo $first_name;
}
?>