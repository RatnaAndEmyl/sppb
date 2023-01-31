<?php


$kode_mapping_usergudang        = $_GET['kode_mapping_usergudang'];
$kode_gudang   = $_GET['kode_gudang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping_usergudang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
       window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_usergudang where kode_mapping_usergudang='$kode_mapping_usergudang'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar Mapping User Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah Mapping User Gudang</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=mapping_usergudang&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode Mapping User Gudang</label>
                                    <input type="text" class="form-control" name="kode_mapping_usergudang" value="<?php echo $tampil['kode_mapping_usergudang']; ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gudang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_gudang" name="kode_gudang">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_gudang WHERE STATUS='A' ORDER BY kode_gudang");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_gudang'] == $tampil['kode_gudang']) {
                                                    echo "<option value ='$data[kode_gudang]' selected >$data[nama_gudang]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_gudang]'>$data[nama_gudang_gudang]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping_usergudang" class="btn btn-dark">Kembali</a>
                                </div>
                                
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>