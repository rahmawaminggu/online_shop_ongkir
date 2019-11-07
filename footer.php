

<!-- FOOTER -->
<footer id="footer" class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<!-- footer logo -->
					<div class="footer-logo">
						<a class="logo" href="#">
							<img src="frontend/img/logo.png" alt="">
						</a>
					</div>
					<!-- /footer logo -->

					<p>Toko online penyedia pakaian tenun terlengkap, tersedia berbagai ukuran dengan kualitas terbaik.</p>

				</div>
			</div>
			<!-- /footer widget -->

			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">My Account</h3>
					<ul class="list-links">
						<li><a href="keranjang.php">Keranjang</a></li>
						<li><a href="checkout.php">Checkout</a></li>
						<li><a href="daftar.php">Daftar</a></li>
						<li><a href="masuk.php">Login</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer widget -->

			<div class="clearfix visible-sm visible-xs"></div>

			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Customer Service</h3>
					<ul class="list-links">
						<li><a href="#">Tentang</a></li>
						<li><a href="#">Pengiriman</a></li>
						<li><a href="#">Tracking Resi</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer widget -->

			<!-- footer subscribe -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Stay Connected</h3>
					
					<p>Follow media sosial kami untuk lebih dekat dan mendapat informasi-informasi terbaru tentang toko kami.</p>
					
					<!-- footer social -->
					<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
					<!-- /footer social -->
				</div>
			</div>
			<!-- /footer subscribe -->
		</div>
		<!-- /row -->
		<hr>
		<!-- row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<!-- footer copyright -->
				<div class="footer-copyright">
					
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
					
				</div>
				<!-- /footer copyright -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="frontend/js/jquery.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/slick.min.js"></script>
<script src="frontend/js/nouislider.min.js"></script>
<script src="frontend/js/jquery.zoom.min.js"></script>
<script src="frontend/js/main.js"></script>

</body>

<script>

	$(document).ready(function(){

		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		$('.jumlah').on("keyup",function(){
			var nomor = $(this).attr('nomor');

			var jumlah = $(this).val();

			var harga = $("#harga_"+nomor).val();

			var total = jumlah*harga;

			var t = numberWithCommas(total);

			$("#total_"+nomor).text("Rp. "+t+" ,-");
		});
	});








	$(document).ready(function(){
		$('#provinsi').change(function(){
			var prov = $('#provinsi').val();


			var provinsi = $("#provinsi :selected").text();

			$.ajax({
				type : 'GET',
				url : 'rajaongkir/cek_kabupaten.php',
				data :  'prov_id=' + prov,
				success: function (data) {
					$("#kabupaten").html(data);
					$("#provinsi2").val(provinsi);
				}
			});
		});

		$(document).on("change","#kabupaten",function(){

			var asal = 152;
			var kab = $('#kabupaten').val();
			var kurir = "a";
			var berat = $('#berat2').val();

			var kabupaten = $("#kabupaten :selected").text();

			$.ajax({
				type : 'POST',
				url : 'rajaongkir/cek_ongkir.php',
				data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
				success: function (data) {
					$("#ongkir").html(data);
					// alert(data);

					// $("#provinsi").val(prov);
					$("#kabupaten2").val(kabupaten);

				}
			});
		});

		function format_angka(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		$(document).on("change", '.pilih-kurir', function(event) { 
			// alert("new link clicked!");
			var kurir = $(this).attr("kurir");
			var service = $(this).attr("service");
			var ongkir = $(this).attr("harga");
			var total_bayar = $("#total_bayar").val();

			$("#kurir").val(kurir);
			$("#service").val(service);
			$("#ongkir2").val(ongkir);
			var total = parseInt(total_bayar) + parseInt(ongkir);
			$("#tampil_ongkir").text("Rp. "+ format_angka(ongkir) +" ,-");
			$("#tampil_total").text("Rp. "+ format_angka(total) +" ,-");
		});


		// $(".pilih-kurir").on("change",function(){

		// 	alert('sd');
			// var asal = 152;
			// var kab = $('#kabupaten').val();
			// var kurir = "a";
			// var berat = $('#berat2').val();

			// $.ajax({
			// 	type : 'POST',
			// 	url : 'rajaongkir/cek_ongkir.php',
			// 	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
			// 	success: function (data) {
			// 		$("#ongkir").html(data);
			// 		// alert(data);

			// 	}
			// });
		// });



	});
</script>

</html>