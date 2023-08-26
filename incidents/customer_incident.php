<?php include '../view/header.php'; ?>

<style>
	<?php include '../main.css';?>
</style>


<main>
    
    
    <!-- display a search form -->
    <form action="." method="post">
         <input type="hidden" name="action" value="create_incident">
		<h2>Get Customer</h2>
		<p>Email:</p>
		<input type="text" id="email" name="email" placeholder="">
        <input type="submit" value="Get Customer">
    </form>
	<?php 
	
	?>
  
</main>
<?php include '../view/footer.php'; ?>
			

		
		