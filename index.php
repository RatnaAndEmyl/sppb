<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if (isset($_SESSION['s_username']) == null or ($_SESSION['s_status']) == 'N') {
    header("location:login.php");
}

include "koneksi.php";
//include "dist/ajax/ajax_index.php?page=home";

$angka = date('Ymdhis');

if ($_SESSION['s_username']) {
    $nik_login = $_SESSION['s_nik'];
    $nama = $_SESSION['s_nama'];
    $level = $_SESSION['s_level'];
    $email = $_SESSION['s_email'];
    $kode_user = $_SESSION['s_kode_user'];
    $kode_mitrakerja = $_SESSION['s_kode_mitrakerja'];
    $kode_departemen = $_SESSION['s_kode_departemen'];
    $username = $_SESSION['s_username'];
    $token_aktivasi = $_SESSION['s_token_aktivasi'];
    $nama_departemen = $_SESSION['s_nama_departemen'];
    $nama_subdepartemen = $_SESSION['s_nama_subdepartemen'];
    $kode_jabatan = $_SESSION['s_kode_jabatan'];
    $jabatan = $_SESSION['s_jabatan'];

    $pengguna = $_SESSION['s_pilih_pengguna_mobil'];
    $jangka = $_SESSION['s_pilih_jangka'];
    $jatuh = $_SESSION['s_pilih_jatuh'];
    $pengingat = $_SESSION['s_pilih_pengingat'];

    $limit = "5"; 

    // $pilih_pengguna = $_SESSION['s_pilih_pengguna'];
}
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPPB</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/datatables/fixedColumns.dataTables.min.css">

    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- Fontawesome 6.1.1 -->
    <script src="https://kit.fontawesome.com/856393114b.js" crossorigin="anonymous"></script>
    <!-- js pembatas tanggal -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



</head>

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
            <div class="boxes">
                <div class="box">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="box">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="box">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="box">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        <!-- <img class="animation__shake" src="dist/img/rusa.gif" alt="AdminLTELogo" height="200" width="250"> -->
    </div>


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-light"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt text-light"></i>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user text-light"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <div class="dropdown-divider"></div>
                    <!-- <a href="?page=home&aksi=ubah_biodata" class="dropdown-item">
                        <i class="fa fa-user text-light"></i> Biodata
                    </a> -->

                    <a href="logout.php" class="dropdown-item">
                        <i class="fa fa-power-off"></i> Logout
                    </a>

                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php?page=home" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SPPB</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info text-white">

                    <a href="#" class="d-block"><?php echo $nama; ?> </a>
                    <a href="#" class="d-block">(<?php echo $level; ?>) </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="index.php?page=home" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <?php

                    $sql = $koneksi_master->query("select * from pb_role.tb_modul where status='A' and kode_modul in (select distinct kode_modul from pb_role.tb_submodul a join pb_role.tb_user_submodul b on a.kode_submodul=b.kode_submodul and b.kode_user='$kode_user' ) ORDER BY nama_modul asc");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    <?php echo $data['nama_modul'] ?>
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <?php
                                $kode_modul = $data['kode_modul'];
                                $sql2 = $koneksi_master->query("select * from pb_role.tb_submodul where kode_modul='$kode_modul' and status='A' and kode_submodul in (select kode_submodul from pb_role.tb_user_submodul where kode_user='$kode_user')  ORDER BY nama_submodul asc");
                                while ($data2 = $sql2->fetch_assoc()) {
                                ?>

                                    <li class="nav-item">

                                        <?php echo '<a href="' . $data2['link'] . '" class="nav-link">' ?>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?php echo $data2['nama_submodul'] ?></p>
                                        </a>
                                    </li>

                                <?php } ?>

                            </ul>
                        </li>
                    <?php } ?>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 fi">
                        <?php
                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];
                        if ($aksi == "") {
                            $link = "page/" . $page . "/" . $page . ".php";
                        } else {
                            $link = "page/" . $page . "/" . $aksi . ".php";
                        }

                        include $link;

                        ?>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <section class="col-lg-5 connectedSortable">
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; April 2022</strong> AdminLTE.io.
        All rights reserved. Designed and Developed by <strong>IT SNI</strong>

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="dist/js/input_rupiah.js"></script>
<script src="dist/js/input_rupiah2.js"></script>
<script src="dist/js/view_submodul.js"></script>
<script src="dist/js/view_pembelian.js"></script>
<script src="dist/js/cari_nama_barang.js"></script>
<script src="dist/js/cari_nama_subkategori.js"></script>
<script src="dist/js/view_deskripsi_aktiva.js"></script>
<script src="dist/js/limit.js"></script>
<script src="dist/js/pilih_tanggal.js"></script>
<script src="dist/js/status_permintaan.js"></script>
<script src="dist/js/pilih_gudang.js"></script>
<script src="dist/js/pilih_departemen.js"></script>
<script src="dist/js/pilih_pengguna.js"></script>
<script src="dist/js/view_periode.js"></script>
<script src="dist/js/view_p_perulangan.js"></script>
<script src="dist/js/change_on_off.js"></script>
<script src="dist/js/cari_data.js"></script>
<script src="dist/js/cari_nama_pemohon.js"></script>
<script src="dist/js/view_jatuh_tempo.js"></script>
<script src="dist/js/pilih_pengguna_mobil.js"></script>
<script src="dist/js/pilih_jangka.js"></script>
<script src="dist/js/pilih_jatuh.js"></script>
<script src="dist/js/pilih_pengingat.js"></script>
<script src="dist/js/rupiah.js"></script>
<script src="dist/js/cari_nama_barang_sppb.js"></script>
<script src="dist/js/view_pemenuhan.js"></script>
<script src="dist/js/view_pemenuhan_sppb.js"></script>
<script src="dist/js/view_pemenuhan_po.js"></script>
<script src="dist/js/rupiah.js"></script>


