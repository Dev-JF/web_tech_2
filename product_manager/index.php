<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}
  // Display the product list
if ($action == 'list_products') {
   
    $products = get_products();
  
    include('product_list.php');
	
} 
//Delete product if button pressed
else if ($action == 'delete_product') {
    
	$product_code = filter_input(INPUT_POST, 'product_code');
    
	
    delete_product($product_code);
    
	header("Location: .");
// shows the add product form
} else if ($action == 'show_add_form') {
   
	include('product_add.php');

} else if ($action == 'add_product') {
    
	$code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
    $release_date = filter_input(INPUT_POST, 'release_date');
	
	$product_exist = code_check($code);
	
	
    // Validate the inputs

   if ($code == NULL) {
        $error = "Code is required.";
        include('../errors/error.php');
    }
	else if($product_exist['COUNT(productCode)'] == 1) {
		$error = "A product with that code already exists.";
        include('../errors/error.php');
		
	}
	else if ($name == NULL){
		$error = "Name is required.";
        include('../errors/error.php');
		
	}
	else if (is_float($version) == FALSE) {
		$error = "Version must be a valid number.";
        include('../errors/error.php');
	}
	else if ($version <= 0){
		$error = "Version must be greater than 0.";
        include('../errors/error.php');
		
	}
	
	else if($release_date == NULL) {
		$error = "Release Date required.";
        include('../errors/error.php');
	}
	else if ($code != NULL && $name != NULL && $version >= 0 && is_float($version) && $release_date != NULL) {
        add_product($code, $name, $version, $release_date);
        header("Location: .");
    } 
}
?>