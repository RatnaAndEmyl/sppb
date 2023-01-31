<?php
$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];
$kode_barang = $_GET['kode_barang'];
$tgl_create = $_GET['tgl_create'];
//echo $kode_barang;

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment_detail WHERE kode_adjustment='$kode_adjustment' AND kode_barang='$kode_barang'");
$tampil = $sql->fetch_assoc();
$nama_barang = $tampil['nama_barang'];
$stok_in     = $tampil['stok_in'];
$stok_out    = $tampil['stok_out'];
$nama_satuan = $tampil['nama_satuan'];

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


?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">SEBANYAK <?php if ($stok_out == '0.0') { ?>
                                <?php echo $stok_in; ?> <?php echo $nama_satuan; ?> <?php echo $nama_barang; ?> DITOLAK <br>
                            <?php } else if ($stok_in == '0.0') { ?>
                                <?php echo $stok_out; ?><?php echo $nama_satuan; ?> <?php echo $nama_barang; ?> DITOLAK <br>
                            <?php } ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=adjustment&aksi=alasan_tolak&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Alasan Ditolak</label>
                                        <input type="text" class="form-control" name="keterangan" placeholder="Isikan Alasan Barang Ditolak">
                                    </div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" class="btn btn-dark">Kembali</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

$keterangan           = $_POST['keterangan'];

//kemaren gk mau karena aku gk ngirimkan kode adjustment sama kode barang pas di form method.

$simpan               = $_POST['simpan'];

if ($simpan) {

    $sqltext = "UPDATE pb_transaksi.tb_adjustment_detail SET status_adjustment = 'N', keterangan=upper('$keterangan') WHERE kode_adjustment='$kode_adjustment' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
    // echo $sqltext . '<br>';

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Status Berhasil Disimpan")
            window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Status Gagal Disimpan");
            window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
        </script>
<?php
    }
}
?>