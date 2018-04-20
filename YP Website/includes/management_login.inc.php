<?php
	
session_start();

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once 'dbh.inc.php';

		//Get all post data
		$email1 = $_POST['txtemail'];
		$password1 = $_POST['txtpassword'];
		
		//current Time and Date
		$date = date("m,d,Y");
		$time = time('h:iA');

		if(empty($email1) || empty($password1)){
			header("Location: ../management_login.php?login=empty");
			exit();
		} else {
			//SQL insert statement
			$sql = "SELECT * FROM adminlogin WHERE email = '$email1';";
			$result = mysqli_query($Database, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			
			if($resultCheck < 1){
				header("Location: ../management_login.php?login=error");
				exit();
			} else {
				if($row = mysqli_fetch_assoc($result)){

					if(!password_verify($password1, $row['password'])){
						header("Location: ../management_login.php?login=error");
						exit();
					}
					else{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['profile_pic'] = $row['profile_pic'];
						//Time Login
						
						$sql = "INSERT INTO admintimelog (Admin_name,Admin_email,LoginDay) VALUES ('".$row['name']."','$email1',NOW());";
						mysqli_query($Database, $sql);
						header("Location: ../management_homepage.php");
						exit();
					}
				}
			}
			}
		} else {
		//User did not click the button
		header("Location: ../management_login.php?login=used_get");
		exit();
	}

	//Check if method used is POST
		//get POST data: username and password
		//Query database if it exists
			//if account exists
				//Start session
				//store user id in session
				//login and redirect the user to user page
			//Else if account does not exists
				//Redirect to login page with error message "Your username/password is incorrect"
	//Else redirect with error message "Please login"
?>