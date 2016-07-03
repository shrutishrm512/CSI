<?php
	//require_once 'connections.php';
	header('content-Type:application/json');
	define('HOST','localhost');
	define('USER','root');
	define('PASS','password');
	define('DB','CSIApp');
	$con = mysqli_connect(HOST,USER,PASS,DB) or die("DB connection failed");
	function does_user_exist($email,$password)
	{
		$query="select * from User where UserID='$UserID' and Password='$Password'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			$json['success'] = 'Welcome '.$UserID;
			echo json_encode($json);
			mysqli_close($con);
		}else{
			$json['error']='Wrong password or UserID';
			echo json_encode($json);
			mysqli_close($con);
		}
		//or else create your account 
	}
	if(isset($_POST['UserID'],$_POST['Password'])){
		$UserID = $_POST['UserID'];
		$Password = $_POST['Password'];
		if(!empty($UserID) && !empty($Password)){
			$encrypted_password=md5($Password);
			does_user_exist($UserID,$encrypted_password);
		}
		else{
			echo json_encode("You must fill both fields.");
		}
	}
?>
