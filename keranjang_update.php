<?php 
include 'koneksi.php';

$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];

session_start();
$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for($a = 0;$a < $jumlah_isi_keranjang; $a++){
	
	$_SESSION['keranjang'][$a] = array(
		'produk' => $produk[$a],
		'jumlah' => $jumlah[$a]
	);

}

header("location:keranjang.php");
?>