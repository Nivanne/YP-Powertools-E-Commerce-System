<?php 
// ADD PRODUCT
function AddProduct(){
	$prodname    =  e($_POST['prodname']);
	$proddesc  =  e($_POST['proddesc']);
	$prodtype      =  e($_POST['prodtype']);
	$prodprice  =  e($_POST['prodprice']);
	
	if (empty($prodname)) { 
		array_push($errors, "Product name is required"); 
	}
	if (empty($proddesc)) { 
		array_push($errors, "Product Description is required"); 
	}
	if (empty($prodprice)) { 
		array_push($errors, "Product Price is required"); 
	}
}

if (isset($_POST['productType'])) {
			$prodtype = e($_POST['productType']);
			$query = "INSERT INTO products (productName, productType, productDesc, price) 
					  VALUES('$prodname', '$prodtype', '$proddesc', '$prodprice')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New product successfully added!";
			header('location: .php');
		}else{
			$query = "INSERT INTO products (productName, productType, productDesc, price) 
					  VALUES('$prodname', '$prodtype', '$proddesc', '$prodprice')";
			mysqli_query($db, $query);
			
		}

 ?>