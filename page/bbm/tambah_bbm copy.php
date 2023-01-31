<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];

// echo $kode_bbm;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm where kode_bbm='$kode_bbm'");
$tampil = $sql->fetch_assoc();
$nik_bbm = $tampil['nik'];
$kode_gudang_bbm = $tampil['kode_gudang'];


?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Barang Masuk</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=bbm&aksi=tambah_bbm_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode BBM</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_bbm ?>" name="kode_bbm" id="kode_bbm">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Daftar PO</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="tgl_create" id="cari_permintaan_barang_po">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih PO --</option>";
                                                $sql1 = $koneksi_master->query("SELECT a.tgl_create, a.kode_po, a.jumlah_permintaan, a.nama_satuan, a.nama_barang FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b ON a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik_bbm' AND b.kode_gudang='$kode_gudang_bbm' AND a.status_po='Y' AND NOT EXISTS (SELECT x.kode_po, x.kode_barang FROM pb_transaksi.tb_bbm_detail x WHERE x.kode_po=a.kode_po AND x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_po='Y' AND x.kode_bbm='$kode_bbm') ORDER BY a.kode_po");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[tgl_create]'>$datacek[kode_po] - $datacek[jumlah_permintaan] $datacek[nama_satuan] $datacek[nama_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Barang PO</label>
                                        <input type="number" class="form-control" id="jumlah_barang_po" name="jumlah_pemenuhan" placeholder="Masukkan Jumlah Barang" required>
                                    </div>

                                    <div id="view_notifikasi_jumlah_po">

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