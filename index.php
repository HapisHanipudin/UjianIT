<?php 
include 'php/config.php'; 
include 'php/auth.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Furni</title>
    <link rel="stylesheet" href="dist/output.css" />
  </head>
  <body>
    <nav class="flex z-50 fixed w-full items-center justify-between py-3 px-10 bg-emerald-700">
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
    <div class="w-full justify-center items-center flex h-screen bg-gradient-to-tr from-emerald-800 to-green-500">
      <div>
        <p class="text-white text-xl">Buat diri anda nyaman, santai, dan fresh dengan</p>
        <h1 class="text-5xl text-white font-black">Furni</h1>
        <p class="text-white text-2xl font-semibold mb-4">
          Dapatkan furniture berkualitas<br />
          dengan harga terjangkau.
        </p>
        <button class="bg-yellow-600 text-white px-4 font-semibold py-2 rounded-full">Shop Now</button>
        <button class="bg-emerald-600 text-white px-4 font-semibold py-2 rounded-full">Explore</button>
      </div>
      <div>
        <img class="translate-y-16" src="images/couch.png" alt="" />
      </div>
    </div>
    <div class="p-4 mx-10">
      <h1 class="text-5xl font-black text-center">Furni</h1>
      <p class="text-center mb-5">Dapatkan furniture berkualitas dengan harga terjangkau.</p>
      <div class="flex flex-wrap gap-4 justify-center">
        <?php 
					$sql = "SELECT * FROM product limit 3";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) >
        0) { while ($row = mysqli_fetch_assoc($result)) { 
          $prodId = $row['prod_id'];
          ?>
        <!-- Card -->
        <div class="w-1/4 p-4 bg-slate-100 group rounded-xl flex flex-col items-center relative overflow-hidden">
          <img class="z-10" src="images/<?php echo $row['image']; ?>" alt="" />
          <h3 class="text-2xl font-bold z-10"><?php echo $row['name']; ?></h3>
          <div class="flex flex-col gap-2 z-10 mb-2">
            <p class="text-emerald-600 text-center">Rp. <?php echo $row['price']; ?></p>
            <?php 
            if (isset($_SESSION['username'])) {
              $cartsql = "SELECT * FROM cart WHERE user_id = '$userId' AND prod_id = '$prodId'";
              $cartresult = mysqli_query($conn, $cartsql);
              
              if (mysqli_num_rows($cartresult) > 0) {
                $cart = mysqli_fetch_assoc($cartresult);
                ?>
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
      <div class="w-full flex justify-center mt-2">
        <a href="shop.php" class="bg-emerald-600 text-white px-4 font-semibold py-2 rounded-full">Shop Now</a>
      </div>
    </div>
    <div class="w-full py-5 bg-slate-100">
      <h1 class="text-5xl font-black text-center">Kata Mereka</h1>
      <p class="text-center mb-5">Para pelanggan furni sejak lama.</p>
      <div class="h-full flex w-full justify-center items-center">
        <div class="flex-grow h-full items-center flex overflow-hidden">
          <!-- Testi -->
          <div class="flex-grow flex-col flex justify-center items-center gap-4">
            <p class="w-2/3 text-slate-800">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum libero modi voluptatum earum, veniam doloremque animi, amet maiores aliquam rerum ullam incidunt sed qui excepturi facilis laudantium, veritatis ipsum iure quas
              commodi non alias eaque. Quo explicabo animi impedit ipsum.
            </p>
            <span class="text-semibold">Lorem, ipsum.</span>
            <img src="images/person-1.jpg" class="w-16 h-auto rounded-full" alt="" />
          </div>
          <!-- Testi -->
        </div>
      </div>
    </div>
    <footer class="flex w-full bg-emerald-800 text-white p-10">
      <div class="mx-20 w-full">
        <div>
          <h1 class="text-5xl font-black">Furni</h1>
        </div>
        <div class="grid justify-between grid-cols-2">
          <div class="flex gap-4">
            <div>
              <h3 class="text-2xl font-bold">Links</h3>
              <ul>
                <li class="py-2">Home</li>
                <li class="py-2">Shop</li>
                <li class="py-2">Product</li>
              </ul>
            </div>
            <div>
              <h3 class="text-2xl font-bold">Contact</h3>
              <ul>
                <li class="py-2">Email</li>
                <li class="py-2">Phone</li>
                <li class="py-2">Address</li>
              </ul>
            </div>
          </div>
          <div class="ml-auto">
            <h3 class="text-2xl font-bold">Newsletter</h3>
            <p class="py-2">Subscribe to our newsletter</p>
            <input type="text" placeholder="Enter Email" class="w-full bg-slate-200 rounded-lg px-4 py-2" />
          </div>
        </div>
        <div class="text-center font-semibold">
          <p>Copyright &copy; 2022 Furni</p>
        </div>
      </div>
    </footer>
  </body>
</html>
