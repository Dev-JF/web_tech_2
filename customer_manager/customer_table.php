<?php include '../view/header.php'; ?>

<style>
<?php include '../main.css';?>
</style>

<main>
    <h2>Customer Search</h2>
    
    <?php 
	
	// takes previous input and searches the db and initiates their var
	$last_name = filter_input(INPUT_POST, 'last_name');
	$customers = get_customers_by_last_name($last_name);
	
		
	?>

   




	
        
		<h2>Results</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>
         <?php foreach ($customers as $customer) : ?>
                <td><?php echo htmlspecialchars($customer['firstName']); echo " ";
				 echo htmlspecialchars($customer['lastName']);  ?></td>
				 
				<td><?php echo htmlspecialchars($customer['email']); ?></td>
				
				<td><?php echo htmlspecialchars($customer['city']); ?></td>
				
				<td><form action="." method="post" id="aligned">
						<input type="hidden" name="action" value="customer_display"> 
						
						<input type="hidden" name="last_name"
						value="<?php echo htmlspecialchars($customer['lastName']); ?>">
				
						<input type="hidden" name="customer_id"
						value="<?php echo htmlspecialchars($customer['customerID']); ?>">
					   
						<input type="submit" value="Select">
					</form>
                </td>
            </tr>
			<?php endforeach; ?>
			
        </table>
	
</main>
<?php include '../view/footer.php'; ?>