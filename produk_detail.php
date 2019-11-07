<?php include 'header.php'; ?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Detail Produk</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<?php 
$id_produk = $_GET['id'];
$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori and produk_id='$id_produk'");
while($d=mysqli_fetch_array($data)){
	?>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">

							<div class="product-view">
								<?php if($d['produk_foto1'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto3'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto3'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

						</div>
						<div id="product-view">

							<div class="product-view">
								<?php if($d['produk_foto1'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto3'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto3'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($d['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $d['produk_foto2'] ?>">
								<?php } ?>
							</div>

						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<div class="product-label">
								<span><?php echo $d['kategori_nama']; ?></span>
								<span class="sale">Kualitas Terbaik</span>
							</div>
							<br>
							<h2 class="product-name"><?php echo $d['produk_nama']; ?></h2>
							<br>
							<h3 class="product-price"><?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?> <?php if($d['produk_jumlah'] == 0){?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
							<br/>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<!-- <a href="#">3 Review(s) / Add Review</a> -->
							</div>
							<br/>
							<p>
								<strong>Status:</strong> 
								<?php 
								if($d['produk_jumlah'] == 0){
									echo "Kosong";
								}else{
									echo "Tersedia";
								} 
								?>
							</p>
							<br/>

							<!-- <p><strong>Brand:</strong> E-SHOP</p> -->
							
							
							<!-- <div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:#475984;"></a></li>
									<li><a href="#" style="background-color:#8A2454;"></a></li>
									<li><a href="#" style="background-color:#BF6989;"></a></li>
									<li><a href="#" style="background-color:#9A54D8;"></a></li>
								</ul>
							</div> -->


							<form action="">
								<div class="product-btns">
									<!-- <div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input class="input" type="number" required="required">
									</div> -->
									<a class="primary-btn add-to-cart" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=detail"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>
									<div class="pull-right">
										<!-- <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button> -->
									</div>
								</div>
							</form>


						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									
									<p><?php echo $d['produk_keterangan']; ?></p>

								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<?php 
}
?>


<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Rekomendasi Produk Lainnya</h2>
				</div>
			</div>
			<!-- section title -->


			<?php           
			$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori order by rand() limit 4");
			while($d = mysqli_fetch_array($data)){
				?>

				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span><?php echo $d['kategori_nama'] ?></span>
							</div>

							<a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>

							<?php if($d['produk_foto1'] == ""){ ?>
								<img src="gambar/sistem/produk.png" style="height: 250px">
							<?php }else{ ?>
								<img src="gambar/produk/<?php echo $d['produk_foto1'] ?>" style="height: 250px">
							<?php } ?>
						</div>
						<div class="product-body">
							<h3 class="product-price"><?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?> <?php if($d['produk_jumlah'] == 0){?> <del class="product-old-price">Kosong</del> <?php } ?></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><?php echo $d['produk_nama']; ?></a></h2>
							<div class="product-btns">
								<a class="main-btn btn-block text-center" href="produk_detail.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-search"></i> Lihat</a>
								<a class="primary-btn add-to-cart btn-block text-center" href="keranjang_masukkan.php?id=<?php echo $d['produk_id']; ?>&redirect=detail"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<?php 
			}
			?>


		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

<?php include 'footer.php'; ?>