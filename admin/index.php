<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $produk = mysqli_query($koneksi,"SELECT * FROM produk");
            ?>
            <h3><?php echo mysqli_num_rows($produk); ?></h3>
            <p>Jumlah Produk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="produk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $customer = mysqli_query($koneksi,"SELECT * FROM customer");
            ?>
            <h3><?php echo mysqli_num_rows($customer); ?></h3>
            <p>Jumlah Customer</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="customer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php 
            $invoice = mysqli_query($koneksi,"SELECT * FROM invoice");
            ?>
            <h3><?php echo mysqli_num_rows($invoice); ?></h3>
            <p>Jumlah Invoice</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-list"></i>
          </div>
          <a href="transaksi.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php 
            $admin = mysqli_query($koneksi,"SELECT * FROM admin");
            ?>
            <h3><?php echo mysqli_num_rows($admin); ?></h3>
            <p>Jumlah Pengguna</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>



    </div>

    <div class="row">    
      <section class="col-lg-7">

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Detail Login</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Nama</th>
                <td><?php echo $_SESSION['nama']; ?></td>
              </tr>
              <tr>
                <th>Username</th>
                <td><?php echo $_SESSION['username']; ?></td>
              </tr>
              <tr>
                <th>Level Hak Akses</th>
                <td>
                  <span class="label label-success text-uppercase"><?php echo $_SESSION['status']; ?></span>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>

  </section>

</div>
<?php include 'footer.php'; ?>