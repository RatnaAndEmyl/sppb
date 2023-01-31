<?php

$id_barang = $_GET['id_barang'];
$kode_satuan = $_GET['kode_satuan'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($id_barang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_barang where id_barang='$id_barang'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Barang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=barang&aksi=ubah_proses">
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode Barang</label>
                                    <input type="text" class="form-control" name="id_barang" value="<?php echo $tampil['id_barang']; ?>" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail111">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang']; ?>" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Harga Barang</label>
                                    <input type="text" class="form-control" name="harga_barang" value="<?php echo $tampil['harga_barang']; ?>" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Detail</label>
                                    <input type="text" class="form-control" name="detail" value="<?php echo $tampil['detail']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Stok Barang</label>
                                    <input type="text" class="form-control" name="onhandstok" value="<?php echo $tampil['onhandstok']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Satuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_satuan" name="kode_satuan">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_satuan WHERE STATUS='A' ORDER BY kode_satuan");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_satuan'] == $tampil['kode_satuan']) {
                                                    echo "<option value ='$data[kode_satuan]' selected >$data[nama_satuan]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_satuan]'>$data[nama_satuan]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=barang" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>