<?php

$kode_sppb        = $_GET['kode_sppb'];
$user                   = $_GET['user'];
$tanggal_sppb                = $_GET['tanggal_sppb'];
// $id_barang              = $_GET['id_barang'];
// $id_jenis_barang        = $_GET['id_jenis_barang'];
// $jumlah                 = $_GET['jumlah'];

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
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah SPPB
                        <?php echo $nama ?>
                        (<?php echo $jabatan; ?>)
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=sppb&aksi=ubah_proses" name="autoSumForm">

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode sppb</label>
                                    <input type="text" class="form-control" name="kode_sppb" value="<?php echo $tampil['kode_sppb']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Tanggal SPPB</label>
                                    <input type="date" class="form-control" id="txtdateofreservation" name="tanggal_sppb" value="<?php echo $tampil['tanggal_sppb']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gudang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_gudang" name="kode_gudang">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_gudang WHERE STATUS='A' ORDER BY kode_gudang");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_gudang'] == $tampil['kode_gudang']) {
                                                    echo "<option value ='$data[kode_gudang]' selected >$data[nama_gudang]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_gudang]'>$data[nama_gudang]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=sppb" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            <script>
                                function startCalc() {
                                    interval = setInterval("calc()", 1);
                                }

                                function calc() {
                                    one = document.autoSumForm.jumlah_sppb.value;
                                    two = document.autoSumForm.harga_satuan.value;

                                    rumus = one * two;

                                    document.autoSumForm.total_harga.value = rumus;
                                }

                                function stopCalc() {

                                    clearInterval(interval);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>