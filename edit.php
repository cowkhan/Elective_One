<?php  include "header.php";
	require "register-controller.php";
?>

<center>
<div class="col-md-4 col-md-offset-4">	
	<h1>Edit User Information</h1>
	<hr>
	<form class="form-horizontal" action="config.php" method="POST">
		<input type='hidden' name='update' value="<?php echo $editId ?>" />
		<div class="form-group">
			<label class="col-md-3">Username</label>
			<div class="col-md-9">
				<input class="form-control" type="text" value="<?php echo $username ?>" name="new_user" required/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Firstname</label>
			<div class="col-md-9">
				<input class="form-control" type="text" value="<?php echo $firstName ?>" name="new_first" required />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Lastname</label>
			<div class="col-md-9">
				<input class="form-control" type="text" value="<?php echo $lastName?>" name="new_last" required/>
			</div>
		</div>

		<input class="btn btn-primary" type="submit" value="Save">
		<a class="btn btn-info" href="view.php">Cancel</a>
	</form>
</div>

<?php include "footer.php"; ?>