<?php

$kode_satuan = $_GET['kode_satuan'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_satuan . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_satuan where kode_satuan='$kode_satuan'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Satuan</h4>
                </div>
                <form method="POST" action="?page=satuan&aksi=ubah_proses" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail111">Kode Satuan</label>
                            <input type="text" class="form-control" name="kode_satuan" value="<?php echo $tampil['kode_satuan']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail111">Nama satuan</label>
                            <input type="text" class="form-control" name="nama_satuan" value="<?php echo $tampil['nama_satuan']; ?>" required>
                        </div>

                        <div>
                            <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                            <a href="?page=satuan" class="btn btn-dark">Kembali</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>