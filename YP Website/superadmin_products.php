<?php
include 'includes/header.php';
?>

<?php include('includes/server.php');

	//fetch the record to be updated
	if (isset($_GET['edit'])) {
		 $ProductID = $_GET['edit'];
		 $edit_state = true;

		 $rec = mysqli_query($db,"SELECT * FROM product WHERE productID=$ProductID");
		 $record = mysqli_fetch_array($rec);

		 $ProductID = $record['productID'];

		 $productImage = $record['product_image'];
		 $productName = $record['product_name'];
		 $productType = $record['product_type'];
		 $productDesc = $record['product_description'];
		 $price = $record['product_price'];
		 $Availability = $record['availability'];

	}
	
	//display of records
	$results = mysqli_query($db, "SELECT * FROM product_table");


?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="superadmin_homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="superadmin_homepage.php">Statistics</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="superadmin_products.php">Products <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="superadmin_admins.php">Admins</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="superadmin_adminlogs.php">Admin Logs </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="superadmin_register.php">Register </a>
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
      <li><span class="navbar-text">Welcome <?php echo $_SESSION['name'] ?>&nbsp </span>
      <li><a href="superadmin_login.php"><span class="fas fa-sign-out-alt"></span> Logout	</a></li>
     </ul>
</div>
</nav>


	<?php if (isset($_SESSION['msg'])): ?>
	<div class="alert alert-success" role="alert">
		<?php 
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
	</div>
	<?php endif ?>

	<center><h2> Table of Products </h2></center>
	<br />
	
		<!table ->
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
		<th  scope="col">Product Image</th>
		<th  scope="col">Product Name</th>
		<th  scope="col" for="productType">Product Type</th>
		<th  scope="col">Product Description</th>
		<th  colspan="2">Price</th>
		
		</tr>
		</thead>

		<tbody>

		<tr>
		
	<! Text Box ->
	<form method="post" action="includes/server.php" enctype="multipart/form-data">
	
	<td>
	<! Product Image ->
	<input type="file" name="file" accept="images/*">
	<input type="hidden" name="productID" value="<?php echo $ProductID; ?>">
	</td>
		
		<td>
		<! Product Name ->			
			<input type="text" name="productName" value="<?php echo $productName; ?>"> 
		</td>
		
		<td>
		<!Product Type->
		 	
    	<select name="productType" class="form-control">                      
				
				<option value="none">Select Type</option>
				
				<option>Welding Machines</option>
				<option>Air Compressors</option>
				<option>Drills</option>
				<option>Power Saws</option>
				<option>Grinders, Planers, Polishers and Routers</option>
				<option>Pressurized Washer</option>
		</select>
	 </td>

		<td>
		<!Product Description->
			
			<input type="text" name="productDesc" value="<?php echo $productDesc; ?>">
		</td>
		
		<td>
		<!Price->			
			<input type="number" class="form-control currency" style="width: 100px" name="price" min="0" step="100" data-number-to-fixed="2" data-number-stepfactor="100"  value="<?php echo  $price; ?>" placeholder="Product Price">
		</td>


		<?php if($edit_state == false): ?>
		<td>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalSave">Save</button>
				</td>

				
				

				</tr>
			
		</tbody>
	</table>

  <!-- Modal -->
  <div class="modal fade" id="modalSave" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Confirm Save</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <input type="password" placeholder="Enter Password" class="spassword" name="spassword" required>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-default" data-dismiss="spassword" name="save">Confirm</button>
        </div>
      </div>
      
    </div>
  </div>

		<?php else: ?>
<td>
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalUpdate">Update</button>
</td>
  <!-- Modal -->
  <div class="modal fade" id="modalUpdate" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Confirm Update</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <input type="password" placeholder="Enter Password" class="upassword" name="upassword" required>
        </div>
        <div class="modal-footer">
          <button type="Submit" class="btn btn-default" data-dismiss="upassword" name="update">Confirm</button>
        </div>
      </div>
      
    </div>
  </div>
		<?php endif ?>
			
		
	</form>




  

	<!table ->
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			
			<th  scope="col">Product Image</th>
			<th  scope="col">Product Name</th>
			<th  scope="col">Product Type</th>
			<th  scope="col">Product Description</th>
			<th  scope="col">Price</th>
			<th colspan="2">Action</th>
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
				
			
				
				<! Buttons ->
				<td>	
					<a class="edit_btn" href="superadmin_products.php?edit=<?php echo $row['productID']; ?>">Edit</a>
				</td>
				
			
			</tr>
			<?php	} ?>
			
		</tbody>
	</table>
	
	
<?php

include 'includes/footer.php';

?>