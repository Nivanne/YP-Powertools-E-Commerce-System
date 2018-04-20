<?php
	
	session_start();
	
	//Check if they pressed submit
	if(isset($_POST['submit'])){

		//Require Database connection
		require_once 'dbh.inc.php';

		//Store each thing in the array $_FILES in seperate variables
		$fileName = $_FILES['file']['name'];
		$fileType = $_FILES['file']['type'];
		$fileTmp = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];

		//Get file extension using explode and end
		$fileExt =(explode('.', $fileName));
		$fileActualExt =  strtolower(end($fileExt));

		//Make array of allowed file extensions
		$allowedExtensions = array("jpg", "jpeg" , "png");

		//Check if they uploaded the one of the allowed file extension using in_array($string, $array)
		if(in_array($fileActualExt, $allowedExtensions)){
			//Check if error code is === 0
			if($fileError === 0){

				//Check if file size is less than 40mb (40,000kb)
					if($fileSize < 4000000000){
					//Change file name using uniqid('',true) then add a dot and lastly the file ext
						$id = $_SESSION['id'];
						$fileNameNew =  $id . "." . $fileActualExt;
						$fileDestination = "../ProductImages/". $fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
						
						$sql = "UPDATE images SET status = '0' WHERE id = $id";
						mysqli_query($Database,$sql);
						
						header("Location: ../user.php?success");
						//header("Location: test.php?success");
					//NOTE: uniqid returns a string based on the system time up to microseconds, settings true adds more entropy up to 23 chars
					//Make a variable called file destination = path to folder + filename
					//use move_uploaded_file(fileTMPname, file destination)
					//Show success message
					} else {
						echo "File size must be less than 40 mb";
					}
				//Else return error "File size must be less than 40 mb"
			} else {
				//Else Return error message "Error uploading file"
				echo "Error uploading file";
			}
		} else {
			//Return error message "You cannot upload this type of file"
			echo "Not allowed extension";
		}
	} else {
	//Else redirect to the previous page
		//header("Location: test.php");
		//exit();
	}

?>

<!-- <form action="" method="POST" enctype="multipart/form-data">
	<input name="file" type="file"></input>
	<button name="submit" type="submit">Upload</button>
</form> -->