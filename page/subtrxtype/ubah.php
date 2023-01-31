<?php

$kode_trxtype        = $_GET['kode_trxtype'];
$deskripsi_subtrxtype   = $_GET['deskripsi_subtrxtype'];

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


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subtrxtype where kode_trxtype='$kode_trxtype'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar Sub trxtype</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah subtrxtype</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=subtrxtype&aksi=ubah_proses" name="autoSumForm">
                                
                                <!-- <div class="form-group">
                                    <label for="exampleInputEmail111">Kode Sub trxtype</label>
                                    <input type="text" class="form-control" name="kode_trxtype" value="<?php echo $tampil['kode_trxtype']; ?>" readonly>
                                </div> -->
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">trxtype</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_trxtype" name="kode_trxtype">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_trxtype WHERE STATUS='A' ORDER BY kode_trxtype");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_trxtype'] == $tampil['kode_trxtype']) {
                                                    echo "<option value ='$data[kode_trxtype]' selected >$data[deskripsi]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_trxtype]'>$data[deskripsi]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Sub trxtype</label>
                                    <input type="text" class="form-control" name="deskripsi_subtrxtype" value="<?php echo $tampil['deskripsi_subtrxtype']; ?>" required>
                                </div>
                                
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=subtrxtype" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>