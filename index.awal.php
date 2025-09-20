<?php
    include 'koneksi.php';

    $stmt = $conn->prepare("SELECT resep.*, kategori.nama_kategori 
                        FROM resep
                        JOIN kategori ON resep.id_kategori = kategori.id_kategori");

    $stmt->execute();
    $resep = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">
  <title>index awal</title>

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
  <!-- data table -->
  <link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    
    </style>
</head>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake brand-image img-circle elevation-3"  height="60" width="60">
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
      <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" >Dapur Mamak'e</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="theme/dist/img/apps.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index-cineplex.php" class="d-block">Dashboard</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
</ul>
</nav>
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
            <h1 class="m-0"><strong>Dapur Mamak'e </strong></h1>
          </div><!-- /.col -->
        
          </div><!-- /.col -->
          <!-- <button type="button" class="btn btn-block btn-primary"><a href="form-add-movie.php">Add New Movie</a></button> -->
          <button type="button" class="btn btn-block btn-danger" style="border-radius: 20px;">
  <a href="form.add.resep.php" style="color: white; text-decoration: none;">Tambahkan Resep Baru</a>
</button>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- ./col -->
        </div>

        <!-- tabel riwayat input data film-->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Input Resep</h3>
              </div>
        <div class="card-body">

                <table id="tabelRiwayat" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Alat</th>
                    <th>Bahan</th>
                    <th>Cara</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($resep as $r):?>
                  <tr>
                    <td><?php echo $r['nama']; ?></td>
                    <td><?php echo $r['alat']; ?></td>
                    <td><?php echo $r['bahan']; ?></td>
                    <td><?php echo $r['cara']; ?></td>
                    <td><?php echo $r['nama_kategori']; ?></td>
                    <td><a href="./hapus.resep.php?id_resep=<?php echo $r['id_resep'] ?>" class="btn btn-danger">Hapus</a></td>
                    <td><a href="./form.edit.resep.php?id_resep=<?php echo $r['id_resep'] ?>" class="btn btn-Secondary">Edit</a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- <section class="col-lg-7 connectedSortable"> -->
            <!-- Custom tabs (Charts with tabs)-->
            <!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->
              
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
<script src="theme/plugins/flot/jquery.flot.js"></script>
<script src="theme/plugins/flot/plugins/jquery.flot.pie.js"></script>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#tabelRiwayat').DataTable({
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ entri",
        "zeroRecords": "Data tidak ditemukan",
        
      }
    });
  });
</script>

</body>
</html>