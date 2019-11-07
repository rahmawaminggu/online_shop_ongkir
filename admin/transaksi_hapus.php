<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "delete from invoice where invoice_id='$id'");

mysqli_query($koneksi,"delete from transaksi where transaksi_invoice='$id'");

header("location:transaksi.php");