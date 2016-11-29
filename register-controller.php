<?php

require 'config.php';
require 'process.php';

function insertData($assocArr,$conn){

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