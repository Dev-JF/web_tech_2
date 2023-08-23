<?php include '../view/header.php'; ?>
<?php include '../model/customer_db.php'; ?>
<?php include '../model/product_db.php'; ?>
<main>
	<?php 
	
	// takes previous input and searches the db and initiates their var
	$email = 'gideon@opamp.com';
	//$email = filter_input(INPUT_POST, 'email');
	$get_customer_by_email = get_customer_by_email($email);
		$customer_id = $get_customer_by_email['customerID'];
		$first_name = $get_customer_by_email['firstName'];
		$last_name = $get_customer_by_email['lastName'];
		
	
	$products = get_products();
	
		
	$phptime = time();	
	$date_time = date('Y-m-d H:i:s', $phptime); 
		
	?>
    <h2>Register Product</h2>
    <?php if (isset($message)) : ?>
        <!--  ??? -->
    <?php else: ?>
        <form action="." method="post" id="aligned">
        <?php echo 'Customer: ' . htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name); ?><br><br>
        
        
		
		<label for="products">Products:</label>
        <select name="products" id="products">
       <?php foreach ($products as $product): ?>
            <option value="<?= htmlspecialchars($product['name']) ?>"><?= htmlspecialchars($product['name']) ?></option>
        <?php endforeach; ?>
        
		</select>
     
		
		<input type="hidden" id="customer_id" name="customerID" 
		value="<?php echo htmlspecialchars($customer_id); ?>" required> 
		
		<input type="hidden" id="product_code" name="productCode" 
		value="<?php echo htmlspecialchars($product['productCode']); ?>" required> 
		
		<input type="hidden" id="date_time" name="dateTime" 
		value="<?php echo htmlspecialchars($date_time); ?>" required> 
    
    <input type="hidden" name="action" value="product_register">
                
        <input type="submit" value="Register Product">
    </form>
  
  
	
	
	

	<?php
	endif; 
	
	
	
	?>
</main>
<?php include '../view/footer.php'; ?>