<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Produk
      <small>Tambah Produk Baru</small>
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
            <h3 class="box-title">Tambah Produk</h3>
            <a href="produk.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">

            <form action="produk_act.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama" required="required" placeholder="Masukkan Nama ..">
              </div>

              <div class="form-group">
                <label>Kategori Produk</label>
                <div class="row">
                  <div class="col-lg-4">
                    <select name="kategori" required="required" class="form-control">
                      <option value="">- Pilih Kategori Produk -</option>
                      <?php 
                      include '../koneksi.php';
                      $data = mysqli_query($koneksi,"SELECT * FROM kategori");
                      while($d = mysqli_fetch_array($data)){
                        ?>
                        <option value="<?php echo $d['kategori_id']; ?>"><?php echo $d['kategori_nama']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Harga</label>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="number" class="form-control" name="harga" required="required" placeholder="Masukkan Harga ..">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Katerangan</label>
                <textarea name="keterangan" class="form-control textarea" required="required" style="resize: none" rows="10"></textarea>
              </div>

              <div class="form-group">
                <label>Berat Produk (gram)</label>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="number" class="form-control" name="berat" required="required" placeholder="Masukkan Berat ..">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Jumlah Stock</label>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="number" class="form-control" name="jumlah" required="required" placeholder="Masukkan Jumlah ..">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Foto 1 (Foto Utama)</label>
                <input type="file" name="foto1">
              </div>

              <div class="form-group">
                <label>Foto 2</label>
                <input type="file" name="foto2">
              </div>

              <div class="form-group">
                <label>Foto 3</label>
                <input type="file" name="foto3">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>

            </form>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>