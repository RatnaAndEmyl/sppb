<!-- loader -->
<!-- <style>
  .container-circle {
    width: 200px;
    height: 60px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  .circle {
    width: 20px;
    height: 20px;
    position: absolute;
    border-radius: 50%;
    background-color: #347b5a;
    left: 15%;
    transform-origin: 50%;
    animation: circle .5s alternate infinite ease;
  }

  @keyframes circle {
    0% {
      top: 60px;
      height: 5px;
      border-radius: 50px 50px 25px 25px;
      transform: scaleX(1.7);
    }

    40% {
      height: 20px;
      border-radius: 50%;
      transform: scaleX(1);
    }

    100% {
      top: 0%;
    }
  }

  .circle:nth-child(2) {
    left: 45%;
    animation-delay: .2s;
  }

  .circle:nth-child(3) {
    left: auto;
    right: 15%;
    animation-delay: .3s;
  }

  .shadow {
    width: 20px;
    height: 4px;
    border-radius: 50%;
    background-color: rgba(100, 186, 72, .5);
    position: absolute;
    top: 62px;
    transform-origin: 50%;
    z-index: -1;
    left: 15%;
    filter: blur(1px);
    animation: shadow .5s alternate infinite ease;
  }

  @keyframes shadow {
    0% {
      transform: scaleX(1.5);

    }

    40% {
      transform: scaleX(1);
      opacity: .7;
    }

    100% {
      transform: scaleX(.2);
      opacity: .4;
    }
  }

  .shadow:nth-child(4) {
    left: 45%;
    animation-delay: .2s;
  }

  .shadow:nth-child(5) {
    left: auto;
    right: 15%;
    animation-delay: .3s;
  }
</style> -->

<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if (isset($_SESSION['s_nik']) == null or ($_SESSION['s_status']) == 'N') {
  header("location:login.php");
}

include "koneksi.php";

$angka = date('Ymdhis');

if ($_SESSION['s_username']) {
  $user = $_SESSION['s_username'];
  $nama = $_SESSION['s_nama'];
  $level = $_SESSION['s_level'];
  $wo = $_SESSION['s_wo'];
  $deskripsi = $_SESSION['s_kodesubdept'];
  $deskripsi_nama = $_SESSION['s_deskripsi'];
  $kode_departemen = $_SESSION['s_kodedept'];
  $nama_departemen = $_SESSION['s_namadept'];
  $kodeuser = $_SESSION['s_kodeuser'];
  $nik = $_SESSION['s_nik'];
  $kode_analisa_jabatan = $_SESSION['s_kode_analisa_jabatan'];
  $kode_jabatan = $_SESSION['s_kode_jabatan'];
  $kode_subdepartemen = $_SESSION['s_kode_subdepartemen'];
  $kode_departemen = $_SESSION['s_kode_departemen'];
  $nama_departemen = $_SESSION['s_nama_departemen'];
  $nama_subdepartemen = $_SESSION['s_nama_subdepartemen'];
  $nama_jabatan = $_SESSION['s_nama_jabatan'];


  $server = $_SESSION['s_server'];
  $kode_mitrakerja = $_SESSION['s_mitrakerja'];

  if ($level == 'Magang') {
    $dashboard = "7";
  } else if ($level <> 'Magang') {
    $dashboard = "1";
  }

  $dashboard_ijin = "ALL";
  $dashboard_status_ijin = "A";
  $limit = "5";
  $limitperijinan = "6";
  $s_nik_kondite = $_SESSION['s_nik_kondite'];

  $dashboard_inputan = "I";
  $status_jadwal = "S";




  // reminder

  // reminder
}

?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SPPB</title>
  <link rel="icon" type="image/png" sizes="16x16" href="dist/icons/hr.png">
  <!-- <link rel="icon" type="image/png" href="dist/icons/favicon.ico"/> -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" href="plugins/fontawesome-web/css/all.min.css">
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

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->



</head>
<?php if ($level == 'PENCARI KERJA') { ?>

  <body class="sidebar-collapse sidebar-closed" style="height: auto;">
  <?php } else {
  ($level == 'PENCARI KERJA')  ?>

    <body class="layout-footer-fixed layout-navbar-fixed layout-fixed text-sm" style="height: auto;">
    <?php } ?>
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <!-- <span class="loader"></span> -->
        <div class="container-circle">
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="shadow"></div>
          <div class="shadow"></div>
          <div class="shadow"></div>
        </div>
        <!-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <?php if ($level <> 'PENCARI KERJA') { ?>
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            <?php } else {
              ($level == 'PENCARI KERJA')  ?>
              <a class="nav-link" href="index.php?page=home" role="button"><i class="fas fa-home"> Dashboard </i></a>
            <?php } ?>
          </li>
        </ul>

        <?php
        $sqltext = "select * from hr_master.tb_trxtype a join hr_master.tb_persyaratan b on a.kode_persyaratan=b.kode_persyaratan where a.status='A' ";

        $sqltext = $sqltext . " and b.kode_persyaratan = 'PSY040'";

        $sqltext = $sqltext . " ORDER BY a.value asc";

        $sql = $koneksi_master->query($sqltext);

        ?>
        <marquee behavior="scroll" scrollamount="2" direction="left" onmouseover="this.stop();" onmouseout="this.start();">

          <?php while ($data = $sql->fetch_assoc()) {
            echo $data['deskripsi'];
          }  ?>

        </marquee>


        <!-- <marquee direction="left" scrollamount="2" align="center" behavior="alternate"> <b>Bagi yang merasa tidak sesuai, silahkan hubungi Norfadillah (IT) - CP : 0822 4060 3916 </b> </marquee> -->



        <ul class="navbar-nav ml-auto">


          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

              <div class="dropdown-divider"></div>
              <a href="?page=home&aksi=ubah_biodata" class="dropdown-item">
                <i class="fa fa-user"></i> Biodata
              </a>

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
          <img src="dist/img/AdminLTELogo.png" alt="HR Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">HR-BASE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $nama; ?> </a>
              <a href="#" class="d-block">(<?php echo $nama_jabatan; ?> <?php echo $nama_subdepartemen; ?>) </a>
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
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



              <li class="nav-item">
                <a href="index.php?page=home" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <?php

              $sql = $koneksi_master->query("select * from db_role.tb_modul where status='A' and kode_modul in (select distinct kode_modul from db_role.tb_submodul a join db_role.tb_user_submodul b on a.kode_submodul=b.kode_submodul and b.kode_user='$kodeuser' and a.status='A' and (website='$server' or website='ALL')) ORDER BY nama_modul asc");
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
                    $sql2 = $koneksi_master->query("select * from db_role.tb_submodul where kode_modul='$kode_modul' and status='A'  and kode_submodul in (select kode_submodul from db_role.tb_user_submodul where kode_user='$kodeuser' and (website='$server' or website='ALL'))  ORDER BY nama_submodul asc");
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


        <!-- <section class="content">
          <div class="container">

            <div class="row">
              <section class="col-lg-5 connectedSortable">
              </section>
              
            </div>
          
        </section> -->
      </div>
    </div>

    <!-- <footer class="main-footer fixed-bottom">
 
        <strong>Copyright &copy; May 2022</strong> AdminLTE.io.
        All rights reserved. Designed and Developed by <strong>IT SNI</strong>

    </footer> -->


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
    <script src="dist/js/demo.js"></script>
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
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <script src="plugins/datatables/dataTables.fixedColumns.min.js"></script>

    <script>
      $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
          mode: "htmlmixed",
          theme: "monokai"
        });
      })
    </script>
    <script>
      $(document).ready(function() {
        var table = $('#examplerekap').DataTable({
          scrollY: "450px",
          scrollX: true,
          scrollCollapse: true,
          paging: false,
          buttons: ["excel", "pdf", "print"],
          fixedColumns: {
            left: 2
            // right: 1
          },


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
        }).buttons().container().appendTo('#examplerekap_wrapper .col-md-6:eq(0)');
      });
    </script>


    <script>
      $(document).ready(function() {
        var table = $('#examplescroll').DataTable({
          scrollY: "500px",
          scrollX: true,
          scrollCollapse: true,
          paging: false,



          buttons: ["excel", "pdf", "print"],
          fixedColumns: {
            left: 2
            // right: 1
          },


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
        }).buttons().container().appendTo('#examplescroll_wrapper .col-md-6:eq(0)');
      });
    </script>



    <script>
      $(document).ready(function() {
        var table = $('#examplerekap1').DataTable({
          scrollY: "500px",
          scrollX: true,
          scrollCollapse: true,
          paging: false,
          //
          //   lengthChange: true,
          //   pagingType: 'full_numbers',
          // autoWidth: false,
          buttons: ["excel", "pdf", "print"],
          fixedColumns: {
            left: 1,
            // right: 1
          },




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
        }).buttons().container().appendTo('#examplerekap_wrapper .col-md-6:eq(0)');
      });
    </script>




    <script>
      $(document).ready(function() {
        // $('#example1').DataTable({
        $('#example1').DataTable({

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
        // $('#example1').DataTable({
        $('#example2').DataTable({

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
      $(document).ready(function() {
        // $('#example1').DataTable({
        $('#example3').DataTable({

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
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
      });
    </script>

    <script>
      $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example tfoot th').each(function() {
          var title = $(this).text();
          // $(this).html('<input type="text" placeholder="Search ' + title + '" />');
          $(this).html('<input type="text" placeholder=' + title + ' />');
        });

        // DataTable
        var table = $('#example').DataTable({

          lengthChange: true,
          pagingType: 'full_numbers',
          autoWidth: false,
          buttons: ["excel", "pdf", "print"],

          initComplete: function() {
            // Apply the search
            this.api()
              .columns()
              .every(function() {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function() {
                  if (that.search() !== this.value) {
                    that.search(this.value).draw();
                  }
                });
              });
          },
        });
      })
    </script>
    <!-- <script>
      $(function() {
        $("#example").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script> -->



    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
          'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

      })
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      // DropzoneJS Demo Code Start
      Dropzone.autoDiscover = false

      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)

      var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      })

      myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
          myDropzone.enqueueFile(file)
        }
      })

      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      })

      myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      })

      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
      })

      // Setup the buttons for all transfers
      // The "add files" button doesn't need to be setup because the config
      // `clickable` has already been specified.
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
      // DropzoneJS Demo Code End
    </script>

    <script>
      $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
          'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
          icons: {
            time: 'far fa-clock'
          }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'MM/DD/YYYY hh:mm A'
          }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
          format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
          $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
          $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

      })
      // BS-Stepper Init
      document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
      })

      // DropzoneJS Demo Code Start
      Dropzone.autoDiscover = false

      // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
      var previewNode = document.querySelector("#template")
      previewNode.id = ""
      var previewTemplate = previewNode.parentNode.innerHTML
      previewNode.parentNode.removeChild(previewNode)

      var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
      })

      myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
          myDropzone.enqueueFile(file)
        }
      })

      // Update the total progress bar
      myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
      })

      myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
      })

      // Hide the total progress bar when nothing's uploading anymore
      myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
      })

      // Setup the buttons for all transfers
      // The "add files" button doesn't need to be setup because the config
      // `clickable` has already been specified.
      document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
      }
      document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
      }
      // DropzoneJS Demo Code End


      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>


    <script>
      $(function() {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
          Toast.fire({
            icon: 'success',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultInfo').click(function() {
          Toast.fire({
            icon: 'info',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultError').click(function() {
          Toast.fire({
            icon: 'error',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultWarning').click(function() {
          Toast.fire({
            icon: 'warning',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.swalDefaultQuestion').click(function() {
          Toast.fire({
            icon: 'question',
            title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });

        $('.toastrDefaultSuccess').click(function() {
          toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultInfo').click(function() {
          toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
          toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
          toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });

        $('.toastsDefaultDefault').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultTopLeft').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultBottomRight').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultBottomLeft').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultAutohide').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultNotFixed').click(function() {
          $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultFull').click(function() {
          $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
          })
        });
        $('.toastsDefaultFullImage').click(function() {
          $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
          })
        });
        $('.toastsDefaultSuccess').click(function() {
          $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultInfo').click(function() {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultWarning').click(function() {
          $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultDanger').click(function() {
          $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
        $('.toastsDefaultMaroon').click(function() {
          $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
          })
        });
      });
    </script>

    <!-- ajax sendiri -->

    <script src="dist/js/modul_user.js"></script> <!-- Modul User menu Tambah Submodul User-->
    <script src="dist/js/jenis_input.js"></script> <!-- Tammbah User Login-->
    <script src="dist/js/viewalasanberhenti.js"></script> <!-- Tambah alasan berhenti di home-->
    <script src="dist/js/input_rupiah.js"></script> <!-- Tambah alasan berhenti di home-->
    <script src="dist/js/input_rupiah2.js"></script> <!-- Tambah alasan berhenti di home-->
    <script src="dist/js/viewparameter.js"></script> <!-- Tambah analisa jabatan-->
    <script src="dist/js/viewjarakparameter.js"></script> <!-- Tambah analisa jabatan-->
    <script src="dist/js/view_submodul.js"></script> <!-- Tambah analisa jabatan-->
    <script src="dist/js/viewfinger.js"></script> <!-- tarik finger-->
    <script src="dist/js/pilih_tarik.js"></script> <!-- tarik finger-->
    <script src="dist/js/jamselesai.js"></script> <!-- tarik finger-->
    <script src="dist/js/pilihcuti.js"></script> <!-- tarik finger-->
    <script src="dist/js/view_download_excel.js"></script>

    <script src="dist/js/ubahjadwal.js"></script> <!-- tarik finger-->
    <script src="dist/js/dashboard_ijin.js"></script> <!-- tarik finger-->
    <script src="dist/js/dashboard_status_ijin.js"></script> <!-- tarik finger-->

    <!-- <script src="dist/js/viewalasanberhentitidak.js"></script>  Tambah alasan berhenti di home-->
    <!-- ajax sendiri -->
    <script src="dist/js/carisubdepartemen.js"></script>
    <!-- Tambah Analisa Jabatan home-->
    <script src="dist/js/carijabatan.js"></script>
    <!-- Tambah Analisa Jabatan home-->
    <script src="dist/js/carinikatasan.js"></script>
    <!-- Tambah Analisa Jabatan home-->
    <script src="dist/js/carisubdepartemenkaryawan.js"></script>

    <script src="dist/js/carijamkerjadetail.js"></script>
    <script src="dist/js/cariinstruktur.js"></script>

    <script src="dist/js/cariregu.js"></script>
    <script src="dist/js/pilih_tanggal.js"></script>
    <script src="dist/js/pilih_tanggal_training.js"></script>
    <script src="dist/js/pilih_dashboard.js"></script>
    <script src="dist/js/carigolongan.js"></script>

    <script src="dist/js/notifcuti.js"></script>
    <script src="dist/js/pilih_perijinan.js"></script>
    <script src="dist/js/pilih_departemen.js"></script>
    <script src="dist/js/limitperijinan.js"></script>

    <script src="dist/js/subdepartemen_finger.js"></script>
    <script src="dist/js/view_mesinregu.js"></script>
    <script src="dist/js/view_regu.js"></script>
    <script src="dist/js/cari_status_jabatan.js"></script>

    <script src="dist/js/pilih_nik_karyawan.js"></script>
    <script src="dist/js/nik_mesin_regu.js"></script>
    <script src="dist/js/nik_mesin_regu_dua.js"></script>
    <script src="dist/js/tanggal_lintas_hari.js"></script>
    <script src="dist/js/tanggal_value_lintas_hari.js"></script>

    <script src="dist/js/view_pindah_jadwal.js"></script>
    <script src="dist/js/dashboard_inputan_ijin.js"></script> <!-- tarik finger-->
    <script src="dist/js/status_jadwal.js"></script> <!-- tarik finger-->



    <!-- query emyl -->

    <script src="dist/js/cari_nama_barang.js"></script>
    <script src="dist/js/cari_data.js"></script>
    <script src="dist/js/cari_jumlah_permintaan.js"></script>
    <script src="dist/js/cari_nama_pemohon.js"></script>
    <script src="dist/js/cari_nama_subkategori.js"></script>
    <script src="dist/js/cari_nama.js"></script>
    <script src="dist/js/change_on_off.js"></script>
    <script src="dist/js/pilih_departemen_bbk.js"></script>
    <script src="dist/js/pilih_departemen.js"></script>
    <script src="dist/js/pilih_gudang_bbk.js"></script>
    <script src="dist/js/pilih_gudang.js"></script>
    <script src="dist/js/pilih_pengguna_bbk.js"></script>
    <script src="dist/js/pilih_pengguna.js"></script>
    <script src="dist/js/status_bbk.js"></script>
    <script src="dist/js/status_permintaan.js"></script>
    <script src="dist/js/tanggal.js"></script>
    <script src="dist/js/view_deskripsi_aktiva.js"></script>
    <script src="dist/js/view_jatuh_tempo.js"></script>
    <script src="dist/js/view_p_perulangan.js"></script>
    <script src="dist/js/view_periode copy.js"></script>
    <script src="dist/js/view_periode.js"></script>
    <script src="dist/js/cari_nama_barang_sppb.js"></script>
    <script src="dist/js/view_pemenuhan.js"></script>
    <script src="dist/js/departemen_aj.js"></script>
    <script src="dist/js/subdepartemen_aj.js"></script>
    <script src="dist/js/pilihcuti_khusus.js"></script>

    <script src="dist/js/cuti_khusus_gender.js"></script>
    <script src="dist/js/keterangan_perijinan.js"></script>
    <script src="dist/js/saldo_cuti.js"></script>
    <script src="dist/js/level_training.js"></script>


    <!-- sppb -->
    <script src="dist/js/view_notifikasi_jumlah_po.js"></script>
    <script src="dist/js/view_notifikasi_jumlah_sppb.js"></script>
    <script src="dist/js/view_notifikasi_jumlah.js"></script>
    <script src="dist/js/view_pemenuhan_sppb.js"></script>
    <script src="dist/js/view_pemenuhan_po.js"></script>
    <script src="dist/js/mapping_standart_penilaian.js"></script>


    <script src="dist/js/pilih_departemen_sppb.js"></script>
    <!-- sppb -->

    <script src="dist/js/pilih_jangka.js"></script>
    <script src="dist/js/pilih_jatuh.js"></script>
    <script src="dist/js/pilih_pengingat.js"></script>
    <script src="dist/js/pilih_pengguna_mobil.js"></script>
    <script src="dist/js/cari_data.js"></script>


    </body>

</html>