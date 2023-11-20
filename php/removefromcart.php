<?php 
include 'config.php';
include 'auth.php';


if ($_GET['id'])
{
    $id = $_GET['id'];
    $sql = "DELETE FROM cart WHERE cart_id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: ../cart.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
