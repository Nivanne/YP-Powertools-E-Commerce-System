<?php
session_start();
include 'includes/header.php';
?>

<?php 


	if(isset($_POST['search']))	
	{
	}
 else {
    $query = "SELECT * FROM `products`";
    //$search_result = filterTable($query);
}

			$connect = mysqli_connect('localhost', 'root', '', 'capstone2');
			//$filter_Results = mysql_query($connect,$query);
			//reutrn $filter_Results;
			
			$sql = "SELECT * FROM admintimelog";
			
			$query = mysqli_query($connect, $sql);

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
      <li class="nav-item">
        <a class="nav-link" href="superadmin_products.php">Products</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="superadmin_admins.php">Admins </a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="superadmin_adminlogs.php">Admin Logs </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="superadmin_register.php">Register <span class="sr-only">(current)</span> </a>
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
</div>
</nav>


<div class="register" style="background-color: #D3D1D0;">
		<form action="includes/signupSuperadmin.php" method="POST" enctype="multipart/form-data">
			<h2>Register New Admin</h2>

			<br />
			
			<td>
			<input type="file" name="file" accept="images/*">
			<input type="hidden" name="productID" value="<?php echo $ProductID; ?>">
			</td>
			
			<label for="Name">Name:</label>
			<br />
			<input type="text" placeholder="Enter Name" name="txtname" required>
			<br />

			<label for="email"> Email: </label>
			<br />
			<input type="email" placeholder="Enter Email" name="txtemail" required>
			<br />

			<label for="password">Password: </label>
			<br />
			<input type="password" placeholder="Enter Password" name="txtpassword" required>
			<br />

			<label for="confirmpassword">Confirm Password:</label>
			<br />
			<input type="password" placeholder="Confirm Password" name="txtconfirmpassword" required>
			<br />
			<br />
			
		 	
	
			<button type="submit" name="submit">Register</button>
		</form>

		<hr>
	</div>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="float:center;">
	<?php
		if(isset($_GET['signup'])){
			if($_GET['signup'] == "success"){
  				echo '
  					<div class="alert alert-success">
  						<strong>Success!</strong> You are now signed up.
  					</div>';
			} else if ($_GET['signup'] == "empty"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Please fill up all fields.
					</div>
				';
			} else if ($_GET['signup'] == "invalid"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Your email is in an invalid format.
					</div>
				';
			} else if ($_GET['signup'] == "password_not_same"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Your password and confirm password is not the same.
					</div>
				';
			} else if ($_GET['signup'] == "usertaken"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Your email is already taken.
					</div>
				';
			} else if ($_GET['signup'] == "used_get"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Please click the submit button.
					</div>
				';
			}
		}
	?>


<?php

include 'includes/footer.php';

?>