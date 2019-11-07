<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

session_start();

$id = $_SESSION['customer_id'];
$password = md5($_POST['password']);

mysqli_query($koneksi,"update customer set customer_password='$password' where customer_id='$id'");

header("location:customer_password.php?alert=sukses");