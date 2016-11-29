<?php 
	include "header.php";
	require "register-controller.php";
?>
<div class="col-md-8 col-md-offset-2">

	<?php 
		if (isset($users)){

			?>
			<div>
				<h1>Registered Users</h1>
				<table class="table">
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Created On</th>
						<th colspan='2'>Action</th>
					</tr>
					<?php foreach($users as $user){
						$id = $user['id'];
						$firstName = $user['firstname'];
						$lastName = $user['lastname'];
						$username = $user['username'];
						$created_on = $user['created_on'];
					?>
						<tr>
							<td><?php echo $firstName ?></td>
							<td><?php echo $lastName ?></td>
							<td><?php echo $username ?></td>
							<td><?php echo $created_on ?></td>
							<td><a class="btn btn-primary btn-sm" href='edit.php?edit_id=<?php echo $id ?>' title='Edit'>Edit</a></td>
							<td><a class="btn btn-danger btn-sm" href='delete-form.php?delete_id=<?php echo $id ?>'>Delete</a></td>
							
						</tr>
					
					<?php
					}
					?>

				</table>
			</div>

<?php } else{
		echo "<h2>No registered users yet</h2>";
	}
	?>
	
	<br><br>
	<a class="btn btn-info btn-lg" href="index.php">Back to index</a>
</div>



<?php include "footer.php"; ?>