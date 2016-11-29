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

?>