<!-- Punya BBK -->
<script src="dist/js/tanggal.js"></script>
<script src="dist/js/pilih_departemen_bbk.js"></script>
<script src="dist/js/status_bbk.js"></script>
<script src="dist/js/pilih_gudang_bbk.js"></script>
<script src="dist/js/pilih_pengguna_bbk.js"></script>
<script src="dist/js/view_notifikasi_jumlah.js"></script>
<!-- Punya BBK -->

<!-- Punya sppb -->
<script src="dist/js/tanggal_sppb.js"></script>
<script src="dist/js/pilih_departemen_sppb.js"></script>
<script src="dist/js/status_sppb.js"></script>
<script src="dist/js/pilih_gudang_sppb.js"></script>
<script src="dist/js/pilih_pengguna_sppb.js"></script>
<!-- Punya sppb -->

<!-- Punya po -->
<script src="dist/js/tanggal_po.js"></script>
<script src="dist/js/pilih_departemen_po.js"></script>
<script src="dist/js/status_po.js"></script>
<script src="dist/js/pilih_gudang_po.js"></script>
<script src="dist/js/pilih_pengguna_po.js"></script>
<!-- Punya po -->

<!-- Punya bbm -->
<script src="dist/js/tanggal_bbm.js"></script>
<script src="dist/js/pilih_departemen_bbm.js"></script>
<script src="dist/js/status_bbm.js"></script>
<script src="dist/js/pilih_gudang_bbm.js"></script>
<script src="dist/js/pilih_pengguna_bbm.js"></script>
<script src="dist/js/pilih_suplier_bbm.js"></script>
<!-- Punya bbm -->

<script src="dist/js/view_notifikasi_jumlah_sppb.js"></script>
<script src="dist/js/cari_nama.js"></script>
<script src="dist/js/cari_nama_barang_adjustment.js"></script>
<script src="dist/js/cari_subdepartemen.js"></script>
<script src="dist/js/view_notifikasi_jumlah_po.js"></script>

<!-- Punya history_stok -->
<script src="dist/js/pilih_gudang_history.js"></script>
<script src="dist/js/pilih_barang_history.js"></script>
<!-- Punya history_stok -->


<script src="dist/js/pilih_dashboard.js"></script>
<script src="dist/js/view_adjustment.js"></script>


