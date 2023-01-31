<?php

$kode_aktiva = $_GET['kode_aktiva'];
$kode_trxtype = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_aktiva . $pc) <> $oc) {
?>
    <script type="text/javascript">
        // alert("Tidak dapat mengubah data")
        // window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT tgl_jatuh_tempo, kode_aktiva, kode_trxtype FROM pb_transaksi.tb_aktiva_detail where kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Perpanjang Perizinan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=jatuh_tempo&aksi=perpanjang_proses">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Tanggal Jatuh Tempo</label>
                                    <input type="date" class="form-control" name="tgl_jatuh_tempo" value="<?php echo $tampil['tgl_jatuh_tempo']; ?>" required>
                                </div>


                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=home" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>