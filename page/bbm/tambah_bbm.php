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
$kode_suplier_bbm = $tampil['kode_suplier'];

// echo $kode_suplier_bbm . '<br>';


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

                                                // SELECT a.tgl_create, a.nama_barang, a.jumlah_pemenuhan, a.kode_po, a.nama_satuan FROM pb_transaksi.tb_po_detail a WHERE STATUS='A' AND a.status_po='Y' AND NOT EXISTS (SELECT x.kode_barang, x.kode_po FROM pb_transaksi.tb_bbm_detail x WHERE (x.status_bbm='Y' OR x.jumlah_permintaan=x.jumlah_pemenuhan) AND x.status='A' AND x.kode_barang=a.kode_barang AND x.kode_po=a.kode_po)

                                                $sqltext1 = "SELECT a.tgl_create, a.nama_barang, a.jumlah_pemenuhan, a.kode_po, a.nama_satuan FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b ON a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A' AND b.kode_gudang='$kode_gudang_bbm' AND b.kode_suplier='$kode_suplier_bbm' AND a.status_po='Y' AND NOT EXISTS (SELECT x.kode_barang, x.kode_po FROM pb_transaksi.tb_bbm_detail x WHERE (x.status_bbm='Y' OR x.jumlah_permintaan=x.jumlah_pemenuhan) AND x.status='A' AND x.kode_barang=a.kode_barang AND x.kode_po=a.kode_po)";
                                                // misal ditambahi kode_bbm maka gk akan menampilkan barang yang sama dikode bmm itu. Jadi misalnya di kode bbm lain nanti akan tetap memunculkan barang iu lagi.
                                                $sql1 = $koneksi_master->query($sqltext1);

                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[tgl_create]'>$datacek[kode_po] - $datacek[jumlah_pemenuhan] $datacek[nama_satuan] $datacek[nama_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <?php

                                    //echo $sqltext1 = "SELECT a.tgl_create, a.status_po, a.kode_po, a.jumlah_permintaan, a.jumlah_pemenuhan, a.nama_satuan, a.nama_barang,a.kode_barang, b.kode_suplier FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b ON a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A' AND b.nik='$nik_bbm' AND b.kode_gudang='$kode_gudang_bbm' AND b.kode_suplier='$kode_suplier_bbm' AND a.status_po='Y' AND NOT EXISTS (SELECT * FROM pb_transaksi.tb_bbm_detail x where x.kode_po=a.kode_po and x.kode_barang=a.kode_barang and x.jumlah_permintaan<=x.jumlah_pemenuhan and x.status='A')"; 

                                    // ini query yang tidak menampilkan barang jika status_bmm nya Y. atau yang sudah disetujui.
                                    // SELECT a.tgl_create, a.nama_barang, a.jumlah_pemenuhan, a.kode_po, a.nama_satuan FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b ON a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A' AND b.kode_gudang='$kode_gudang_bbm' AND b.kode_suplier='$kode_suplier_bbm' AND a.status_po='Y'  AND NOT EXISTS (SELECT x.kode_barang, x.kode_po FROM pb_transaksi.tb_bbm_detail x WHERE x.status_bbm='Y' AND x.jumlah_permintaan>=x.jumlah_pemenuhan AND x.status='A' AND x.kode_barang=a.kode_barang AND x.kode_po=a.kode_po)
                                    ?>


                                    <div id="view_pemenuhan_po"></div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Barang PO</label>
                                        <input type="number" class="form-control" id="jumlah_barang_po" name="jumlah_pemenuhan" placeholder="Masukkan Jumlah Barang" step="0.1" required>
                                    </div>

                                    <div id="view_notifikasi_jumlah_po"></div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>