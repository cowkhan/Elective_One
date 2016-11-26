<?php include "header.php";?>

	<div class="col-md-4 col-md-offset-4">
		<form class="form-horizontal" action="config.php" method="POST">
			
			<h1>Register</h1>
			<hr>
			<div class="form-group">
				<label class="col-md-3">Username:</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="username" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3">Password:</label>
				<div class="col-sm-9">
					<input class="form-control" type="password" name="password" maxlength="255" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3">Firstname:</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="firstName" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3">Lastname:</label>
				<div class="col-sm-9">
					<input class="form-control" type="text" name="lastName" required>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-4"><input class="btn btn-primary btn-block" type="submit" name="submit" value="Register"></div>
			
		</form>

			<div class="col-md-4 col-md-offset-4 form-spacing-top"><a class="btn btn-info btn-block" href="index.php">Back</a></div>
			
	</div>
	
	
<?php include "footer.php"; ?>