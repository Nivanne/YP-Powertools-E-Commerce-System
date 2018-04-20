<?php

session_start();
include 'includes/header.php';
?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin.php">YP POWERTOOLS ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewTable.php">Shop</a>
      </li>
  </ul>
  <<!-- form class="nav navbar-nav navbar-right" action="includes/logout.inc.php" method="POST">
	<button type="submit" id="logout" name="submit"><span class="glyphicon glyphicon-log-out">Log Out</span></button> -->
  <<ul class="nav navbar-nav navbar-right">
      <li action="includes/logout.inc.php" method="POST"><a href="management_login.php"><span class="glyphicon glyphicon-log-out"></span> Log-Out</a></li>
      <li><a href="viewTable.php"><span class="glyphicon glyphicon-list-alt"></span> Products</a></li>
  </ul>
</div>
</nav>
<center>
<h1>Welcome Admin <?php echo $_SESSION['name']?> !</h1>

	<?php
		$id = $_SESSION['id'];

		require_once 'includes/dbh.inc.php';

		$sql = "SELECT * FROM images WHERE userid= $id";
		$result = mysqli_query($Database, $sql);
		$row = mysqli_fetch_assoc($result);

		if($row['status'] == 0){
			echo '<img src="images/' . $_SESSION['id']. '.jpg?'.mt_rand() .'" style="width:250px">';
		}else{
			echo '<img src="images/blank.jpg" style="width:250px">';
		}
	?>
	

	<br />
	<form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data">
		<label for="uploading">Upload New Profile Picture:</label>
		<input type="file" name="file" accept="images/*">
		<button name="submit" type="submit">Upload</button>
	</form>
	<br />

	<label for="email">Email: </label>
	<p>
		<?php $email = $_SESSION['email'];
		echo $email;
	?>
	</p>
<form class="nav navbar-nav navbar-right" action="viewTable.php" method="POST">
	<button type="submit" name="submit" class="btn btn-info">View Products</button>
</form>
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
</div>
</center>


<?php

include 'includes/footer.php';
?>
