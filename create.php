Create DB
<?php
$servername="localhost";
$username = "username";
$password ="password";

//insert values
$username = $_POST ['username'];
$password = $_POST['password'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
//$created_on = $_GET ['created_on'];
//$updated_on = $_GET ['updated_on'];
try {
 $conn=new PDO ("mysql:host=$servername;dbname=elective_one", "root","123");
$conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql ="INSERT INTO users VALUE (NULL,$username,$password,$firstName,$lastName,NOW(),NOW())";
	
	
	$conn-> query($sql);
	echo "Database created successfully <br>";
	}
	catch (PDOException $e)
	{
	echo $sql . "<br>" .$e->getMessage();
	}
	$conn = null;
	
	?>
	