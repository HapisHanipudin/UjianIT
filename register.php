
<?php
include 'php/config.php';
include 'php/auth.php';

if (isset($_POST["register"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];
    $user_id = uniqid(); // Generates a unique user_id

    if ($password == $conpassword) {
        $hashed_pw = password_hash($password, PASSWORD_DEFAULT);
        $sql_check_email = "SELECT * FROM user WHERE email='$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if ($result_check_email->num_rows == 0) {
            $sql_account = "INSERT INTO user (user_id, username, email, password) VALUES ('$user_id', '$username', '$email', '$hashed_pw')";

            $result_account = mysqli_query($conn, $sql_account);

            if ($result_account) {
                header("Location: login.php"); // Redirect to login page after successful registration
                exit();
            } else {
                $error = "Something went wrong";
            }
        } else {
            $error = "Email already used";
        }
    } else {
        $error = "Password not matched";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="dist/output.css" />
  </head>
  <body>
    <section class="flex w-full h-screen justify-center items-center">
      <div class="bg-emerald-200 rounded-3xl flex flex-col items-center p-8">
        <h1 class="text-2xl font-bold mb-10">Register</h1>
        <form action="" class="grid" method="post">
          <input type="text" name="username" id="username" placeholder="Username" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <input type="email" name="email" id="email" placeholder="Email" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <input type="password" name="password" id="password" placeholder="Password" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <?php 
            if (isset($error)) {
              echo "<span class='text-red-500'>" . $error . "</span>";
            }
          ?>
          <input type="password" name="confirmpassword" id="password" placeholder="Confirm Password" class="p-3 w-64 m-2 rounded-full border-2 border-emerald-300 bg-emerald-50" />
          <button type="submit" name="register" class="p-2 m-2 rounded-full border-2 border-slate-300 bg-white">Register</button>
          <span class="text-slate-500">Have an account?</span> <a href="login.php" class="text-emerald-500">Sign In</a>
        </form>
      </div>
    </section>
  </body>
</html>
