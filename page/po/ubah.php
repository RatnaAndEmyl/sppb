<?php

$kode_po                   = $_GET['kode_po'];
$user                      = $_GET['user'];
$tanggal_po                = $_GET['tanggal_po'];
// $id_barang              = $_GET['id_barang'];
// $id_jenis_barang        = $_GET['id_jenis_barang'];
// $jumlah                 = $_GET['jumlah'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_po . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_po where kode_po='$kode_po'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah po
                        <?php echo $nama ?>
                        (<?php echo $jabatan; ?>)
                    </h4>
                </div>
                <div class="card-body">
                    <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(function() {
                            var today = new Date();
                            var month = ('0' + (today.getMonth() + 1)).slice(-2);
                            var day = ('0' + today.getDate()).slice(-2);
                            var year = today.getFullYear();
                            var date = year + '-' + month + '-' + day;
                            $('[id*=txtdateofreservation]').attr('min', date);
                        });
                    </script> -->
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=po&aksi=ubah_proses" name="autoSumForm">

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode po</label>
                                    <input type="text" class="form-control" name="kode_po" value="<?php echo $tampil['kode_po']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">tanggal_po po</label>
                                    <input type="date" class="form-control" id="txtdateofreservation" name="tanggal_po" value="<?php echo $tampil['tanggal_po']; ?>" readonly>
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
                                    <a href="?page=po" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            <script>
                                function startCalc() {
                                    interval = setInterval("calc()", 1);
                                }

                                function calc() {
                                    one = document.autoSumForm.jumlah_permintaan.value;
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