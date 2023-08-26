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


function email_check($email) {
    global $db;
    $query = 'SELECT COUNT(email) FROM customers
			 WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $email_count = $statement->fetch();
    $statement->closeCursor();
    return $email_count;
   
}

?>


