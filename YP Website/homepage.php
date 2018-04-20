<!-- Header -->
<?php
session_start();
include 'includes/header.php';
?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="user_register.php"><span class="fas fa-user"></span> Sign Up &nbsp </a></li>
      <li><a href="user_login.php"><span class="fas fa-sign-in-alt"></span> Login</a></li>
    </ul>
</div>
</nav>


<div class="container">
<!-- Jumbotron Header -->
      <header class="jumbotron my-4" style="background-image: url('./images/bg.jpg'); background-size: cover;">
        <h1 class="display-3">YP POWERTOOLS</h1>
        <p class="lead">Retailer of quality brand new and surplus powertools from <br />Australia and
            locally.</p>
        <a href="shop.php" class="btn btn-primary btn-lg">Shop Now!</a>
      </header>
 <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="Available%20in%20Stock/Angle%20Grinder/20180217_145912.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Angle Grinder</h4>
              <p class="card-text">Product Description</p>
            </div>
            <div class="card-footer">
              <a href="shop.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="Available%20in%20Stock/Asaki%20-%20Table%20Vice/20180217_154915.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Asaki - Table Vice</h4>
              <p class="card-text">Product Description</p>
            </div>
            <div class="card-footer">
              <a href="shop.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="Available%20in%20Stock/Finish%20Sander%20HT-FS%2018702/20180217_150857.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Finish Sander</h4>
              <p class="card-text">Product Description</p>
            </div>
            <div class="card-footer">
              <a href="shop.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="Available%20in%20Stock/Fujima%20-%20Air%20Die%20Grinder%20XQ-T02/20180217_152633.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Air Die Grinder</h4>
              <p class="card-text">Product Desciption</p>
            </div>
            <div class="card-footer">
              <a href="shop.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


</div>

<!-- Footer -->
<?php
include 'includes/footer.php';
?>