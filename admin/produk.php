<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Produk
      <small>Data Produk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-10 col-lg-offset-1">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Produk</h3>
            <a href="produk_tambah.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Produk Baru</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA PRODUK</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th width="15%">FOTO</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM produk,kategori where kategori_id=produk_kategori order by produk_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['produk_nama']; ?></td>
                      <td><?php echo $d['kategori_nama']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['produk_harga']).",-"; ?></td>
                      <td><?php echo number_format($d['produk_jumlah']); ?></td>
                      <td>
                        <center>
                          <?php if($d['produk_foto1'] == ""){ ?>
                            <img src="../gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/produk/<?php echo $d['produk_foto1'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>

                        <center>
                          <?php if($d['produk_foto2'] == ""){ ?>
                            <img src="../gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/produk/<?php echo $d['produk_foto2'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>

                        <center>
                          <?php if($d['produk_foto3'] == ""){ ?>
                            <img src="../gambar/sistem/produk.png" style="width: 80px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/produk/<?php echo $d['produk_foto3'] ?>" style="width: 80px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="produk_edit.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-cog"></i></a>
                        <a class="btn btn-danger btn-sm" href="produk_hapus.php?id=<?php echo $d['produk_id'] ?>"><i class="fa fa-trash"></i></a>
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