<?php
    include('config/constant.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SteaminMugs - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- <link rel="stylesheet" href="css/aos.css"> -->

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
			<img class="navbar-brand" href="index.php" src="images/NooneMugs.png" style="height: 6rem; width: 8rem;">
	      <!--<a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a> -->
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php active('');?>"><a href="<?php echo $siteurl; ?>" class="nav-link">Home</a></li>
	          <li class="nav-item <?php active('menu.php');?>"><a href="<?php echo $siteurl; ?>menu.php" class="nav-link">Menu</a></li>
	          <li class="nav-item <?php active('services.php');?>"><a href="<?php echo $siteurl; ?>services.php" class="nav-link">Services</a></li>
	          <li class="nav-item <?php active('blog.php');?>"><a href="<?php echo $siteurl; ?>blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item <?php active('about.php');?>"><a href="<?php echo $siteurl; ?>about.php" class="nav-link">About</a></li>
            <li class="nav-item <?php active('shop.php');?>"><a href="<?php echo $siteurl; ?>shop.php" class="nav-link">Shop</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
	          <li class="nav-item cart"><a href="<?php echo $siteurl; ?>cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li>
	        </ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->