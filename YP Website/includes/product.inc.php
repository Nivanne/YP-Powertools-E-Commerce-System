<?php
	session_start();
	//initialize variables
	$productName = "";
	$productType = "";
	$productDesc = "";
	$inStock = "";
	$price = "";
	
	$productID= 0;
	$edit_state = false;
	
	//connect to database
	$db = mysqli_connect('localhost','root','','capstone2');

	//if save button is clicked
	if (isset($_POST['save'])) {

		$productName = $_POST['productName'];
		$productType = $_POST['productType'];
		$productDesc = $_POST['productDesc'];
		$inStock = $_POST['InStock'];
		$price = $_POST['price'];

		$query = "INSERT INTO product (productName, productType, productDesc, InStock, price) VALUES ('$productName','$productType','$productDesc','$inStock','$price')";
		mysqli_query($db,$query);
		if(!empty($productName) || !empty($productType) || !empty($productDesc) || !empty($inStock) || !empty($price)){
			header("Location: ../products.php?add=added");
			exit();
		} 
	}

	//update records
	if (isset($_POST['update'])) {
		$ProductID = $_POST['productID'];
		$ProductName = $_POST['productName'];
		$ProductType = $_POST['productType'];
		$ProductDesc = $_POST['productDesc'];
		$inStock = $_POST['InStock'];
		$Price = $_POST['price'];
	mysqli_query($db, "UPDATE product SET productName='$ProductName', productType='$ProductType' , productDesc='$ProductDesc' , inStock='$inStock' , price='$Price' WHERE productId=$ProductID");
		header('location: ../products.php?add=updated');
	}
	
	// delete records
	if (isset($_GET['del'])) {
		$ProductID = $_GET['del'];
		mysqli_query($db, "DELETE FROM product WHERE productId=$ProductID");
		header('location: ../products.php?add=deleted');
	}

?>