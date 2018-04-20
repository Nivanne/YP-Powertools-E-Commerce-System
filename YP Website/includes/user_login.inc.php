<?php
	
session_start();

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once 'dbh.inc.php';

		//Get all post data
		$email1 = $_POST['txtemail'];
		$password1 = $_POST['txtpassword'];

		if(empty($email1) || empty($password1)){
			header("Location: ../user_homepage.php?login=empty");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * FROM userslogin WHERE email = '$email1';";
			$result = mysqli_query($Database, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			
			if($resultCheck < 1){
				header("Location: ../user_login.php?login=error");
				exit();
			} else {
				if($row = mysqli_fetch_assoc($result)){

					if(!password_verify($password1, $row['password'])){
						header("Location: ../user_login.php?login=error");
						exit();
					}else{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['user_image'] = $row['user_image'];
						
						//Time Login
						$sql = "INSERT INTO timelog (User_name,User_email,LoginDay) VALUES ('".$row['name']."','$email1',NOW());";
						mysqli_query($Database, $sql);
						header("Location: ../user_homepage.php");
						exit();
					}
				}
			}
			}
		} else {
		//User did not click the button
		header("Location: ../user_login.php?login=used_get");
		exit();
	}
?>