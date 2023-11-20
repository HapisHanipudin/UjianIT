<?php 
include 'php/config.php';
include 'php/auth.php'
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <link rel="stylesheet" href="dist/output.css" />
  </head>
  <body>
    <nav class="flex z-50 fixed top-0 w-full items-center justify-between py-3 px-10 bg-emerald-700">
      <div>
        <h1 class="text-2xl font-black text-white">Furni</h1>
      </div>
      <div class="flex text-white gap-4 font-semibold">
        <a href="index.php">Home</a>
        <a href="shop.php">Shop</a>
        <?php if (isset($_SESSION['username'])) { ?>
        <a href="#"><img src="images/user.svg" alt="" /></a>
        <a href="php/logout.php">Logout</a>
        <a href="cart.php"><img src="images/cart.svg" alt="" /></a>
        <?php } else { ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <?php } ?>
      </div>
    </nav>
    <section class="w-full flex justify-center">
      <div class="container mt-20">
        <h1 class="text-3xl font-bold">Shop</h1>
        <div class="flex flex-wrap gap-4 justify-center">
          <?php 
					$sql = "SELECT * FROM product";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) >
          0) { while ($row = mysqli_fetch_assoc($result)) { $prodId = $row['prod_id']; ?>
          <!-- Card -->
          <div class="w-1/5 p-4 bg-slate-100 group rounded-xl flex flex-col items-center relative overflow-hidden">
            <img class="z-10" src="images/<?php echo $row['image']; ?>" alt="" />
            <h3 class="text-2xl font-bold z-10"><?php echo $row['name']; ?></h3>
            <div class="flex flex-col gap-2 z-10 mb-2">
              <p class="text-emerald-600 text-center">
                Rp.
                <?php echo $row['price']; ?>
              </p>
              <?php 
            if (isset($_SESSION['username'])) {
              $cartsql = "SELECT * FROM cart WHERE user_id = '$userId' AND prod_id = '$prodId'";
              $cartresult = mysqli_query($conn, $cartsql);
              
              if (mysqli_num_rows($cartresult) >
              0) { $cart = mysqli_fetch_assoc($cartresult); ?>
              <div class="flex gap-4">
                <a href="php/minuscart.php?id=<?php echo $cart['cart_id']; ?>" class="bg-emerald-600 text-white px-4 py-2 rounded-xl flex text-center font-bold">&minus;</a>
                <input type="text" class="w-10 text-center rounded-lg" value="<?php echo $cart['quantity']; ?>" />
                <a href="php/addtocart.php?id=<?php echo $row['prod_id']; ?>" class="bg-emerald-600 text-white px-4 py-2 rounded-xl flex text-center font-bold">&plus;</a>
              </div>
              <?php  }  else { ?>
              <a href="php/addtocart.php?id=<?php echo $row['prod_id']; ?>" class="bg-emerald-600 text-white px-4 font-semibold py-2 rounded-full">Add to cart</a>
              <?php } }?>
            </div>
            <div class="rounded-xl w-full bg-gradient-to-t from-green-300 to-transparent bg-opacity-20 absolute bottom-0 h-36 z-0 translate-y-full group-hover:translate-y-0 ease-in-out duration-300"></div>
          </div>
          <!-- Card -->
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>
  </body>
</html>
