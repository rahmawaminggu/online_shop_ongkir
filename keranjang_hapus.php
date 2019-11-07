<?php 
include 'koneksi.php';
session_start();

$id_produk = $_GET['id'];
$redirect = $_GET['redirect'];

if(isset($_SESSION['keranjang'])){


	for($a=0;$a<count($_SESSION['keranjang']);$a++){
		if($_SESSION['keranjang'][$a]['produk'] == $id_produk){
			unset($_SESSION['keranjang'][$a]);

			// urutkan kembali
			sort($_SESSION['keranjang']);
		}
	}

	
}

if($redirect == "index"){
	$r = "index.php";
}elseif($redirect == "detail"){
	$r = "produk_detail.php?id=".$id_produk;
}elseif($redirect == "keranjang"){
	$r = "keranjang.php";
}

print_r($_SESSION['keranjang']);
header("location:".$r);
?>