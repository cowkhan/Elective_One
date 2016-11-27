<?php
try {
	$servername = "localhost";
	$db_user = "root";
	$db_password = "";
	$myDB = "elective_one";
	$conn = new PDO("mysql:host=$servername;dbname=$myDB",$db_user, $db_password);
}catch(PDOException $e){
	echo $e->getMessage();
}
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


function insertData($assocArr, $conn){

	try{
		$insertingData = $conn->prepare("INSERT INTO users VALUES (NULL,:username,:password,:firstname,:lastname,NOW(),NOW())");
		$insertingData->bindParam(":username",$assocArr['username']);
		$insertingData->bindParam(":password",crypt($assocArr['password'],''));
		$insertingData->bindParam(":firstname",$assocArr['firstname']);
		$insertingData->bindParam(":lastname",$assocArr['lastname']);

		$insertingData->execute();

		echo "<script language=javascript>
			 alert('Registration Successful');
			 window.location='view.php';
			 </script>";

	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function destroyData($var, $conn){

	$destroy_sql = $conn->prepare("DELETE FROM users WHERE id=?");
	$destroy_sql->execute([$var]);

	echo "<script language=javascript>
		 alert('Registration has been Deleted');
		 window.location='view.php';</script>";
}

function displayEdit($editId, $conn){

	$sql = $conn->prepare("SELECT * FROM users WHERE id = ?");
	$sql->execute([$editId]);
	$user_infos = $sql->fetchAll();
	
	return $user_infos;
	
}

function updateData($var,$conn){
	$update=$conn->prepare("UPDATE users SET username= ?,firstname= ?,lastname= ?,updated_on=NOW() WHERE id= ?");
	
	$update->execute(array(
		$var['username'],
		$var['firstname'],
		$var['lastname'],
		$var['id']
		));
	if (!$update) {
	print_r($conn->errorInfo());
	}
	else{
		echo "<script language=javascript>
			alert('Record has been UPDATED!');
			window.location='view.php';
			</script>;";
	}
}


$conn = null; 
?>
