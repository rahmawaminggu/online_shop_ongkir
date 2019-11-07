<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Transaksi
      <small>Data Transaksi / Pesanan</small>
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
            <h3 class="box-title">Transaksi / Pesanan</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NO.INVOICE</th>
                    <th>TANGGAL</th>
                    <th>CUSTOMER</th>
                    <th>TOTAL BAYAR</th>
                    <th class="text-center">STATUS</th>
                    <th class="text-center">UPDATE STATUS</th>
                    <th class="text-center" width="25%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $invoice = mysqli_query($koneksi,"select * from invoice,customer where customer_id=invoice_customer order by invoice_id desc");
                  while($i = mysqli_fetch_array($invoice)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td>INVOICE-00<?php echo $i['invoice_id'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($i['invoice_tanggal'])); ?></td>
                      <td><?php echo $i['customer_nama'] ?></td>
                      <td><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></td>
                      <td class="text-center">
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
                      <td class="text-center">
                        <form action="transaksi_status.php" method="post">
                          <input type="hidden" value="<?php echo $i['invoice_id'] ?>" name="invoice">
                          <select name="status" id="" class="form-control" onchange="form.submit()">
                            <option <?php if($i['invoice_status'] == "0"){echo "selected='selected'";} ?> value="0">Menunggu Pembayaran</option>
                            <option <?php if($i['invoice_status'] == "1"){echo "selected='selected'";} ?> value="1">Menunggu Konfirmasi</option>
                            <option <?php if($i['invoice_status'] == "2"){echo "selected='selected'";} ?> value="2">Ditolak</option>
                            <option <?php if($i['invoice_status'] == "3"){echo "selected='selected'";} ?> value="3">Dikonfirmasi & Sedang Diproses</option>
                            <option <?php if($i['invoice_status'] == "4"){echo "selected='selected'";} ?> value="4">Dikirim</option>
                            <option <?php if($i['invoice_status'] == "5"){echo "selected='selected'";} ?> value="5">Selesai</option>
                          </select>
                        </form>
                      </td>
                      <td class="text-center">    

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#buktiPembayaran_<?php echo $i['invoice_id']; ?>">
                          <i class="fa fa-search"></i> Bukti Pembayaran
                        </button>

                        <div class="modal fade" id="buktiPembayaran_<?php echo $i['invoice_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Bukti Pembayaran</h4>
                              </div>
                              <div class="modal-body">

                                <center>
                                  <?php 
                                  if($i['invoice_bukti'] == ""){
                                    echo "Bukti pembayaran belum diupload oleh pembeli/customer.";
                                  }else{
                                    ?>
                                    <img src="../gambar/bukti_pembayaran/<?php echo $i['invoice_bukti']; ?>" alt="" style="width: 100%">
                                    <?php
                                  }
                                  ?>
                                </center>


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>


                        <a class='btn btn-sm btn-success' href="transaksi_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a>
                        <a class='btn btn-sm btn-danger' href="transaksi_hapus.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>