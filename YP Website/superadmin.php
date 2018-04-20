<?php 

session_start();
include 'includes/header.php';

?>

<!-- <?php 


	if(isset($_POST['search']))	
	{
		$valueToSearch = $_POST['valueToSearch'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM products WHERE CONCAT(`productId`, `productName`, `productType`, `productDesc`,`InStock`,`price`) LIKE '%5";
		//$search_result = filterTable($query);
    
	}
 else {
    $query = "SELECT * FROM `products`";
    //$search_result = filterTable($query);
}

			$connect = mysqli_connect('localhost', 'root', '', 'capstone2');
			//$filter_Results = mysql_query($connect,$query);
			//reutrn $filter_Results;
			
			$sql = "SELECT * FROM products";
			
			$query = mysqli_query($connect, $sql);

?> -->
<div>
	<h1>Hello, Super Admin <?php echo $_SESSION['name']?></h1>
	<center><img src="images/sample3.jpg"></center>
	<br />

	<form class="nav navbar-nav navbar-right" action="includes/logout.inc.php" method="POST">
		<button type="submit" id="logout" name="submit" class="btn btn-warning">Log Out</button>
		<script src = "js/jquery.min.js"></script>
		<script>
		$(function(){
			$('#logout').click(function(){
			if(confirm('Are you sure to logout')) {
				 window.location.href = 'login.php'
			}
			return false;
				});
			});
	</script>

	</form>
	<form class="nav navbar-nav navbar-right" action="products.php" method="POST">
	<button type="submit" name="submit" class="btn btn-info">Products</button>
</form>
<form class="nav navbar-nav navbar-right" action="registersuperadmin.php" method="POST">
	<button type="submit" name="submit" class="btn btn-info">Register</button>
</form>
</div>


<?php
	include 'includes/footer.php';
?>