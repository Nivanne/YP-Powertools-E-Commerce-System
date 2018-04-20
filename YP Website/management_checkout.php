<?php
session_start();
include 'includes/header.php';
?>


<?php 


	if(isset($_POST['search']))	
	{
	}
 else {
    $query = "SELECT * FROM `checkout`";
    //$search_result = filterTable($query);
}

			$connect = mysqli_connect('localhost', 'root', '', 'capstone2');
			//$filter_Results = mysql_query($connect,$query);
			//reutrn $filter_Results;
			
			$sql = "SELECT * FROM checkout";
			
			$query = mysqli_query($connect, $sql);

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
        <a class="nav-link" href="management_userlogs.php">User Logs </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="management_product.php">Products</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="management_checkout.php">Checkouts <span class="sr-only">(current)</span> </a>
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
<center><h2>Checkouts</h2></center>
<! Table ->
	<table class="table table-striped width="70%" cellpadding="5" cellspace="5">
	<thead>
		<tr>
			<th scope="col">Checkout ID</th>
			<th scope="col">User Name</th>
			<th scope="col">Total Payment</th>
			<th scope="col">Checkout Date</th>
		</tr>
		</thead>
		<?php while ($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $row['checkout_id']; ?></td>
				<td><?php echo $row['user_name']; ?></td>
				<td><?php echo $row['Total']; ?></td>
				<td><?php echo $row['checkout_date']; ?></td>
		</tr>
		
		<?php } ?>
	</table>
	<form class="nav navbar-nav navbar-right" action="superadmin.php" method="POST">
</form>
</div>
<?php

include 'includes/footer.php';

?>