<script>
    $(document).ready(function() {
        // $('#example1').DataTable({
        $('#example1').DataTable({
            // responsive: true,
            lengthChange: true,
            pagingType: 'full_numbers',
            autoWidth: false,
            buttons: ["excel", "pdf", "print"],
            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

<script>
    $(document).ready(function() {
        // $('#example2').DataTable({
        $('#example2').DataTable({
            // responsive: true,
            lengthChange: true,
            pagingType: 'full_numbers',
            autoWidth: false,
            buttons: ["excel", "pdf", "print"],
            // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>');
                            });
                    });
            },
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>



</body>

</html>

<!-- loader -->
<style>
    .boxes {
  --size: 32px;
  --duration: 800ms;
  height: calc(var(--size) * 2);
  width: calc(var(--size) * 3);
  position: relative;
  transform-style: preserve-3d;
  transform-origin: 50% 50%;
  margin-top: calc(var(--size) * 1.5 * -1);
  transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
}

.boxes .box {
  width: var(--size);
  height: var(--size);
  top: 0;
  left: 0;
  position: absolute;
  transform-style: preserve-3d;
}

.boxes .box:nth-child(1) {
  transform: translate(100%, 0);
  -webkit-animation: box1 var(--duration) linear infinite;
  animation: box1 var(--duration) linear infinite;
}

.boxes .box:nth-child(2) {
  transform: translate(0, 100%);
  -webkit-animation: box2 var(--duration) linear infinite;
  animation: box2 var(--duration) linear infinite;
}

.boxes .box:nth-child(3) {
  transform: translate(100%, 100%);
  -webkit-animation: box3 var(--duration) linear infinite;
  animation: box3 var(--duration) linear infinite;
}

.boxes .box:nth-child(4) {
  transform: translate(200%, 0);
  -webkit-animation: box4 var(--duration) linear infinite;
  animation: box4 var(--duration) linear infinite;
}

.boxes .box > div {
  --background: #5C8DF6;
  --top: auto;
  --right: auto;
  --bottom: auto;
  --left: auto;
  --translateZ: calc(var(--size) / 2);
  --rotateY: 0deg;
  --rotateX: 0deg;
  position: absolute;
  width: 100%;
  height: 100%;
  background: var(--background);
  top: var(--top);
  right: var(--right);
  bottom: var(--bottom);
  left: var(--left);
  transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
}

.boxes .box > div:nth-child(1) {
  --top: 0;
  --left: 0;
}

.boxes .box > div:nth-child(2) {
  --background: #145af2;
  --right: 0;
  --rotateY: 90deg;
}

.boxes .box > div:nth-child(3) {
  --background: #447cf5;
  --rotateX: -90deg;
}

.boxes .box > div:nth-child(4) {
  --background: #DBE3F4;
  --top: 0;
  --left: 0;
  --translateZ: calc(var(--size) * 3 * -1);
}

@-webkit-keyframes box1 {
  0%, 50% {
    transform: translate(100%, 0);
  }

  100% {
    transform: translate(200%, 0);
  }
}

@keyframes box1 {
  0%, 50% {
    transform: translate(100%, 0);
  }

  100% {
    transform: translate(200%, 0);
  }
}

@-webkit-keyframes box2 {
  0% {
    transform: translate(0, 100%);
  }

  50% {
    transform: translate(0, 0);
  }

  100% {
    transform: translate(100%, 0);
  }
}

@keyframes box2 {
  0% {
    transform: translate(0, 100%);
  }

  50% {
    transform: translate(0, 0);
  }

  100% {
    transform: translate(100%, 0);
  }
}

@-webkit-keyframes box3 {
  0%, 50% {
    transform: translate(100%, 100%);
  }

  100% {
    transform: translate(0, 100%);
  }
}

@keyframes box3 {
  0%, 50% {
    transform: translate(100%, 100%);
  }

  100% {
    transform: translate(0, 100%);
  }
}

@-webkit-keyframes box4 {
  0% {
    transform: translate(200%, 0);
  }

  50% {
    transform: translate(200%, 100%);
  }

  100% {
    transform: translate(100%, 100%);
  }
}

@keyframes box4 {
  0% {
    transform: translate(200%, 0);
  }

  50% {
    transform: translate(200%, 100%);
  }

  100% {
    transform: translate(100%, 100%);
  }
}
/*  */
</style>
