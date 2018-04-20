<?php
include 'includes/header.php';
?>

<?php include('includes/server.php');

	//fetch the record to be updated
	if (isset($_GET['edit'])) {
		 $ProductID = $_GET['edit'];
		 $edit_state = true;

		 $rec = mysqli_query($db,"SELECT * FROM product_table WHERE productID=$ProductID");
		 $record = mysqli_fetch_array($rec);

		 $ProductID = $record['productID'];

		 $productImage = $record['product_image'];
		 $productName = $record['product_name'];
		 $productType = $record['product_type'];
		 $productDesc = $record['product_description'];
		 $price = $record['product_price'];

	}
	
	//display of records
	$results = mysqli_query($db, "SELECT * FROM product_table");


?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="management_homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="management_homepage.php">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_users.php">Users </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_userlogs.php">User Logs</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="management_product.php">Products <span class="sr-only">(current)</span> </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_checkout.php">Checkouts</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_transactions.php">Transactions</a>
      </li>

  </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li>    
        <?php if($_SESSION['profile_pic'] != NULL): ?>
        <img style="border-radius: 50%;margin-right:2px;" width="45" height="45" src="images/<?php echo $_SESSION['profile_pic'] ?>" alt="userimage" id="profile-image">
      <?php else: ?>
        <img style="margin-left: 35px;" src="images/sample.png" alt="userimage" id="user-image">
      <?php endif ?>
      </li>
      <li><span class="navbar-text">Admin <?php echo $_SESSION['name'] ?></span>
      
      <li><a href="management_login.php"><span class="fas fa-sign-out-alt"></span> Logout	</a></li>
    </ul>
</div>
</nav>

	<div class="container">
	
	<center><h2>PRODUCT TABLE</h2></center>
	<br/>

	<!table ->
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			
			<th  scope="col">Product Image</th>
			<th  scope="col">Product Name</th>
			<th  scope="col">Product Type</th>
			<th  scope="col">Product Description</th>
			<th  scope="col">Price</th>
		</tr>
		</thead>

		<tbody>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr>

				<td> <img src="<?php echo $row['product_image']; ?>" class="img-responsive" style="width: 150px; height: 150px;" /> </td>
				<td><?php echo $row['product_name']; ?></td>
				<td><?php echo $row['product_type']; ?></td>
				<td><?php echo $row['product_description']; ?></td>
				<td>₱ <?php echo $row['product_price']; ?></td>
			
			</tr>
			<?php	} ?>
			
		</tbody>
	</table>
</div>
<?php

include 'includes/footer.php';

?>