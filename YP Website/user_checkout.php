<?php
include 'includes/header.php';
?>

<?php include('includes/server.php');

	//fetch the record to be updated
	if (isset($_GET['edit'])) {
		
	}
	$i = $_SESSION['id'];
	$recent_checkout_id = $_SESSION['recent_checkout_id'];
	
	
	//display of records
	$results = mysqli_query($db, "SELECT * FROM checkout WHERE checkout_id = $recent_checkout_id;");

	$results_product = mysqli_query($db, "SELECT * 
										  FROM `transactions` 
										  WHERE checkout_id = $recent_checkout_id;");

?>
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
	   <li class="nav-item">
        <a class="nav-link" href="user_cart.php">Cart</a>
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
      <li><i class="navbar-text"> <?php echo $_SESSION['name'] ?></i></li>
	<li style="margin-top: 8px; margin-left: 10px"><a href="user_login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
</nav>

	<div class="container">
	
	<center><h2>Checkout</h2></center>
	<br/>

	<!-- table -->
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			
			<th  scope="col">Checkout ID</th>
			<th  scope="col">User Name</th>
			<th  scope="col">Total</th>
			<th  scope="col">Date</th>
		</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>

				<td><?php echo $row['checkout_id']; ?></td>
				<td><?php echo $row['user_name']; ?></td>
				<td>₱<?php echo $row['Total']; ?></td>
				<td><?php echo $row['checkout_date']; ?></td>
			
			</tr>
			<?php	} ?>
			
		</tbody>
	</table>
	
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th  scope="col">Product Name</th>
			<th  scope="col">Price</th>
			<th  scope="col">Quantity</th>
		</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($results_product)): ?>
			<tr>
				<td><?php echo $row['product_name']; ?></td>
				<td>₱<?php echo $row['product_price']; ?></td>
				<td><?php echo $row['product_qty']; ?></td>
			</tr>
			<?php endwhile ?>
		</tbody>
	</table>
</div>
<?php

include 'includes/footer.php';

?>