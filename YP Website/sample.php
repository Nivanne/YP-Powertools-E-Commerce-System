<?php
session_start();
include 'includes/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin_homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
       <a class="nav-link" href="admin_homepage.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_products.php">Products</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="admin_usertime.php">User Logs</a>
      </li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="superadmin_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li></ul>
</div>
</nav>

<style>
	table {
    border-collapse: collapse;
    width: 100%;
    background-color:#EAFAF5;
    border-radius: 10px;
}

th {
	font-size:15px;
    text-align: left;
    padding: 8px;
}
td {
	 text-align: left;
    padding: 8px
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
label{
	font-weight: bold;
	font-size: 18px;
}
</style>
<?php 


	if(isset($_POST['search']))	
	{
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM timelogs WHERE CONCAT(`productId`, `productName`, `productType`, `productDesc`,`InStock`,`price`) LIKE '%5";
		//$search_result = filterTable($query);
    
	}
 else {
    $query = "SELECT * FROM `products`";
    //$search_result = filterTable($query);
}

			$connect = mysqli_connect('localhost', 'root', '', 'capstone2');
			//$filter_Results = mysql_query($connect,$query);
			//reutrn $filter_Results;
			
			$sql = "SELECT * FROM timelog";
			
			$query = mysqli_query($connect, $sql);

?>
<! Table ->
	<table width="70%" cellpadding="5" cellspace="5">
		<tr>
			<th>LogIn ID</th>
			<th>User Name</th>
			<th>User Email</th>
			<th>Log In</th>
		</tr>
		<?php while ($row = mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $row['LoginID']; ?></td>
				<td><?php echo $row['User_name']; ?></td>
				<td><?php echo $row['User_email']; ?></td>
				<td><?php echo $row['LoginDay']; ?></td>
		</tr>
		
		<?php } ?>
	</table>


<?php

include 'includes/footer.php';

?>