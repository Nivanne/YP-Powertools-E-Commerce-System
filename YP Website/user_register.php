<?php
session_start();
include 'includes/header.php';
?>
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
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
  </ul>
  
       <ul class="nav navbar-nav navbar-right">
      <li><a href="user_register.php"><span class="fas fa-user"></span> Sign Up</a></li>
      <li><a href="user_login.php"><span class="fas fa-sign-in-alt"></span> Login</a></li>
    </ul>
</div>
</nav>


	<div class="register">
		<form action="includes/user_register.inc.php" method="POST" enctype="multipart/form-data">
			<h2>Register New Account</h2>

			<br />
			<div class="form-group col-md-2">
			
			<label for="Profile_img">Profile Image:</label>
			<input type="file" name="file" accept="images/*">
			</div>

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
		<p style="display:inline;">Already have an account? </p><a href="user_login.php" style="display:inline;">Login here</a>
	</div>

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