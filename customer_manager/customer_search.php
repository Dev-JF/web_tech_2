<?php include '../view/header.php'; ?>
<main>
    <h2>Customer Search</h2>
    
    <!-- display a search form -->
    <form action="cust.php" method="post">
        <input type="text" id="last_name" name="last_name" placeholder="">
        <input type="submit" value="Search">
    </form>
	<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$last_name = $INPUT_POST["last_name"]; 
	}
	?>
  
</main>
<?php include '../view/footer.php'; ?>