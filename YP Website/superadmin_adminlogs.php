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
	   <li class="nav-item active">
        <a class="nav-link" href="superadmin_adminlogs.php">Admin Logs <span class="sr-only">(current)</span></a>
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

<div class="container">

<center> <h2> ADMIN LOGS </h2> </center>
<br/>

<! Table ->
	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th scope="col">LogIn ID</th>
			<th scope="col">Admin Name</th>
			<th scope="col">Admin Email</th>
			<th scope="col">Log In</th>
		</tr>
		</thead>
		<?php while ($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $row['LoginID']; ?></td>
				<td><?php echo $row['Admin_name']; ?></td>
				<td><?php echo $row['Admin_email']; ?></td>
				<td><?php echo $row['LoginDay']; ?></td>
		</tr>
		
		<?php } ?>
	</table>
	<form class="nav navbar-nav navbar-right" action="superadmin.php" method="POST">
</form>
</div>

<?php

include 'includes/footer.php';

?>