<?php
function add_registration($customer_id, $product_code, $date_time) {
    global $db;
    $query = 'INSERT INTO registrations
                 (customerID, productCode, registrationDate)
              VALUES
                 (:customer_id, :product_code, :date_time)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':product_code', $product_code);
    $statement->bindValue(':date_time', $date_time);
	$statement->execute();
    $statement->closeCursor();
}


function get_product_code($product_name){
	global $db;
    $query = 'SELECT * FROM products
              WHERE name = :product_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_name', $product_name);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
    
}




?>


