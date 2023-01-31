<?php
$angka = date('Ymdhis');
$kode_bbk = $_GET['kode_bbk'];

// echo $kode_bbk;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk where kode_bbk='$kode_bbk'");
$tampil = $sql->fetch_assoc();
$nik_bbk = $tampil['nik'];
$kode_gudang_bbk = $tampil['kode_gudang'];

// $sql1 = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail a WHERE a.STATUS='A' AND a.kode_bbk='$kode_bbk' ORDER BY a.kode_bbk asc");
// $tampil_sql1 = $sql1->fetch_assoc();


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
                                <form method="POST" action="?page=bbk&aksi=tambah_bbk_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode BBK</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_bbk ?>" name="kode_bbk" id="kode_bbk">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Daftar Permintaan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="tgl_create" id="cari_permintaan_barang_pbk">
                                                <?php

                                                    echo "<option value='' selected disabled>-- Pilih Permintaan --</option>";
                                                    $sql1 = $koneksi_master->query("SELECT a.tgl_create, a.kode_permintaan, a.jumlah_permintaan, a.nama_satuan, a.nama_barang FROM pb_transaksi.tb_permintaan_detail a 
                                                    INNER JOIN pb_transaksi.tb_permintaan b on a.kode_permintaan=b.kode_permintaan WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik_bbk' AND b.kode_gudang='$kode_gudang_bbk' AND a.status_permintaan='Y' AND not exists (SELECT x.kode_permintaan, x.kode_barang FROM pb_transaksi.tb_bbk_detail x WHERE x.kode_permintaan=a.kode_permintaan and x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_permintaan='Y' AND x.kode_bbk='$kode_bbk') ORDER BY a.kode_permintaan");
                                                    while ($datacek = $sql1->fetch_assoc()) {
                                                        echo "<option value ='$datacek[tgl_create]'>$datacek[kode_permintaan] - $datacek[jumlah_permintaan] $datacek[nama_satuan] $datacek[nama_barang]</option>";
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jumlah Barang yang Disetujui</label>
                                        <input type="number" class="form-control" id="jumlah_barang_disetujui" name="jumlah_pemenuhan" placeholder="Masukkan Jumlah Barang" required>
                                    </div>

                                    <div id="view_notifikasi_jumlah">

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