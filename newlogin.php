<?php
	
		include 'admin/config.php';
		session_start();
		$message='';

		if (isset($_POST['register'])) {
			$sel="SELECT * FROM useraccount where username = ? and email=? limit 1";
			$stmt=$con->prepare($sel);
			$stmt->bind_param('ss',$username,$email);
			$stmt->execute();
			$result=$stmt->get_result();

			if ($result->num_rows >0) {

				echo "mali yung uname";
				
			}else{
				echo "mali yung password";
			$password=$con->real_escape_string($_POST['password']);
			$username=$con->real_escape_string($_POST['username']);
			$email=$con->real_escape_string($_POST['email']);
			$password=password_hash($password, PASSWORD_DEFAULT);

			$ins="INSERT INTO useraccount (username,email,password)VALUES(?,?,?)";
			$stmt=$con->prepare($ins);
			$stmt->bind_param('sss' ,$username,$email,$password);
			$stmt->execute();
			header("location:registration.php");
			

			}

		}


?>