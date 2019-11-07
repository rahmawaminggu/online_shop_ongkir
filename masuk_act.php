<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM customer WHERE customer_email='$email' AND customer_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);

	// hapus session yg lain, agar tidak bentrok dengan session customer
	unset($_SESSION['id']);
	unset($_SESSION['nama']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);

	// buat session customer
	$_SESSION['customer_id'] = $data['customer_id'];
	$_SESSION['customer_status'] = "login";
	header("location:customer.php");
}else{
	header("location:masuk.php?alert=gagal");
}
