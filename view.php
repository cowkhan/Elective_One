<?php 
	include "header.php";
	require "config.php";
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
							<td><a><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal-<?echo $id?>">Delete</button></a></td>
							
						</tr>
						<div class="modal fade" id="myModal-<?php echo $id?>" role="dialog">
						    <div class="modal-dialog">
						    
						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Modal Header of <?php echo $id ?></h4>
						        </div>
						        <div class="modal-body">
						          <p>Are you sure you want to delete this record?</p>
						        </div>
						        <div class="modal-footer">
						          <a class="btn btn-default btn-sm" href='edit.php?delete_id=<?php echo $id ?>' title='Delete'>Yes</a>
						          <a class="btn btn-default btn-sm" href='view.php'>No</a>
						        </div>
						      </div>
						      
						    </div>
						 </div>
					
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