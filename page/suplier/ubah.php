<?php

$kode_suplier = $_GET['kode_suplier'];
$no_hp_suplier = $_GET['kode_suplier'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_suplier . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier where kode_suplier='$kode_suplier'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Suplier</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=suplier&aksi=ubah_proses">
                                <input type="text" class="form-control" name="kode_suplier" value="<?php echo $tampil['kode_suplier']; ?>" readonly hidden>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Nama Suplier</label>
                                    <input type="text" class="form-control" name="nama_suplier" value="<?php echo $tampil['nama_suplier']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">No. Hp</label>
                                    <input type="text" class="form-control" name="no_hp_suplier" value="<?php echo $tampil['no_hp_suplier']; ?>" required>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=suplier" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>