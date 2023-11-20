<?php 
include 'php/config.php';
include 'php/auth.php';

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

$numRows = mysqli_num_rows($result);

$wrapperWidth = 100 * ($numRows + 1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Furni</title>
    <link rel="stylesheet" href="css/styles.css" />
    <!-- <link rel="stylesheet" href="https://codepen.io/GreenSock/pen/7ba936b34824fefdccfe2c6d9f0b740b.css" /> -->
  </head>
  <body>

<!-- <nav class="navbar custom-navbar-nav">
  <div class="logo">
    <h4>Furni</h4>
  </div>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
  </ul>
  <div class="cart">
    <a href="cart.php">
      <i class="fas fa-shopping-cart"></i>
    </a>
  </div>
  
</nav> -->

    <section class="hero">


      <div class="title">
        <h1>Buat dirimu lebih</h1>
        <div class="anim-text">
          <span>Nyaman</span>
          <span>Santai</span>
          <span>Mudah</span>
          <span>Fresh</span>
        </div>
        <h2>Dengan <span class="furni">Furni</span></h2>
      </div>

      <div class="hero-img">
        <img src="images/couch.png" alt="" />
      </div>
    </section>
    <section id="under-hero">
      <div class="hero-bottom">
        <h1 class="toRight">Ingin rumah yang <span>Nyaman?</span></h1>
      </div>
    </section>
    
    <div class="container-slider">
      <div class="wrapper" style="width: <?php echo $wrapperWidth; ?>%;">
        <section class="section intro">
          <div class="line"></div>
        </section>

        <?php

            if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { 
          echo '
        <section class="section shirt character" id="'. $row['prod_id'] .'">
          <div class="block"></div>
          <img src="images/'. $row['image'] . '" alt="" /><span class="huge-text">'. $row['name'] .'</span>

          <div class="nickname"><span>'. $row['name'] . '</span>'. $row['name'] . '</div>
          <div class="price">
            <h3 class="h3">Rp' . $row['price'] . '</h3>
            <a class="tocart" href="php/addtocart.php?id='.$row['prod_id'].'">Add To Cart</a>
          </div>
          <div class="quote">'. $row['descr'] . '</div>
        </section>
          '; } } else { echo '
          <h2 style="opacity: 70%">Belum Ada Kontent untuk ditampilkan</h2>
          '; } ?>

      </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="js/gsap.js"></script>
  </body>
</html>
