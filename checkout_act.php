<?php 
include 'koneksi.php';

session_start();

$id_customer = $_SESSION['customer_id'];

$tanggal = date('Y-m-d');

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

$provinsi = $_POST['provinsi2'];
$kabupaten = $_POST['kabupaten2'];

$kurir = $_POST['kurir'] ." - ". $_POST['service'];
$berat = $_POST['berat'];

$ongkir = $_POST['ongkir2'];

$total_bayar = $_POST['total_bayar']+$ongkir;

mysqli_query($koneksi,"insert into invoice values(NULL,'$tanggal','$id_customer','$nama','$hp','$alamat','$provinsi','$kabupaten','$kurir','$berat','$ongkir','$total_bayar','0','','')")or die(mysqli_error($koneksi));

$last_id = mysqli_insert_id($koneksi);


// transaksi
$invoice = $last_id;



$jumlah_isi_keranjang = count($_SESSION['keranjang']);

for($a = 0; $a < $jumlah_isi_keranjang; $a++){
	$id_produk = $_SESSION['keranjang'][$a]['produk'];
	$jml = $_SESSION['keranjang'][$a]['jumlah'];

	$isi = mysqli_query($koneksi,"select * from produk where produk_id='$id_produk'");
	$i = mysqli_fetch_assoc($isi);

	$produk = $i['produk_id'];
	$jumlah = $_SESSION['keranjang'][$a]['jumlah'];
	$harga = $i['produk_harga'];
	
	mysqli_query($koneksi,"insert into transaksi values(NULL,'$invoice','$produk','$jumlah','$harga')");

	unset($_SESSION['keranjang'][$a]);
}


header("location:customer_pesanan.php?alert=sukses");