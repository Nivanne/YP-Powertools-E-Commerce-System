<?php
	session_start();

	$user = "";
	$total = "";
	//connect to database
	$db = mysqli_connect('localhost','root','','capstone2');
	

	//if add to cart button is clicked
	if (isset($_POST['Checkout'])) {
		
		
		$user = $_SESSION['name'];
		
		$total = $_POST['total'];
		
		$id = $_SESSION['id'];
		
	
		//Insert check
		$query = "INSERT INTO checkout (`user_name`, `Total`) 
				  VALUES ('$user','$total');";
		mysqli_query($db,$query);
		
		$checkout_id = mysqli_insert_id($db);
		$query = "SELECT product.product_name as name, product.product_price as price, cart.quantity as quantity
					FROM cart 
					INNER JOIN product
					ON cart.product_id = product.productID
					WHERE cart.user_id = $id;";
		$result = mysqli_query($db, $query);
		
		$result_array =  array();
		while($row = mysqli_fetch_assoc($result)){
			$result_array[] = $row;
		}
		
		//print_r($result_array);
		
		foreach($result_array as $cart_item){
				$product_name = $cart_item['name'];
				$product_price = $cart_item['price'];
				$product_qty = $cart_item['quantity'];
				
				$query = "INSERT INTO `transactions`(`checkout_id`, `user_name`, `product_name`, `product_price`, `product_qty`) 
					VALUES ($checkout_id, '$user', '$product_name', '$product_price', '$product_qty')";
				mysqli_query($db, $query);
		}
		
		$query = "DELETE FROM cart WHERE user_id = $id";
		mysqli_query($db, $query);
		
		$_SESSION['recent_checkout_id'] = $checkout_id;
		
		//$_SESSION['msg'] = "Address saved";
		header('Location: ../user_checkout.php');
		
		
	}


	

?>