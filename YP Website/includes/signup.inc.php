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
			header("Location: ../register.php?signup=empty");
			exit();
		} else {

			//Check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/", $name)){
				header("Location: ../register.php?signup=invalid");
				exit();
			} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../register.php?signup=invalid");
				exit();
			} else if ($password != $confirmPassword){
				header("Location: ../register.php?signup=password_not_same");
				exit();
			} else {
				//Check if user exists
				$sql = "SELECT * FROM login WHERE email='$email';";
				$result = mysqli_query($Database, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					header("Location: ../register.php?signup=usertaken");
					exit();
				} else {
					//Hash password
					$hashedPassword = password_hash($password,PASSWORD_DEFAULT);

					//Insert to Database
					//SQL insert statement
					$sql = "INSERT INTO login (name,email,password,role) VALUES ('$name','$email', '$hashedPassword','user');";

					//Execute Query
					mysqli_query($Database, $sql);

					//Get last inserted id
					$id = mysqli_insert_id($Database);


					// //Store each thing in the array $_FILES in seperate variables
					// $fileName = $_FILES['file']['name'];
					// $fileType = $_FILES['file']['type'];
					// $fileTmp = $_FILES['file']['tmp_name'];
					// $fileSize = $_FILES['file']['size'];
					// $fileError = $_FILES['file']['error'];

					// //Get file extension using explode and end
					// $fileExt =(explode('.', $fileName));
					// $fileActualExt =  strtolower(end($fileExt));

					// $id = $_SESSION['id'];
					// $fileNameNew =  $id . "." . $fileActualExt;
					// $fileDestination = "../images/". $fileNameNew;
					// move_uploaded_file($fileTmp, $fileDestination);

					// if(!is_uploaded_file($fileTmp)){
					// 	//Insert for pictures table
					// 	$sql = "INSERT INTO profileimg (userid, status) VALUES ('$id', 1);";
					// } else {
					// 	//Insert for pictures table
					// 	$sql = "INSERT INTO profileimg (userid, status) VALUES ('$id', 0);";
					
					// }

					$sql = "INSERT INTO profileimg (userid, status) VALUES ('$id', 1);";

					//Execute Query
					mysqli_query($Database, $sql);

					//Redirect
					header("Location: ../register.php?signup=success");
					exit();

				}
			}
		}
	} else {
		//User did not click the button
		header("Location: ../register.php?signup=used_get");
		exit();
	}

	//Check if method used is POST
		//Get POST data: username, password, email. first name, confirm password
			//Check if any form is empty
				//if empty redirect with error message "Fill up the required forms"
			//Else check if any of the forms are valid
				//Check if email is valid
				//Check if password and confirm password is the same
				//Else return with error message "Fill up the required forms"
	//Else redirect with error message "Please sign up"

?>