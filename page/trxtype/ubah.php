<?php

$kode_trxtype        = $_GET['kode_trxtype'];
$deskripsi   = $_GET['deskripsi'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where kode_trxtype='$kode_trxtype'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar trxtype</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah trxtype</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=trxtype&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode trxtype</label>
                                    <input type="text" class="form-control" name="kode_trxtype" value="<?php echo $tampil['kode_trxtype']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">trxtype</label>
                                    <input type="text" class="form-control" name="deskripsi" value="<?php echo $tampil['deskripsi']; ?>" required>
                                </div>
                                <label for="exampleInputEmail111">Inputan</label>               
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag_inputan"  value="Y" <?php if($tampil['flag_inputan']=='Y'){echo 'checked';}?> required>
                                            <label class="form-check-label" for="inlineRadio1" >Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag_inputan" value="N" <?php if($tampil['flag_inputan']=='N'){echo 'checked';}?> required>
                                            <label class="form-check-label" for="inlineRadio2" >Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=trxtype" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>