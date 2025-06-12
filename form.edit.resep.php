<?php
include 'koneksi.php';

// Pastikan parameter id_resep ada di URL
if (!isset($_GET['id_resep'])) {
    echo "ID resep tidak ditemukan!";
    exit;
}

$id_resep = $_GET['id_resep'];

// Ambil data resep dari database berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM resep WHERE id_resep = ?");
$stmt->execute([$id_resep]);
$resep = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika tidak ditemukan
if (!$resep) {
    echo "Data resep tidak ditemukan!";
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>Edit resep</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="theme/plugins/summernote/summernote-bs4.min.css">
  <style>
    
    </style>
</head>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dapur Mamak"e</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.awal.php" class="d-block">Dashboard </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><strong>Dapur Mamak'e</strong></h1>
          </div><!-- /.col -->
          <div class="col-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
        
            <div class="card-header">
            <h4 class="card-title">
                Edit Resep
            </h4>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="aksi.edit.php"  enctype="multipart/form-data">
                 <input type="hidden" name="id_resep" value="<?php echo $resep['id_resep']; ?>">
                 <input type="hidden" name="status" value="aktif">

                <div class="form-group row">
                    <label class="col-4 col-form-label">Nama</label>
                    <div class="col-8">
                      <textarea class="form-control" name="nama"><?php echo $resep['nama']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Alat</label>
                    <div class="col-8">
                      <textarea class="form-control" name="alat" rows="5"><?php echo $resep['alat']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Bahan</label>
                    <div class="col-8">
                      <textarea class="form-control" name="bahan" rows="5"><?php echo $resep['bahan']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Cara</label>
                    <div class="col-8">
                      <textarea class="form-control" name="cara" rows="5"><?php echo $resep['cara']; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-4 col-form-label">Kategori</label>
                    <div class="col-8">
                    <select class="form-select form-control" aria-label="Default select example" name="kategori" required >
  <option selected>Pilih Kategori</option>
 <option value="makanan" <?php if($resep['id_kategori'] == '1') echo 'selected'; ?>>makanan</option>
 <option value="minuman" <?php if($resep['id_kategori'] == '2') echo 'selected'; ?>>minuman</option>
</select>
                    </div>
                  </div>

        <button type="submit" name="simpan_edit" class="btn btn-block btn-danger" style="width: 80px; margin: 10px;">Simpan</button>
            </div>
            </form>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="theme/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="theme/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="theme/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="theme/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="theme/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="theme/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="theme/plugins/moment/moment.min.js"></script>
<script src="theme/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="theme/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="theme/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="theme/dist/js/pages/dashboard.js"></script>
</body>
</html>