<?php 

$database = 'ujian_it';
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $database);

if (!$conn) {
    echo "Koneksi Gagal";
}

?>