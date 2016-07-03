<?php
	//require_once 'connections.php';
	header('content-Type:application/json');
	define('HOST','localhost');
	define('USER','root');
	define('PASS','password');
	define('DB','CSIApp');
	$con = mysqli_connect(HOST,USER,PASS,DB) or die("DB connection failed");
	function create_account($Name,$UserID,$Password,$EmailID,$Postion,$Field)
	{
		$query="insert into User(Name,UserID,Password,EmailID,Position,Field) values('$Name','$UserID',
					'$Password','$EmailID','$Postion','$Field')";
		$is_inserted=mysqli_query($con,$query);
		if($is_inserted==1){
			$json['success']='Account created,welcome '.$UserID;
		}
		echo json_encode($json);
		mysqli_close($con);
		
	}
	if(isset($_POST['Name'],$_POST['UserID'],$_POST['Password'],$_POST['EmailID'],$_POST['Position'],$_POST['Field'])){
		$UserID = $_POST['UserID'];
		$Password = $_POST['Password'];
		$Name = $_POST['Name'];
		$EmailID = $_POST['EmailID'];
		$Position = $_POST['Position'];
		$Field = $_POST['Field'];
		if(!empty($Name) && !empty($UserID) && !empty($Password) && !empty($EmailID) && !empty($Position) && !empty($Field)){
			$encrypted_password=md5($Password);
			create_account($Name,$UserID,$encrypted_password,$EmailID,$Postion,$Field);
		}
		else{
			echo json_encode("You must fill all the fields.");
		}
	}
?>
