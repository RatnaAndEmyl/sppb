<?php
$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];
// echo $kode_sppb;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_sppb . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb where kode_sppb='$kode_sppb'");
$tampil = $sql->fetch_assoc();

?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah SPPB Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=sppb&aksi=tambah_sppb_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode SPPB</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_sppb ?>" name="kode_sppb" id="kode_sppb">
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

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>

                                            <select class="form-control select2" name="kode_barang" id="cari_nama_barang_sppb" required>
                                                <?php
                                                echo "<option value='' selected disabled>-- Pilih Barang --</option>";
                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Permintaan</label>
                                        <input type="number" class="form-control" id="txtdateofreservation" name="jumlah_permintaan" placeholder="Jumlah Permintaan Barang" step="0.1" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Spesifikasi Barang</label>
                                        <textarea name="keterangan_barang" cols="159" rows="3" placeholder="Isikan Spesifikasi Barang" required></textarea>

                                        <!-- <input type="text" class="form-control" id="txtdateofreservation" name="keterangan_barang" placeholder="Spesifikasi Barang" required> -->
                                    </div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>" class="btn btn-dark">Kembali</a>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>