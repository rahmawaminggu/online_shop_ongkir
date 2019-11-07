<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Konfirmasi Pembayaran</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<div class="section">
	<div class="container">
		<div class="row">
			
			<?php 
			include 'customer_sidebar.php'; 
			?>

			<div id="main" class="col-md-9">
				
				<h4>KONFIRMASI PEMBAYARAN</h4>

				<div id="store">
					<div class="row">

						<div class="col-lg-12">

							<table class="table table-bordered">
								<tbody>
									<?php 
									$id_invoice = $_GET['id'];
									$id = $_SESSION['customer_id'];
									$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' and invoice_id='$id' order by invoice_id desc");
									while($i = mysqli_fetch_array($invoice)){
										?>
										<tr>
											<th width="20%">No.Invoice</th>	
											<td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
										</tr>
										<tr>
											<th>Tanggal</th>	
											<td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])) ?></td>
										</tr>
										<tr>
											<th>Total Bayar</th>	
											<td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
										</tr>
										<tr>
											<th>Status</th>	
											<td>

												<?php 
												if($i['invoice_status'] == 0){
													echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
												}elseif($i['invoice_status'] == 1){
													echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
												}elseif($i['invoice_status'] == 2){
													echo "<span class='label label-danger'>Ditolak</span>";
												}elseif($i['invoice_status'] == 3){
													echo "<span class='label label-primary'>Dikonfirmasi & Sedang Diproses</span>";
												}elseif($i['invoice_status'] == 4){
													echo "<span class='label label-warning'>Dikirim</span>";
												}elseif($i['invoice_status'] == 5){
													echo "<span class='label label-success'>Selesai</span>";
												}
												?>
											</td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>

							<br/>
							<p>Silahkan Lakukan Pembayaran Ke Nomor Rekening Berikut :</p>
							<table class="table table-bordered">
								<tr>
									<th width="30%">Nomor Rekening</th>
									<td>123-122-3345</td>
								</tr>
								<tr>
									<th>Atas Nama</th>
									<td>Toko Online Pakaian Tenun</td>
								</tr>
								<tr>
									<th>Bank</th>
									<td>BRI</td>
								</tr>
							</table>
							<br/>

							<form action="customer_pembayaran_act.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $id_invoice; ?>">
									<label>Upload Bukti Pembayaran</label>
									<input type="file" name="bukti" required="required">
									<small class="text-muted">File yang diperbolehkan hanya file gambar.</small>
								</div>
								<input type="submit" value="Upload Bukti Pembayaran" class="primary-btn">
							</form>

						</div>	

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>