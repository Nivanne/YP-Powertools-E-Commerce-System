	<?php
include 'includes/header.php';
?>

<?php include('includes/user_checkout.inc.php');

		$userID = $_SESSION['id'];
			//remove button
			if(isset($_POST['Remove'])) {			
			$productID = $_POST['product_id'];
			
			$del = mysqli_query($db,"DELETE FROM cart 
				WHERE `user_id` = $userID AND `product_id` = $productID;");
			mysqli_query($db,$del);				
			}	
			//echo $_SESSION['id'];

		 $rec = mysqli_query($db,"SELECT cart.product_id,product_name,product_type,product_description,product_price,product_image,SUM(quantity) AS quantity, (product_price * SUM(quantity) ) as subTotal
								FROM product_table
								INNER JOIN cart
								ON product_table.productID = cart.product_id
                                WHERE cart.user_id = $userID
								GROUP BY product_table.product_name, product_table.product_type, product_table.product_description, product_table.product_price, product_table.product_image");
		
		$sql = mysqli_query($db,"SELECT SUM(subtotal.subtotal_value) AS total
								FROM (SELECT (product_price * SUM(quantity)) as subtotal_value
								FROM product_table
								INNER JOIN cart
								ON product_table.productID = cart.product_id
                               	WHERE cart.user_id = $userID
								GROUP BY product_table.product_name, product_table.product_type, product_table.product_description, 
								product_table.product_price, product_table.product_image) subtotal"); 
						    $total_result = mysqli_fetch_assoc($sql);
							$total = $total_result['total'];
?>
							

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
	<body>
	
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="user_hompage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="user_homepage.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_shop.php">Shop</a>
      </li>
	   <li class="nav-item active">
        <a class="nav-link" href="user_cart.php">Cart  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_contact.php">Contact</a>
      </li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li>    
        <?php if($_SESSION['user_image'] != NULL): ?>
        <img style="border-radius: 50%;margin-right:2px;" width="45" height="45" src="images/<?php echo $_SESSION['user_image'] ?>" alt="userimage" id="profile-image">
      <?php else: ?>
        <img style="margin-left: 35px;" src="images/sample.png" alt="userimage" id="user-image">
      <?php endif ?>
      </li>
      <li><span class="navbar-text"> <?php echo $_SESSION['name'] ?></span>&nbsp </li>
	<li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
</div>
</nav>

<div class="container">
 <!table ->
 <center>
 
 <h2> Cart Table </h2>
	<table class="table">
		<thead class="thead-dark">
		<tr>
			
			<th scope="col">Product Image</th>
			<th scope="col">Product Name</th>
			<th scope="col">Product Type</th>
			<th scope="col">Product Description</th>
			<th scope="col">Price</th>
			<th scope="col">Qty</th>
			<th scope="col">SubTotal</th>
			<th colspan="2">Action</th>
			
		</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($rec) ): ?>
				<tr>
				
				<td><img src="<?php echo $row['product_image']; ?>" class="img-responsive" style="width: 150px; height: 150px;"/> </td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['product_type']; ?></td>
				<td><?php echo $row['product_description']; ?></td>
				<td>₱ <?php echo $row['product_price']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['subTotal']; ?></td>
				
				
				
				<! Buttons ->
				<td>	
					<form action = "user_cart.php" method = "POST">
						 <input type="Submit" name="Remove" value="Remove" class="btn btn-danger btn-lg float-right">
						 <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
					</form>
				</td>
			</tr>
			
		
			
			<?php endwhile ?>
			
		</tbody>		
	</table>
	
	<?php echo "Total: $total"; ?>
	<form action = "includes/user_checkout.inc.php" method = "POST">
		<input type="Submit" name="Checkout" value="Checkout" class="btn btn-lg float-right">
		
		<input type="hidden" name="user_name" value="<?php echo $_SESSION['name'] ?>">
		<input type="hidden" name="total" value="<?php echo $total ?>">
	</form>
	</center>
	</div>
	
<div class="container">
		<form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
			<h2>Shipping Details	</h2>

			<br />

			
			<label for="Name">Name:</label>
			<input type="text name="txtname" required>
			<br />
			
			<label for="password">Contact No</label>
			<input type="password" name="CoNumber" required>
			<br />
			<br>
			
			<label><h3>Address</h3></label>
			<br />
			
			<label for="Address">Province: </label>
				<select name="Province">                      
					<option value="none">Select Province</option>
					
					<option>Cavite</option>
					<option>Laguna</option>
					<option>Manila</option>
					<option>Las Piñas</option>
					<option>Bulacan</option>
					<option>Quezon</option>
				</select>
			<br />
			
			<label for="password"> Barangay:</label>
			<input type="password" name="txtBrngy" required>
			<br />
			
			<label for="password"> Home Address:</label>
			<input type="password" name="txtHome" required>
			<br />

			
			<button type="submit" name="submit">Submit</button>
		</form>

	</div>
    </body>
</html>

<?php

include 'includes/footer.php';
?>