<?php include '../view/header.php'; ?>

<main>
    <?php 
	$customer_email = 'harold@propane.com';
	//$email = filter_input(INPUT_POST, 'email');
	
	// get customer info
	$customers_by_email = get_customer_by_email($customer_email);
	 $customer_id = $customers_by_email['customerID'];
	 $customer_first_name = $customers_by_email['firstName'];
	 $customer_last_name = $customers_by_email['lastName'];
	
	//get customers products
	$products = get_products_by_customer($customer_email);
	
	
	?>
	
	
    
    
	<p>Customer: <?php echo $customer_first_name; ?> <?php echo $customer_last_name; ?></p> 
		
	<label for="products">Products:</label>
        <select name="products" id="products">
       <?php foreach ($products as $product): ?>
            <option value="<?= htmlspecialchars($product['name']) ?>"><?= htmlspecialchars($product['name']) ?></option>
        <?php endforeach; ?>
        	
		
		<label for="title">Title:</label>
        <br><input type="text" id="title" name="title"><br>
		
		<input type="hidden" name="action" value="customer_incident">
                
        <input type="submit" value="Create Incident">
    </form>
    

</main>
<?php include '../view/footer.php'; ?>

		
		
		
			