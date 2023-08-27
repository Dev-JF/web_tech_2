<?php include '../view/header.php'; ?>

<style>
	<?php include '../main.css';?>
</style>

<main>
	<?php 
	
	// takes previous input and searches the db and initiates their var
	
	$get_customer_by_email = get_customer_by_email($email);
		$customer_id = $get_customer_by_email['customerID'];
		$first_name = $get_customer_by_email['firstName'];
		$last_name = $get_customer_by_email['lastName'];
		
	
	$products = get_products();
	
		
	
		
	?>
    <h1>Register Product</h1>
    
   
        <form action="." method="post" id="aligned">
        <?php echo 'Customer: ' . htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name); ?><br><br>
        
        
		
		<label for="products">Products:</label>
        <select name="products" id="products">
       <?php foreach ($products as $product): ?>
            <option value="<?= htmlspecialchars($product['name']) ?>"><?= htmlspecialchars($product['name']) ?></option>
        <?php endforeach; ?>
        
		</select><br>
     
		
		<input type="hidden" id="customer_id" name="customerID" 
		value="<?php echo htmlspecialchars($customer_id); ?>" required> 
		
		<input type="hidden" id="product_code" name="productCode" 
		value="<?php echo htmlspecialchars($product['productCode']); ?>" required> 
		
		 
    
		<input type="hidden" name="action" value="product_register">
                
        <input type="submit" value="Register Product">
    </form>
  
  
	
	
	

	
</main>
<?php include '../view/footer.php'; ?>