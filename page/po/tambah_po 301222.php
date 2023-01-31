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

                                                // SELECT a.tgl_create, a.nama_barang, a.jumlah_pemenuhan, a.kode_po, a.nama_satuan FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b ON a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A' AND b.kode_gudang='$kode_gudang_bbm' AND b.kode_suplier='$kode_suplier_bbm' AND a.status_po='Y' AND NOT EXISTS (SELECT x.kode_barang, x.kode_po FROM pb_transaksi.tb_bbm_detail x WHERE (x.status_bbm='Y' OR x.jumlah_permintaan=x.jumlah_pemenuhan) AND x.status='A' AND x.kode_barang=a.kode_barang AND x.kode_po=a.kode_po)

                                                echo "<option value='' selected disabled>-- Pilih SPPB --</option>";
                                                $sql1 = $koneksi_master->query("SELECT a.tgl_create, a.kode_sppb, a.jumlah_permintaan, a.nama_satuan, a.nama_barang FROM pb_transaksi.tb_sppb_detail a INNER JOIN pb_transaksi.tb_sppb b ON a.kode_sppb=b.kode_sppb WHERE a.STATUS='A' AND b.STATUS='A' AND b.kode_gudang='$kode_gudang_po' AND a.status_sppb='Y' AND NOT EXISTS (SELECT x.kode_sppb, x.kode_barang FROM pb_transaksi.tb_po_detail x WHERE x.kode_sppb=a.kode_sppb AND x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_sppb='Y' AND x.kode_po='$kode_po' AND x.jumlah_permintaan <= x.jumlah_pemenuhan) ORDER BY a.kode_sppb");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[tgl_create]'>$datacek[kode_sppb] - $datacek[jumlah_permintaan] $datacek[nama_satuan] $datacek[nama_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ini ngunci nik sama gudang
                                        $sql1 = $koneksi_master->query("SELECT a.tgl_create, a.kode_sppb, a.jumlah_permintaan, a.nama_satuan, a.nama_barang FROM pb_transaksi.tb_sppb_detail a INNER JOIN pb_transaksi.tb_sppb b ON a.kode_sppb=b.kode_sppb WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik_po' AND b.kode_gudang='$kode_gudang_po' AND a.status_sppb='Y' AND NOT EXISTS (SELECT x.kode_sppb, x.kode_barang FROM pb_transaksi.tb_po_detail x WHERE x.kode_sppb=a.kode_sppb AND x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_sppb='Y' AND x.kode_po='$kode_po' AND x.jumlah_permintaan <= x.jumlah_pemenuhan) ORDER BY a.kode_sppb"); -->

                                    <div id="view_pemenuhan_sppb"></div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah PO</label>
                                        <input type="number" class="form-control" onchange="hitung();" id="jumlah_barang_po" name="jumlah_pemenuhan" step="0.1" placeholder="Masukkan Jumlah PO Barang" required>
                                    </div>

                                    <div id="view_notifikasi_jumlah_sppb">

                                    </div>

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