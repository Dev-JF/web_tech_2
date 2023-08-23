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
    // ???
	include('technician_add.php');
} else if ($action == 'add_technician') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
	$password = filter_input(INPUT_POST, 'password');
	
	add_technician($firstName, $lastName, $email, $phone, $password);
}
?>