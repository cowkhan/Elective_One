
<?php
	include 'header.php'; 
	$id = $_GET['delete_id'];
?>

<div class="col-md-4 col-md-offset-4">
	<h1>Are you sure you want to Delete?</h1>
	<hr>
	<a class="btn btn-default btn-sm" href="register-controller.php?delete_id=<?echo $id?>">Yes</a>
	<a class="btn btn-default btn-sm" href="view.php">No</a>
</div>

<?php
	include 'footer.php';
?>