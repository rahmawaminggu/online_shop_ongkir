<?php
	// $asal = $_POST['asal'];
$id_kabupaten = $_POST['kab_id'];
$kurir = $_POST['kurir'];
$berat = $_POST['berat'];

$curl_pos = curl_init();
curl_setopt_array($curl_pos, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=152&destination=".$id_kabupaten."&weight=".$berat."&courier=pos",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: 8f22875183c8c65879ef1ed0615d3371"
	),
));

$curl_jne = curl_init();
curl_setopt_array($curl_jne, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=152&destination=".$id_kabupaten."&weight=".$berat."&courier=jne",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: 8f22875183c8c65879ef1ed0615d3371"
	),
));

$curl_tiki = curl_init();
curl_setopt_array($curl_tiki, array(
	CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=152&destination=".$id_kabupaten."&weight=".$berat."&courier=tiki",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: 8f22875183c8c65879ef1ed0615d3371"
	),
));

$response_pos = curl_exec($curl_pos);
$err_pos = curl_error($curl_pos);

$response_jne = curl_exec($curl_jne);
$err_jne = curl_error($curl_jne);

$response_tiki = curl_exec($curl_tiki);
$err_tiki = curl_error($curl_tiki);

curl_close($curl_pos);
curl_close($curl_jne);
curl_close($curl_tiki);

if ($err_pos) {
	echo "cURL Error #:" . $err;
} else {
	$data_pos = json_decode($response_pos, true);
	$data_jne = json_decode($response_jne, true);
	$data_tiki = json_decode($response_tiki, true);
	// echo $data_pos;
	// print_r($data_pos['rajaongkir']['results']);
	// echo "<pre>";
	// print_r($data_jne);
	// echo "</pre>";
	?>
	<table class="table table-bordered">
		<tr>
			<th>Kurir</th>
			<th>Service</th>
			<th>Ongkir</th>
			<th>Lama Pengiriman</th>
			<th>Pilih Kurir</th>
		</tr>
		<?php
		if(count($data_pos['rajaongkir']['results'][0]['costs']) > 0){
			for($a = 0;$a < count($data_pos['rajaongkir']['results'][0]['costs']);$a++){
				?>
				<tr>
					<td>Pos Indonesia</td>
					<td><?php echo $data_pos['rajaongkir']['results'][0]['costs'][$a]['service']; ?></td>
					<td><?php echo "Rp. ". number_format($data_pos['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value'])." ,-"; ?></td>
					<td><?php echo $data_pos['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['etd']; ?></td>
					<td class="text-center">
						<input type="radio" name="kurirx" class="pilih-kurir" kurir="Pos Indonesia" service="<?php echo $data_pos['rajaongkir']['results'][0]['costs'][$a]['service']; ?>" harga="<?php echo $data_pos['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value']; ?>" required="required">
					</td>
				</tr>
				<?php 
			}
		}
		?>

		<?php 
		if(count($data_jne['rajaongkir']['results'][0]['costs']) > 0){
			for($a = 0;$a < count($data_jne['rajaongkir']['results'][0]['costs']);$a++){
				?>
				<tr>
					<td>JNE</td>
					<td><?php echo $data_jne['rajaongkir']['results'][0]['costs'][$a]['service']; ?></td>
					<td><?php echo "Rp. ". number_format($data_jne['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value'])." ,-"; ?></td>
					<td><?php echo $data_jne['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['etd']; ?></td>
					<td class="text-center">
						<input type="radio" name="kurirx" class="pilih-kurir" kurir="JNE" service="<?php echo $data_jne['rajaongkir']['results'][0]['costs'][$a]['service']; ?>" harga="<?php echo $data_jne['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value']; ?>" required="required">
					</td>
				</tr>
				<?php 
			}
		}
		?>

		<?php
		if(count($data_tiki['rajaongkir']['results'][0]['costs']) > 0){
			for($a = 0;$a < count($data_tiki['rajaongkir']['results'][0]['costs']);$a++){
				?>
				<tr>
					<td>TIKI</td>
					<td><?php echo $data_tiki['rajaongkir']['results'][0]['costs'][$a]['service']; ?></td>
					<td><?php echo "Rp. ". number_format($data_tiki['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value'])." ,-"; ?></td>
					<td><?php echo $data_tiki['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['etd']; ?></td>
					<td class="text-center">
						<input type="radio" name="kurirx" class="pilih-kurir" kurir="TIKI" service="<?php echo $data_tiki['rajaongkir']['results'][0]['costs'][$a]['service']; ?>" harga="<?php echo $data_tiki['rajaongkir']['results'][0]['costs'][$a]['cost'][0]['value']; ?>" required="required">
					</td>
				</tr>
				<?php 
			}
		}
		?>
	</table>

	<?php

}








?>