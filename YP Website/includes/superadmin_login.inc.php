<?php
	
session_start();

	if(isset($_POST['submit'])){
		//Require Database connection
		require_once 'dbh.inc.php';

		//Get all post data
		$email = $_POST['txtemail'];
		$password = $_POST['txtpassword'];

		//check if fields are empty
		if(empty($email) || empty($password)){
			header("Location: ../login.php?login=empty");
			exit();
		} 
		else {
			//SQL insert statement
			$sql = "SELECT * FROM superadminlogin WHERE email = '$email';";
			$result = mysqli_query($Database, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			if($resultCheck < 1){
				header("Location: ../superadmin_login.php?login=error");
				exit();
			} else {
				if($row = mysqli_fetch_assoc($result)){

					if(!password_verify($password, $row['password'])){
						header("Location: ../superadmin_login.php?login=error");
						exit();
					}else{
						$_SESSION['id'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['profile_pic'] = $row['profile_pic'];

						if($_SESSION['role'] == "SuperAdmin"){
							header("Location: ../superadmin_homepage.php");
							exit();
						} else if($_SESSION['role'] == "Admin"){
							header("Location: ../superadmin_login.php");
							exit();
						} else {
							header("Location: ../superadmin_login.php");
							exit();
						}

					}
				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../superadmin_login.php?login=used_get");
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