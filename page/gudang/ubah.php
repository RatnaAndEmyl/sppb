<?php

$kode_gudang = $_GET['kode_gudang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_gudang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang where kode_gudang='$kode_gudang'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Data Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=gudang&aksi=ubah_proses">
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode gudang</label>
                                    <input type="text" class="form-control" name="kode_gudang" value="<?php echo $tampil['kode_gudang']; ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail111">Nama gudang</label>
                                    <input type="text" class="form-control" name="nama_gudang" value="<?php echo $tampil['nama_gudang']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Alamat Gudang</label>
                                    <input type="text" class="form-control" name="alamat_gudang" value="<?php echo $tampil['alamat_gudang']; ?>" required>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=gudang" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>