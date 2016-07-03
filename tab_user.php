<?php
	//require_once 'connections.php';
	define('HOST','localhost');
	define('USER','root');
	define('PASS','password');
	define('DB','CSIApp');
	$connection = mysqli_connect(HOST,USER,PASS,DB) or die("DB connection failed");
	$sql = "Create Table User(Name char(30) not null,
				UserID char(30) not null,
				Password char(30) not null,
				EmailID char(30) not null,
				Position char(30) not null,
				Field char(30),
				Primary Key (UserID),
				Unique Key (EmailID))";
	$result = mysqli_query($connection,$sql);
	if($result)
	{
		echo "Table User have been created successfully.";
	}
?>

