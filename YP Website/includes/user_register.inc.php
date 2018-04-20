<?php
	
session_start();

	//Check if they clicked the button
	//Else redirect and stop script
	if(isset($_POST['submit'])){

		//Require Database connection
		require_once 'dbh.inc.php';

		//Get all post data
		$name = mysqli_real_escape_string($Database,htmlspecialchars($_POST['txtname']));
		$email = mysqli_real_escape_string($Database,htmlspecialchars($_POST['txtemail']));
		$password = mysqli_real_escape_string($Database,htmlspecialchars($_POST['txtpassword']));
		$confirmPassword = mysqli_real_escape_string($Database,htmlspecialchars($_POST['txtconfirmpassword']));
		
		//Check if data is empty
		if(empty($name) || empty($email) || empty($password) || empty($confirmPassword)){
			header("Location: ../user_register.php?signup=empty");
			exit();
		} else {

			//Check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/", $name)){
				header("Location: ../user_register.php?signup=invalid");
				exit();
			} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../user_register.php?signup=invalid");
				exit();
			} else if ($password != $confirmPassword){
				header("Location: ../user_register.php?signup=password_not_same");
				exit();
			} else {
				
				//Check if user exists
				$sql = "SELECT * FROM userslogin WHERE email='$email';";
				$result = mysqli_query($Database, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location: ../user_register.php?signup=usertaken");
					exit();
				} else {
					//Hash password
					$hashedPassword = password_hash($password,PASSWORD_DEFAULT);

						//Store each thing in the array $_FILES in seperate variables
					$fileName = $_FILES['file']['name'];
					$fileType = $_FILES['file']['type'];
					$fileTmp = $_FILES['file']['tmp_name'];
					$fileSize = $_FILES['file']['size'];
					$fileError = $_FILES['file']['error'];

					//Get file extension using explode and end
					$fileExt =(explode('.', $fileName));
					$fileActualExt =  strtolower(end($fileExt));
		
					//Change file name using uniqid('',true) then add a dot and lastly the file ext
					$fileDestination = "../images/". $fileName;
					move_uploaded_file($fileTmp, $fileDestination);
					
					//SQL insert statement
					$sql = "INSERT INTO userslogin (`name`,`email`,`password`,`user_image`,`RegisteredDate`) 
							VALUES ('$name','$email','$hashedPassword','$fileName',NOW());";

					//Execute Query
					mysqli_query($Database, $sql);

					//Redirect
					header("Location: ../user_login.php?signup=success");
					exit();

				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../user_register.php?signup=used_get");
		exit();
	}
?>