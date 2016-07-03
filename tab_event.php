
<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','password');
	define('DB','CSIApp');
	$connection = mysqli_connect(HOST,USER,PASS,DB) or die("DB connection failed");
	$sql1 = "Create Table Event(EName char(30) not null,
				Info char(100) not null,
				DOE char(12) not null,
				Pictures char(100),
				Unique Key (DOE))";
	if(mysqli_query($connection,$sql1))
	{
		echo "Table Event have been created successfully.";
	}
?>

