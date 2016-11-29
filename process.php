<?php

//require 'config.php';
//require 'model.php';

/*
*
* Displays in the view.php
*
*/
$sql = $conn->query("SELECT * FROM users ORDER BY created_on DESC");
$sql->execute();
$users = $sql->fetchAll();
if (!$sql) {
	print_r($conn->errorInfo());
}



/*
*
* Inserting into the Database Controller
*
*/

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstName'];
	$lastname = $_POST['lastName'];

	insertData(array(
		"username" => "$username",
		"password" => "$password",
		"firstname" => "$firstname",
		"lastname" => "$lastname"
		),$conn);
}

/*
*
* Destroying into the Database Controller
*
*/

if(isset($_GET['delete_id'])){
	$del = $_GET['delete_id'];
	
	destroyData($del,$conn);
}

/*
*
* Editing into the Database Controller
*
*/

if (isset($_GET['edit_id'])){
	$editId = $_GET['edit_id'];

	$infos = displayEdit($editId,$conn);

	foreach ($infos as $info){
		$username = $info['username'];
		$firstName = $info ['firstname'];
		$lastName = $info ['lastname'];
	}
}

/*
*
* Update into the Database Controller
*
*/

if (isset($_POST['update'])){
	$editId = $_POST['update'];
	$username = $_POST['new_user'];
	$firstname = ucwords(strtolower($_POST['new_first']));
	$lastname = ucwords(strtolower($_POST['new_last']));

	updateData(array(
					"id" => "$editId",
					"username" => "$username",
					"firstname" => "$firstname",
					"lastname" => "$lastname"
					),$conn);

}