<?php
include 'includes/header.php';
?>


<?php include('includes/product.inc.php');

	//fetch the record to be updated
	if (isset($_GET['edit'])) 
	{
		
	} 
	elseif(isset($_POST['AddToCart'])){
		
		$id = $_SESSION['id'];
		$product_id = $_POST['productID'];
		$quantity = $_POST['quantity'];
		
		$query = "INSERT INTO cart(`user_id`, `product_id`, `quantity`) 
				  VALUES ($id,$product_id, $quantity)";
		mysqli_query($db, $query);
		
		header('Location: user_cart.php');
		//exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/styles1.css"/>
</head>
	<body>
	
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="user_homepage.php">YP POWERTOOLS</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="user_homepage.php">Home</a>
		  </li>
		  <li class="nav-item active">
			<a class="nav-link" href="user_shop.php">Shop <span class="sr-only">(current)</span></a>
		  </li>
		   <li class="nav-item">
			<a class="nav-link" href="user_cart.php">Cart</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="user_contact.php">Contact</a>
		  </li>
		</ul>
			<ul class="nav navbar-nav navbar-right">
		
		<?php if($_SESSION['user_image'] != NULL): ?>
			<img style="border-radius: 50%;margin-right:2px;" width="45" height="45" src="images/<?php echo $_SESSION['user_image'] ?>" alt="userimage" id="profile-image">
		<?php else: ?>
			<img style="margin-left: 35px;" src="images/sample.png" alt="userimage" id="user-image">
		<?php endif ?>
	  
		<li><span class="navbar-text"> <?php echo $_SESSION['name'] ?></span>&nbsp </li>
		<li><a href="user_login.php"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
		</ul>
</div>
</nav>
 
		<!-- Page Content -->
   			<div class = "container" style="border-style: solid;">
			<center><h2>YP Powertools Products</h2></center>
		<?php

		$connect = mysqli_connect('localhost','root','','capstone2');
		$query = 'SELECT * FROM product ORDER by productID ASC';
		$result = mysqli_query($connect,$query);

		if($result):
			if(mysqli_num_rows($result) > 0 ):
				while ($product = mysqli_fetch_assoc($result)) :
						//print_r($product);
						?>
					<div class="col-sm-4 col-md-3">

							<form method="post" action="">
								<div class="products">
									<img src="<?php echo $product['product_image']; ?>"class="img-responsive" style="width:500px; height:200px;"/>
									<h4 class="text-info"><?php echo $product['product_name']; ?> </h4>
									<p><?php echo $product['product_type']; ?> </p>
									<p><?php echo $product['product_description']; ?> </p>
									
									<h4>php <?php echo $product['product_price']; ?> </h4>
									<input type="number" name="quantity" class="form-control" value="1" />			
									<input type="hidden" name="productID" value="<?php echo $product['productID']; ?>" />
									<input type="hidden" name="productname" value="<?php echo $product['product_name']; ?>" /> 
									<input type="hidden" name="producttype" value="<?php echo $product['product_type']; ?>" />
									<input type="hidden" name="productdescription" value="<?php echo $product['product_description']; ?>" />
									<input type="hidden" name="productprice" value="<?php echo $product['product_price']; ?>" />
									
									<input type="submit" name="AddToCart" style="margin-top:5px;"class="btn btn-info" value="Add to Cart" />
									
								</div>
							</form>
						</div>
						<?php
				endwhile;
			endif;
		endif;
		?>
        </div>
    </body>
</html>

<?php

include 'includes/footer.php';
?>
