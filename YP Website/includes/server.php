<?php
	session_start();
	//initialize variables
	$productName = "";
	$productType = "";
	$productDesc = "";
	//$productImage = "";
	$price = "";
	
	$productID= 0;
	$edit_state = false;
	
	//connect to database
	$db = mysqli_connect('localhost','root','','capstone2');

	//if save button is clicked
	if (isset($_POST['save'])) {
		require_once 'dbh.inc.php';

		$password = $_POST['spassword'];



		$sql = "SELECT password
				FROM login";

		$result = mysqli_query($Database, $sql);
		$resultCheck = mysqli_num_rows($result);

		

		if($row = mysqli_fetch_assoc($result)){
			if(password_verify($password, $row['password'])){
	
		$productName = $_POST['productName'];
		$productType = $_POST['productType'];
		$productDesc = $_POST['productDesc'];
		$price = $_POST['price'];

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
		$fileDestination = "../ProductImages/". $fileName;
		move_uploaded_file($fileTmp, $fileDestination);
		
		$query = "INSERT INTO product_table (product_name, product_type, product_description, product_price, product_image) 
				  VALUES ('$productName','$productType','$productDesc','$price','ProductImages/$fileName');";
		mysqli_query($db,$query);
		
		$_SESSION['msg'] = "Address saved";
		header('Location: ../superadmin_products.php');
			}
			else{
				
				header('Location: ../superadmin_products.php');
				$_SESSION['msg'] = "The password you entered is invalid.";
			}
		}
	}
	

	//update records
	else if (isset($_POST['update'])) 
	{
			require_once 'dbh.inc.php';

			$password = $_POST['upassword'];



			$sql = "SELECT password 
					FROM login;";

			$result = mysqli_query($Database, $sql);
			$resultCheck = mysqli_num_rows($result);

			
		
		if($row = mysqli_fetch_assoc($result)){
			if(password_verify($password, $row['password'])){
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
		$id = $_SESSION['id'];
		$fileNameNew =  $id . "." . $fileActualExt;
		$fileDestination = "../ProductImages/". $fileNameNew;
		move_uploaded_file($fileTmp, $fileDestination);
		
		
		$ProductID = $_POST['productID'];
		$ProductName = $_POST['productName'];
		$ProductType = $_POST['productType'];
		$ProductDesc = $_POST['productDesc'];
		$Price = $_POST['price'];
	
	mysqli_query($db, "UPDATE product_table SET product_name='$ProductName', product_type='$ProductType' , product_description='$ProductDesc' ,product_price='$Price' WHERE productID=$ProductID");
	$_SESSION['msg'] = "Address updated!"; 
	header('location: ../superadmin_products.php');
			}
				else{
				
				header('Location: ../superadmin_products.php');
				$_SESSION['msg'] = "The password you entered is invalid.";
			}
	
		}
	}

	

?>