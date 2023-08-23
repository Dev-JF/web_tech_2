<?php include '../view/header.php'; ?>
<main>
    <h1>Add Technician</h1>
    <form action="." method="post" id="aligned">
       <input type="hidden" name="action" value="add_product">

        <label>First Name:</label>
        <input type="text" name="first name"><br>

        <label>Last Name:</label>
        <input type="text" name="last name"><br>

        <label>Email:</label>
        <input type="text" name="email"><br>

        <label>Phone:</label>
        <input type="text" name="phone" />
        
		<label>Password:</label>
        <input type="text" name="password" />

        <label>&nbsp;</label>
        <input type="submit" value="Add Add Technician" /><br>
    </form>
    <p><a href="?action=list_technicians">View Technician List</a></p>
</main>
<?php include '../view/footer.php'; ?>