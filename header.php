<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="style.css">
  <?php  
  
  //Require Functions file
  require('./functions.php');
  
  ?>
  <title>Shops</title>
</head>
<body>
  <!--Header-->
  <header id="header">
      <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
          <p class="font-size-12 text-black-50 m-0">Chinua Achebe's Close, Lagos, Nigeria.</p>
          <div class="font-size-14">
              <a href="#" class="px-3 border-right border-left text-dark">Login</a>
              <a href="#" class="px-3 border-right text-dark">Wishlist(<?php echo count($product->getData('wishlist')); ?>)</a>
          </div>
      </div>

      <nav class="navbar navbar-expand-lg color-second-bg navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Shops</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">On sale</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Coming soon!</a>
                </li>
              </ul>
              <form action="#" class="font-size-14">
                <a href="cart.php" class="py-2 color-primary-bg rounded-pill">
                  <span class="font-size-16 px-3 text-white"><i class="fas fa-shopping-cart"></i></span>
                  <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
              </form>
            </div>
          </div>
      </nav>
  </header>
  
  <!--Main-->
  <main id="main-site">