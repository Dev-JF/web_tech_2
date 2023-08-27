<?php include '../view/header.php'; ?>
<style>
<?php include '../main.css';?>
</style>


<main>
    <?php 
	
	$customer_email = filter_input(INPUT_POST, 'email');
	
	
	// get customer info
	$customers_by_email = get_customer_by_email($customer_email);
	 
	 $customer_id = $customers_by_email['customerID'];
	 $customer_first_name = $customers_by_email['firstName'];
	 $customer_last_name = $customers_by_email['lastName'];
	
	//get customers products
	$products = get_products_by_customer($customer_email);
	
	
	
	
	
	?>
	
	<!-- takes user input and post it -->
    <form action="." method="post" id="aligned">
		<h1>Create Incident</h1>
		
		<p>Customer: <?php echo $customer_first_name; ?> <?php echo $customer_last_name; ?></p> 
		
		<label for="products">Products:</label>
			<select name="products" id="products">
			<?php foreach ($products as $product): ?>
			<option value="<?= htmlspecialchars($product['name']) ?>">
			<?= htmlspecialchars($product['name']) ?></option>
			<?php endforeach; ?>
			</select><br><br>
      	
		
		
		<label for="title">Title:</label>
			<input type="text" id="title" name="title"><br><br>
		
		<label for="description">Description:</label>
			<textarea type="textarea" id="description" name="description" rows="4" cols="50" placeholder=""></textarea><br><br>
		
			<input type="hidden" id="customer_id" name="customerID" 
			value="<?php echo htmlspecialchars($customer_id); ?>" required>
		
		
		
		 
		<input type="hidden" name="action" value="incident_complete">
                
        <input type="submit" value="Create Incident">
    </form>
     

</main>
<?php include '../view/footer.php'; ?>

		
		
		
			