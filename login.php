<?php
include 'php/config.php';
include 'php/auth.php';

if (isset($_POST["login"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $hashed_pw = $row['password'];

    if (password_verify($password, $hashed_pw)) {
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['username'] = $row['username'];
      header("Location: index.php");
      exit();
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    <link rel="stylesheet" href="dist/output.css" />
  </head>
  <body>
    <section class="flex w-full h-screen justify-center items-center">
      <div class="bg-emerald-200 rounded-3xl flex flex-col items-center p-8">
        <h1 class="text-2xl font-bold mb-10">Log In</h1>
        <form action="" class="grid" method="post">
          <input type="email" name="email" id="email" placeholder="Email" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <input type="password" name="password" id="password" placeholder="Password" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <button type="submit" name="login" class="p-2 m-2 rounded-full border-2 border-slate-300 bg-white">Log In</button>
          <span class="text-slate-500">Don't have an account?</span> <a href="register.php" class="text-emerald-500">Sign Up</a>
        </form>
      </div>
    </section>
  </body>
</html>
