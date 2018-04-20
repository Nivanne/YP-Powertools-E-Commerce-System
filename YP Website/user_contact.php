<?php
session_start();
include 'includes/header.php';
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="user_homepage.php">YP POWERTOOLS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="user_homepage.php">Home </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_shop.php">Shop</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="user_cart.php">Cart</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="user_contact.php">Contact <span class="sr-only">(current)</span></a>
      </li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li>    
        <?php if($_SESSION['user_image'] != NULL): ?>
        <img style="border-radius: 50%;margin-right:2px;" width="45" height="45" src="images/<?php echo $_SESSION['user_image'] ?>" alt="userimage" id="profile-image">
      <?php else: ?>
        <img style="margin-left: 35px;" src="images/sample.png" alt="userimage" id="user-image">
      <?php endif ?>
      </li>
      <li><span class="navbar-text"> <?php echo $_SESSION['name'] ?></span> &nbsp </li>
      <li><a href="user_login.php"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
    </ul>
</div>
</nav>

<div class="container">
  <div class="col-md-12"><center><h2>Location</h2></center>
     <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.9844927635163!2d121.00309497933556!3d14.43073825347499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1ef43db6325%3A0x4275f2715e0b8821!2sYP+POWERTOOLS!5e0!3m2!1sen!2sph!4v1521978565275" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe></center>
     <br />
      <center><h2>Contact</h2></center>
	  <center>
        <a href="https://www.facebook.com/YP-Powertools-1011558542278674/" target="_blank" style="text-decoration: none; color:#393737;"><i class="fab fa-facebook" style="font-size:36px; text-decoration: none; color:#393737;"></i>&nbsp YP POWERTOOLS</a><br>
        <i class="fas fa-phone" style="font-size:30px;"></i>&nbsp 09985734684
      </center>
      
      </div>
      

</div>

<?php

include 'includes/footer.php';

?>