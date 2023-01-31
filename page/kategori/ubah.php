<?php

$kode_kategori        = $_GET['kode_kategori'];
$deskripsi_kategori   = $_GET['deskripsi_kategori'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_kategori . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_kategori where kode_kategori='$kode_kategori'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar kategori</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah kategori</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=kategori&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode kategori</label>
                                    <input type="text" class="form-control" name="kode_kategori" value="<?php echo $tampil['kode_kategori']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kategori</label>
                                    <input type="text" class="form-control" name="deskripsi_kategori" value="<?php echo $tampil['deskripsi_kategori']; ?>" required>
                                </div>
                                
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=kategori" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>