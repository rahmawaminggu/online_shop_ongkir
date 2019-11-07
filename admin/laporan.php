<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Penjualan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN LAPORAN" class="btn btn-sm btn-primary">
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Penjualan</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <a href="laporan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table-datatable">
                  <thead>
                    <tr>
                      <th width="1%">NO</th>
                      <th>INVOICE</th>
                      <th>TANGGAL MASUK</th>
                      <th>NAMA SUPLIER</th>
                      <th>JUMLAH</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=1;
                    $data = mysqli_query($koneksi,"SELECT * FROM invoice,customer WHERE invoice_customer=customer_id and date(invoice_tanggal) >= '$tgl_dari' AND date(invoice_tanggal) <= '$tgl_sampai'");
                    while($i = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
                        <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
                        <td><?php echo $i['customer_nama'] ?></td>
                        <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
                        <td>
                          <?php 
                          if($i['invoice_status'] == 0){
                            echo "Menunggu Pembayaran";
                          }elseif($i['invoice_status'] == 1){
                            echo "Menunggu Konfirmasi";
                          }elseif($i['invoice_status'] == 2){
                            echo "Ditolak";
                          }elseif($i['invoice_status'] == 3){
                            echo "Dikonfirmasi & Sedang Diproses";
                          }elseif($i['invoice_status'] == 4){
                            echo "Dikirim";
                          }elseif($i['invoice_status'] == 5){
                            echo "Selesai";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <?php 
            }else{
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            }
            ?>

          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>