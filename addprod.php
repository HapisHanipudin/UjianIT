<?php 

include 'php/config.php';
include 'php/auth.php';


if (isset($_POST['submit'])) {
  $id = uniqid();
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $imgae = $_POST['image'];
  
  $sql = "INSERT INTO product (prod_id, name, descr, price, image) VALUES ('$id', '$name', '$desc', '$price', '$imgae')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  </head>
  <body>
    <div class="container">

      <form method="POST" >
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Product Name</label>
          <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="NameHelp" />
          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Product Desc</label>
          <input name="desc" type="text" class="form-control" id="exampleInputPassword1" />
        </div>      
        <div class="mb-3">
          <label for="exampleInputNumber" class="form-label">Product Price</label>
          <input name="price" type="number" class="form-control" id="exampleInputNumber" />
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">File Image</label>
          <input name="image" class="form-control" type="file" id="formFile">
        </div>
        
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
