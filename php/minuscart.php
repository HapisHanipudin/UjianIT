<?php
include 'config.php';
include 'auth.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM cart WHERE cart_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $cart = mysqli_fetch_assoc($result);

        if ($cart['quantity'] > 1) {
            $sql = "UPDATE cart SET quantity = quantity - 1 WHERE cart_id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                // Handle SQL update error
                die("Error updating quantity: " . mysqli_error($conn));
            }
        } else {
            $sql = "DELETE FROM cart WHERE cart_id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                // Handle SQL delete error
                die("Error deleting item: " . mysqli_error($conn));
            }
        }

        header('Location: ../cart.php');
        exit();
    } else {
        // Handle SQL select error
        die("Error fetching cart item: " . mysqli_error($conn));
    }
}
?>
