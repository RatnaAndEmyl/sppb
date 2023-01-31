<?php
$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];

// echo $kode_adjustment;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_adjustment . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment where kode_adjustment='$kode_adjustment' and status='A'");
$tampil = $sql->fetch_assoc();
$nik_adjustment = $tampil['nik'];
$kode_gudang_adjustment = $tampil['kode_gudang'];

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Barang Keluar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=adjustment&aksi=tambah_adjustment_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode adjustment</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_adjustment ?>" name="kode_adjustment">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jenis Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control select2" name="id_jenis_barang" id="id_jenis_barang">
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

                                    <div class="table-responsive">
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Nama Barang</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text " id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                                </div>

                                                <select class="form-control select2" name="kode_barang" id="cari_nama_barang_adjustment" required>
                                                    <?php
                                                    echo "<option value='' selected disabled>-- Pilih Barang --</option>";

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Adjustment</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="value" id="adjustment">
                                                <option selected>-- Pilih Adjustment --</option>
                                                <option value="in">Stok Masuk</option>
                                                <option value="out">Stok Keluar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="view_adjustment"></div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" class="btn btn-dark">Kembali</a>

                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>