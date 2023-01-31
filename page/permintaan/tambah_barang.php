<?php
$angka = date('Ymdhis');
$kode_permintaan = $_GET['kode_permintaan'];
// echo $kode_permintaan;



$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_permintaan . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_permintaan where kode_permintaan='$kode_permintaan'");
$tampil = $sql->fetch_assoc();

?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Permintaan Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=permintaan&aksi=tambah_barang_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode Permintaan</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_permintaan ?>" name="kode_permintaan" id="kode_permintaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jenis Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="id_jenis_barang" id="id_jenis_barang">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Jenis Barang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_jenis_barang WHERE STATUS='A' ORDER BY id_jenis_barang");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[id_jenis_barang]'>$datacek[nama_jenis_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <div class="table-responsive">
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Nama Barang</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>

                                                <select class="form-control select2" name="kode_barang" id="cari_nama_barang" required>
                                                    <?php
                                                    echo "<option value='' selected disabled>-- Pilih Barang --</option>";

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Nama Barang</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text " id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>

                                                <select class="form-control" name="kode_barang" id="cari_nama_barang" required>
                                                    <?php
                                                    echo "<option value='' selected disabled>-- Pilih Barang --</option>";

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Permintaan</label>
                                        <input type="number" class="form-control" id="txtdateofreservation" name="jumlah_permintaan" placeholder="Jumlah Permintaan Barang" step="0.1" required>
                                    </div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=permintaan&aksi=detail&kode_permintaan=<?php echo $kode_permintaan; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_permintaan . $angka); ?>" class="btn btn-dark">Kembali</a>

                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
    </div>
</section>