<?php include '../view/header.php'; ?>


<style>
<?php include '../main.css';?>
</style>


<main>
	
	<?php 
	
	// takes previous input and searches the db and initiates their var
	
	
	$update_customers = get_customer($customer_id);
		
		$first_name = $update_customers['firstName']; 
		$last_name = $update_customers['lastName'];
		$address = $update_customers['address'];
		$city = $update_customers['city'];
		$state = $update_customers['state'];
		$postal_code = $update_customers['postalCode'];
		$country_code = $update_customers['countryCode'];
		$phone = $update_customers['phone'];
		$email = $update_customers['email'];
		$password = $update_customers['password']; 
		
		
	?>
	
	 <?php if (isset($message)) : ?>
       
		<p><?php echo $message; ?></p>
    <?php else: 
			
			
	
	
	?>
    <!-- display a table of customer information -->
    <h2>View/Update Customer</h2>
		<form action="." method="post" id="aligned">
      
		
				<input type="hidden" id="customer_id" name="customerID" 
				value="<?php echo htmlspecialchars($customer_id); ?>" required> 
		
			<label for="firstName">First Name:</label>
				<input type="text" id="first_name" name="firstName" 
				value="<?php echo htmlspecialchars($first_name); ?>" required><br><br>
    
			<label for="lastName">Last Name:</label>
				<input type="text" id="last_name" name="lastName" 
				value="<?php echo htmlspecialchars($last_name); ?>" required><br><br>

			<label for="address">Address:</label>
				<input type="text" id="address" name="address" 
				value="<?php echo htmlspecialchars($address); ?>" required><br><br>

			<label for="firstName">City:</label>
				<input type="text" id="city" name="city" 
				value="<?php echo htmlspecialchars($city); ?>" required><br><br>
    
			<label for="state">State:</label>
				<input type="text" id="state" name="state" 
				value="<?php echo htmlspecialchars($state); ?>" required><br><br>

			<label for="postalCode">Postal Code:</label>
				<input type="text" id="postal_code" name="postalCode" 
				value="<?php echo htmlspecialchars($postal_code); ?>" required><br><br>
		
		
				<input type="hidden" id="country_code" name="countryCode" 
				value="<?php echo htmlspecialchars($country_code); ?>" required><br><br>
		
			<label for="country">Country:</label>
				<select name="country" id="country" name="country">
			
			<?php foreach ($countrys as $country): ?>
            <option value="<?= htmlspecialchars($country['countryName']) ?>"><?= htmlspecialchars($country['countryName']) ?></option>
			<?php endforeach; ?>
        
				</select>
     
		
			<label for="phone">Phone:</label>
				<input type="text" id="phone" name="phone" 
				value="<?php echo htmlspecialchars($phone); ?>" required><br><br>
		
			<label for="email">Email:</label>
				<input type="text" id="email" name="email" 
				value="<?php echo htmlspecialchars($email); ?>" required><br><br>
		
			<label for="password">Password:</label>
				<input type="text" id="password" name="password" 
				value="<?php echo htmlspecialchars($password); ?>" required><br><br>
		
		
				<input type="hidden" name="action" value="update_customer">
                
				<input type="submit" value="Update Customer">
		</form>
    <?php 
	 
	
	?>
  
	
	<p><a href="?action=update_customers">Search Customers</a></p>
	<?php
	endif; 
	
	
	
	?>
</main>
<?php include '../view/footer.php'; ?>