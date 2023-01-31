<?php

$kode_email        = $_GET['kode_email'];
$pengguna   = $_GET['pengguna'];
$email   = $_GET['email'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_email . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_email where kode_email='$kode_email'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar email</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah email</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=email&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode email</label>
                                    <input type="text" class="form-control" name="kode_email" value="<?php echo $tampil['kode_email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">pengguna</label>
                                    <input type="text" class="form-control" name="pengguna" value="<?php echo $tampil['pengguna']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $tampil['email']; ?>" required>
                                </div>
                                
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=email" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>