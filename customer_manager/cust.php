<?php include '../view/header.php'; ?>
<?php include '../model/customer_db.php'; ?>

<main>
    <h2>Customer Search</h2>
    
    <?php 
	
	// takes previous input and searches the db and initiates their var
	$last_name = filter_input(INPUT_POST, 'last_name');
	$customers = get_customers_by_last_name($last_name);
	/*	$first_name = $customers['firstName'];
		$last_name = $customers['lastName'];
		$email = $customers['email'];
		$city = $customers['city']; */
	?>

    <?php if (isset($message)) : ?>
       
		<p><?php echo $message; ?></p>
    <?php else: 
			
			
	
	
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
                <td><?php echo htmlspecialchars($customer['firstName']);
				 echo htmlspecialchars($customer['lastName']);  ?></td>
				<td><?php echo htmlspecialchars($customer['email']); ?></td>
				<td><?php echo htmlspecialchars($customer['city']); ?></td>
				<td><form action="customer_display.php" method="post">
                <input type="hidden" name="action" 
                       value="search_customers"> 
				<input type="hidden" name="last_chosen"
                       value="<?php htmlspecialchars($customer['lastName']); ?>">
                <input type="submit" value="Select">
					</form>
                </td>
            </tr>
			
			
        </table>
		<?php endforeach; ?>
    <?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>