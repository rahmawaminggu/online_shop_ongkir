<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update kategori set kategori_nama='$nama' where kategori_id='$id'");
header("location:kategori.php");