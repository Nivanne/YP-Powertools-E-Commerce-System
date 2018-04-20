<?php
include 'includes/header.php';
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
  <a class="navbar-brand" href="homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="homepage.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="shop.php">Shop <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
  </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="user_register.php"><span class="glyphicon glyphicon-user"></span> Sign Up &nbsp</a></li>
      <li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
</div>
</nav>
 <!-- Page Content -->
   			<div class = "container" style="border-style: solid;">
		<?php

		$connect = mysqli_connect('localhost','root','','capstone2');
		$query = 'SELECT * FROM product_table ORDER by productID ASC';
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
