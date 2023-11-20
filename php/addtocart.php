<?php 

include 'config.php';
include 'auth.php';

if ($_GET['id']) {

    $id = $_GET['id'];
    $cartid = uniqid();
    $sql = "SELECT * FROM cart WHERE prod_id = '$id' AND user_id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $cart = mysqli_fetch_assoc($result);

    if ($cart) {
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE prod_id = '$id' AND user_id = '$userId'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: ../cart.php');
        }
    } else {
    $intocart = "INSERT INTO cart (cart_id, user_id, prod_id, quantity) VALUES ('$cartid', '$userId', '$id', 1)";
    $intocartexec = mysqli_query($conn, $intocart);
    
    if ($intocartexec) {
        header('Location: ../cart.php');
    } else {
        echo 'Error inserting data: ' . mysqli_error($conn);
    }
    }





} else {
    echo 'Parameter id tidak ditemukan';
}
?>