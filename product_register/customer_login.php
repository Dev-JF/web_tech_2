<?php include '../view/header.php'; ?>

<style>
	<?php include '../main.css';?>
</style>

<main>

    <h2>Customer Login</h2>
		<p>You must login before you can register a product.</p>
    <!-- display a search form -->
    <form action="." method="post">
        <label for="email">Email:</label>
			<input type="text" id="email" name="email" 
			value="" required>
			
			<input type="hidden" name="action" value="get_customer">
                
			<input type="submit" value="Login">
    </form>

</main>
<?php include '../view/footer.php'; ?>