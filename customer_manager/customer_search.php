<?php include '../view/header.php'; ?>
<style>
<?php include '../main.css';?>
</style>

<main>
    <h2>Customer Search</h2>
    
    <!-- display a search form -->
    <form action="." method="post">
        <label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name" 
			value="" required>
			
			<input type="hidden" name="action" value="customer_table">
			
			<input type="submit" value="Search">
    </form>
	
  
</main>
<?php include '../view/footer.php'; ?>