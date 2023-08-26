<?php include '../view/header.php'; ?>
<style>
	<?php include '../main.css';?>
</style>

<main>
    <h1>Add Technician</h1>
    
	<form action="." method="post" id="aligned">
       <input type="hidden" name="action" value="add_product">

        <label for="first_name">First Name:</label>
			<input type="text" id="first_name" name="first_name"><br><br>

        <label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name"><br><br>

        <label for="email">Email:</label>
			<input type="text" id="email" name="email"><br><br>

        <label for="phone">Phone:</label>
			<input type="text" id="phone" name="phone" /><br><br>
        
		<label for="password">Password:</label>
			<input type="text" id="password" name="password"><br><br>

        <label>&nbsp;</label>
        
			<input type="hidden" name="action" value="technician_add">
			<input type="submit" value="Add Technician" /><br>
    </form>
    
	<p><a href="?action=list_technicians">View Technician List</a></p>
</main>
<?php include '../view/footer.php'; ?>