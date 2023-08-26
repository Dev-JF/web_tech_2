<?php include '../view/header.php'; ?>

<style>
<?php include '../main.css';?>
</style>

<main>
	
	<?php
	 echo "Customer ID: " . $customer_id . " Updated!";
	?>
	
	<form action="." method="post" id="aligned">
		<input type="hidden" name="action" value="search_customers">
                
        <br><input type="submit" value="Back to Search">
    </form>
</main>
<?php include '../view/footer.php'; ?>