<?php

$id_jenis_barang = $_GET['id_jenis_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($id_jenis_barang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_jenis_barang where id_jenis_barang='$id_jenis_barang'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Jenis Barang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=jenis_barang&aksi=ubah_proses">
                                <div class="form-group">
                                    <label for="exampleInputEmail111">ID Barang</label>
                                    <input type="text" class="form-control" name="id_jenis_barang" value="<?php echo $tampil['id_jenis_barang']; ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail111">Jenis Barang</label>
                                    <input type="text" class="form-control" name="nama_jenis_barang" value="<?php echo $tampil['nama_jenis_barang']; ?>" required>
                                </div>


                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=jenis_barang" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>