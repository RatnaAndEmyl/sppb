<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
$kode_barang = $_GET['kode_barang'];
$tgl_create = $_GET['tgl_create'];
//echo $kode_barang;

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm_detail WHERE kode_bbm='$kode_bbm' AND kode_barang='$kode_barang'");
$tampil = $sql->fetch_assoc();
$nama_barang = $tampil['nama_barang'];
$jumlah_pemenuhan = $tampil['jumlah_pemenuhan'];
$nama_satuan = $tampil['nama_satuan'];

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


?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">SEBANYAK <?php echo $jumlah_pemenuhan; ?> <?php echo $nama_satuan; ?> <?php echo $nama_barang; ?> DITOLAK <br>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=bbm&aksi=alasan_tolak&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Alasan Ditolak</label>
                                        <input type="text" class="form-control" name="keterangan" placeholder="Isikan Alasan Barang Ditolak">
                                    </div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-dark">Kembali</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="#exampleModalPersetujuan<?php echo $data['kode_bbm']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="card-title">SEBANYAK <?php echo $jumlah_pemenuhan; ?> <?php echo $nama_satuan; ?> <?php echo $nama_barang; ?> DITOLAK <br>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="?page=bbm&aksi=alasan_tolak&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail111">Alasan Ditolak</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Isikan Alasan Barang Ditolak">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                            <a href="?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-dark">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</section>

<?php

$keterangan           = $_POST['keterangan'];

//kemaren gk mau karena aku gk ngirimkan kode bbm sama kode barang pas di form method.

$simpan               = $_POST['simpan'];

if ($simpan) {

    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET status_bbm = 'N', keterangan=upper('$keterangan') WHERE kode_bbm='$kode_bbm' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
    // echo $sqltext . '<br>';

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Status Berhasil Disimpan")
            window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Status Gagal Disimpan");
            window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
        </script>
<?php
    }
}
?>