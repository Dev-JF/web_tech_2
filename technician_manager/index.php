<?php
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technicians';
    }
}

if ($action == 'list_technicians') {
    // Get technician data
    $technicians = get_technicians();
    // Display the technician list
    include('technician_list.php');
} else if ($action == 'delete_technician') {
    $technician_code = filter_input(INPUT_POST, 'technician_code');
    //Delete product
    delete_technician($technician_code);
    header("Location: .");
} else if ($action == 'show_add_form') {
   
	include('technician_add.php');
} else if($action == 'technician_add'){
	
	$first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');
	
	// validates user input
	if($first_name == NULL){
		$error = "First Name is required.";
        include('../errors/error.php');
		
	}
	else if($last_name == NULL) {
		$error = "Last Name is required.";
        include('../errors/error.php');
		
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
		$error = "Email is not valid.";
        include('../errors/error.php');
		
	}
	else if($phone == NULL) {
		$error = "Phone is required.";
        include('../errors/error.php');
		
	}
	else if($password == NULL) {
		$error = "Password is required.";
        include('../errors/error.php');
		
	}
	else {
	
	add_technician($first_name, $last_name, $email, $phone, $password);
	$technicians = get_technicians();
	include('technician_list.php'); }
}
?>