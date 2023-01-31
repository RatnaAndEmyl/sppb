<?php
$angka = date('Ymdhis');
$kode_po = $_GET['kode_po'];
// echo $kode_po;


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
$nik_po = $tampil['nik'];
$kode_gudang_po = $tampil['kode_gudang'];


?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah PO Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=po&aksi=tambah_po_proses" enctype="multipart/form-data">
                                <!-- <form method="POST" action="?page=po&aksi=tambah_po_proses" name="autoSumForm" enctype="multipart/form-data"> -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode PO</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_po ?>" name="kode_po" id="kode_po">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Daftar SPPB</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="tgl_create" id="cari_permintaan_barang_sppb">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih SPPB --</option>";
                                                $sql1 = $koneksi_master->query("SELECT a.tgl_create, a.kode_sppb, a.jumlah_permintaan, a.nama_satuan, a.nama_barang FROM pb_transaksi.tb_sppb_detail a 
                                                    INNER JOIN pb_transaksi.tb_sppb b ON a.kode_sppb=b.kode_sppb WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik_po' AND b.kode_gudang='$kode_gudang_po' AND a.status_sppb='Y' AND NOT EXISTS (SELECT x.kode_sppb, x.kode_barang FROM pb_transaksi.tb_po_detail x WHERE x.kode_sppb=a.kode_sppb AND x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_sppb='Y' AND x.kode_po='$kode_po') ORDER BY a.kode_sppb");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[tgl_create]'>$datacek[kode_sppb] - $datacek[jumlah_permintaan] $datacek[nama_satuan] $datacek[nama_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah PO</label>
                                        <input type="currency" class="form-control" onkeyup="hitung();" id="jumlah_barang_po" name="jumlah_pemenuhan" placeholder="Masukkan Jumlah PO Barang" required>
                                    </div>

                                    <div id="view_notifikasi_jumlah_sppb">

                                    </div>

                            </div>
                            <!-- <script>
                                function startCalc() {
                                    interval = setInterval("calc()", 1);
                                }

                                function calc() {
                                    one = document.autoSumForm.jumlah_pemenuhan.value;
                                    two = document.autoSumForm.harga_satuan.value;

                                    rumus = one * two;

                                    document.autoSumForm.total_harga.value = rumus;
                                }

                                function stopCalc() {

                                    clearInterval(interval);
                                }
                            </script> -->

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>