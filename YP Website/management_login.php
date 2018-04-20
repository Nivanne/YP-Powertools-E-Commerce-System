<?php
session_start();
include 'includes/header.php';
?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="management_login.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
	  <li class="nav-item">
        <a class="nav-link" href="management_login.php">Home</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_login.php">Users </a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_login.php">User Logs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="management_login.php">Products</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_login.php">Checkouts</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="management_login.php">Transactions</a>
      </li>

  </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="management_login.php"><span class="fas fa-sign-out-alt"></span> Login</a></li>
		</ul>
</div>
</nav>
<div class="container">
	<center>
		<form action="includes/management_login.inc.php" method="POST">
			<h2> Management Log-In </h2>
			<label for="email">Email:</label>
			<br />

			<input type="email" placeholder="Enter Email" name="txtemail" required>
			<br />

			<label for="password">Password:</label>
			<br />

			<input type="password" placeholder="Enter Password" name="txtpassword" required>
			<br />
			<br />

			<button type="submit" name="submit">Log In </button>

		</form>
	</center>

		<?php
		if(isset($_GET['login'])){
			if ($_GET['login'] == "empty"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Please fill up all fields.
					</div>
				';
			} else if ($_GET['login'] == "error"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Your email/password is incorrect.
					</div>
				';
			} else if ($_GET['login'] == "used_get"){
				echo '
					<div class="alert alert-danger">
  						<strong>Oops!</strong> Please click the submit button.
					</div>
				';
			}
		}
	?>
	<br/>
	</div>
<?php

include 'includes/footer.php';
?>