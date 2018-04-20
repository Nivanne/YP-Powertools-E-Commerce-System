<?php
session_start();
include 'includes/header.php';
?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="superadmin_homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
	  <li class="nav-item active">
       <a class="nav-link" href="superadmin_homepage.php">Statistics <span class="sr-only">(current)</span> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="superadmin_products.php">Products</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="superadmin_admins.php">Admins</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="superadmin_adminlogs.php">Admin Logs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="superadmin_register.php">Register</a>
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
<div class="container">
<center><h2> Daily Report of Sales </h2></center>
    <script>
window.onload = function () {
<?php include 'chart.php' ?>
</script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

      <!-- /.row -->

    </div>
    <!-- /.container -->


</div>

<?php

include 'includes/footer.php';

?>