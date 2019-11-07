<?php 
include '../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "select * from produk where produk_id='$id'");
$d = mysqli_fetch_assoc($data);
$foto1 = $d['produk_foto1'];
$foto2 = $d['produk_foto2'];
$foto3 = $d['produk_foto3'];

unlink("../gambar/produk/$foto1");
unlink("../gambar/produk/$foto2");
unlink("../gambar/produk/$foto3");

mysqli_query($koneksi, "delete from produk where produk_id='$id'");




$data = mysqli_query($koneksi, "select * from transaksi where transaksi_produk='$id'");
while($d=mysqli_fetch_array($data)){
	$id_invoice = $d['transaksi_invoice'];

	mysqli_query($koneksi, "delete from invoice where invoice_id='$id'");
}

mysqli_query($koneksi, "delete from transaksi where transaksi_produk='$id'");

header("location:produk.php");
