
<?php 
include 'php/config.php';
include 'php/auth.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
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
    <section class="flex w-full justify-center">
      <div class="container grid">
        <div class="mt-20">
          <h1 class="text-3xl font-bold">Cart</h1>
        </div>
        <div>
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Price</th>
                <th class="text-left">Quantity</th>
                <th class="text-left">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = "SELECT c.*, p.* FROM cart c INNER JOIN product p ON c.prod_id = p.prod_id WHERE user_id = '$userId'";
              $result = mysqli_query($conn, $sql);

              $total = 0;

              if (mysqli_num_rows($result) > 0) {
                while ($cart = mysqli_fetch_assoc($result)) {
                  $total += $cart['quantity'] * $cart['price'];
                  ?>
              <tr class="border-b py-5">
                <td>
                  <div class="flex items-center gap-4">
                    <img class="w-24" src="images/<?php echo $cart['image']; ?>" alt="" />
                    <div>
                      <h3 class="ml-4"><?php echo $cart['name']; ?></h3>
                    </div>
                  </div>
                </td>
                <td>Rp. <?php echo $cart['price']; ?></td>
                <td>
                  <div class="flex gap-4">
                    <a href="php/minuscart.php?id=<?php echo $cart['cart_id']; ?>" class="bg-emerald-600 text-white px-4 py-2 rounded-xl flex text-center font-bold">&minus;</a>
                    <input type="text" class="w-10 text-center rounded-lg" value="<?php echo $cart['quantity']; ?>" />
                    <a href="php/addtocart.php?id=<?php echo $cart['prod_id']; ?>" class="bg-emerald-600 text-white px-4 py-2 rounded-xl flex text-center font-bold">&plus;</a>
                  </div>
                </td>
                <td>Rp. <?php echo $cart['price'] * $cart['quantity']; ?></td>
              </tr>
              <?php }} ?>
              <tr class="font-bold">
                <td colspan="3">Total </td>
                <td>Rp. <?php echo $total; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex flex-row-reverse gap-4">
          <a href="php/checkout.php" class="bg-emerald-600 text-white px-4 py-2 rounded-xl flex text-center font-bold">Checkout</a>
        </div>
      </div>
    </section>
  </body>
</html>
