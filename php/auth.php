<?php 

session_start();

if (isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $username = $_SESSION['username'];
} else {
    $userId = null;
    $username = null;
}