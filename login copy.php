<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <div class="login-logo">
    <a href="login.php">SPPB</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username/NIK" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Lupa Password?
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block" name="login">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['login'])) {


    $username     = $_POST['username'];
    $password     = $_POST['password'];
    // $kode_jabatan = $_POST['kode_jabatan'];

    $sql = $koneksi_master->query("SELECT * from pb_role.tb_user a INNER JOIN pb_master.tb_karyawan ON a.nik=pb_master.tb_karyawan.nik INNER JOIN pb_master.tb_jabatan_karyawan ON pb_master.tb_karyawan.kode_jabatan=pb_master.tb_jabatan_karyawan.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan ON pb_master.tb_departemen_karyawan.kode_departemen=a.kode_departemen 
    
    -- INNER JOIN pb_transaksi.tb_aktiva e ON a.status=e.status INNER JOIN pb_transaksi.tb_pengingat f ON e.kode_aktiva=f.kode_aktiva INNER JOIN pb_transaksi.tb_aktiva_detail g ON e.kode_aktiva=g.kode_aktiva INNER JOIN pb_master.tb_trxtype h ON f.kode_trxtype=h.kode_trxtype 
    
    WHERE (username='$username' OR pb_master.tb_karyawan.nik='$username') AND password=md5('$password')");

    // $sql = $koneksi_master->query("SELECT * from pb_role.tb_user a INNER JOIN pb_master.tb_karyawan ON a.nik=pb_master.tb_karyawan.nik INNER JOIN pb_master.tb_jabatan_karyawan ON pb_master.tb_karyawan.kode_jabatan=pb_master.tb_jabatan_karyawan.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan ON pb_master.tb_departemen_karyawan.kode_departemen=a.kode_departemen INNER JOIN pb_transaksi.tb_aktiva e ON a.status=e.status INNER JOIN pb_transaksi.tb_pengingat f ON e.kode_aktiva=f.kode_aktiva INNER JOIN pb_transaksi.tb_aktiva_detail g ON e.kode_aktiva=g.kode_aktiva INNER JOIN pb_master.tb_trxtype h ON f.kode_trxtype=h.kode_trxtype WHERE (username='$username' OR pb_master.tb_karyawan.nik='$username' OR pb_master.tb_jabatan_karyawan.kode_jabatan='$kode_jabatan') AND password=md5('$password')");

    // $sql = $koneksi_master->query("SELECT * from pb_role.tb_user a INNER JOIN pb_master.tb_karyawan ON a.nik=pb_master.tb_karyawan.nik INNER JOIN pb_master.tb_jabatan_karyawan ON pb_master.tb_karyawan.kode_jabatan=pb_master.tb_jabatan_karyawan.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan ON pb_master.tb_departemen_karyawan.kode_departemen=a.kode_departemen where (username='$username' OR pb_master.tb_karyawan.nik='$username' OR pb_master.tb_jabatan_karyawan.kode_jabatan='$kode_jabatan') AND password=md5('$password')");

    // $sql = $koneksi_master->query("SELECT * from pb_role.tb_user INNER JOIN pb_master.tb_karyawan ON pb_role.tb_user.nik=pb_master.tb_karyawan.nik INNER JOIN pb_master.tb_jabatan_karyawan ON pb_master.tb_karyawan.kode_jabatan=pb_master.tb_jabatan_karyawan.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan ON pb_master.tb_departemen_karyawan.kode_departemen=pb_role.tb_user.kode_departemen where (username='$username' or pb_master.tb_karyawan.nik='$username') and password=md5('$password')");
    
    $ketemu = $sql->num_rows;
    $data = $sql->fetch_assoc();


    // $sql1 =$koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva where status = 'A'")


    if ($ketemu >= 1) {

        session_start();
        $_SESSION['s_nik']      = $data['nik'];
        $_SESSION['s_nama']     = $data['nama'];
        $_SESSION['s_email'] = $data['email'];
        $_SESSION['s_kode_mitrakerja'] = $data['kode_mitrakerja'];
        $_SESSION['s_kode_user'] = $data['kode_user'];
        $_SESSION['s_kode_departemen'] = $data['kode_departemen'];
        // $_SESSION['s_password'] = $data['password'];
        $_SESSION['s_level']    = $data['level'];
        $_SESSION['s_username']    = $data['username'];
        $_SESSION['s_status']    = $data['status'];
        $_SESSION['s_kode_jabatan']    = $data['kode_jabatan'];
        $_SESSION['s_jabatan']    = $data['jabatan'];

        $_SESSION['s_limit']='5';

        $_SESSION['s_pilih_tanggal']=date('Y-m');
        
        $_SESSION['s_status_permintaan']= $data['status_permintaan'];

        $_SESSION['s_pilih_gudang']= $data['nama_gudang'];

        $_SESSION['s_pilih_departemen']= $data['nama_departemen'];

        $_SESSION['s_pilih_pengguna']= $data['nama'];

        // punya jatuh tempo 
        $_SESSION['s_pilih_jatuh']= $data['deskripsi'];
        $_SESSION['s_pilih_pengguna_mobil']= $data['deskripsi_aktiva'];
        $_SESSION['s_pilih_jangka']= '30';
        $_SESSION['s_pilih_pengingat']= 'flag_ceklis';

        // punya BBK
        $_SESSION['s_tanggal']=date('Y-m');
        $_SESSION['s_pilih_departemen_bbk']= $data['nama_departemen'];
        $_SESSION['s_status_bbk']= $data['status_bbk'];
        $_SESSION['s_pilih_gudang_bbk']= $data['nama_gudang'];
        $_SESSION['s_pilih_pengguna_bbk']= $data['nama'];
        // punya BBK

        // punya BBM
        $_SESSION['s_tanggal_bbm']=date('Y-m');
        $_SESSION['s_pilih_departemen_bbm']= $data['nama_departemen'];
        $_SESSION['s_status_bbm']= $data['status_bbm'];
        $_SESSION['s_pilih_gudang_bbm']= $data['nama_gudang'];
        $_SESSION['s_pilih_pengguna_bbm']= $data['nama'];
        
        // punya BBM

        // punya sppb
        $_SESSION['s_tanggal_sppb']=date('Y-m');
        $_SESSION['s_pilih_departemen_sppb']= $data['nama_departemen'];
        $_SESSION['s_status_sppb']= $data['status_sppb'];
        $_SESSION['s_pilih_gudang_sppb']= $data['nama_gudang'];
        $_SESSION['s_pilih_pengguna_sppb']= $data['nama'];
        // punya sppb

         // punya po
         $_SESSION['s_tanggal']=date('Y-m');
         $_SESSION['s_pilih_departemen_po']= $data['nama_departemen'];
         $_SESSION['s_status_po']= $data['status_po'];
         $_SESSION['s_pilih_gudang_po']= $data['nama_gudang'];
         $_SESSION['s_pilih_pengguna_po']= $data['nama'];
         // punya po

         // punya po
        //  $_SESSION['s_pilih_gudang_history']= $data['nama_gudang'];
         $_SESSION['s_pilih_barang_history']= $data['nama_barang'];
         // punya po

         $_SESSION['s_tanggal_bbm']=date('Y-m');

         $_SESSION['s_dashboard']=1;


if ($data['token_aktivasi']<>null) {

        header("location:aktivasi.php");
 } else {

        header("location:index.php?page=home");
      }


    } else {
?>

        <script type="text/javascript">
            alert("Login Gagal Username atau password yang Anda Masukan Salah")
        </script>

    <?php

    }

    ?>

<?php
}
?>