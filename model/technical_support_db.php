<?php

function get_customer_products($customer_id) {
	global $db;
    $query = 'SELECT productCode
			  FROM registrations
			  WHERE customerID = customer_id
	
	
			 ';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $registrations = $statement->fetchAll();
	$statement->closeCursor();
	return $registrations;
	
}

?>