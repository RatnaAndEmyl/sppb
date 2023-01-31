<?php

$kode_subkategori        = $_GET['kode_subkategori'];
$kode_kategori        = $_GET['kode_kategori'];
$deskripsi_subkategori   = $_GET['deskripsi_subkategori'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_subkategori . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
       window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subkategori where kode_subkategori='$kode_subkategori'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar Sub Kategori</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah subKategori</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=subkategori&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode Sub Kategori</label>
                                    <input type="text" class="form-control" name="kode_subkategori" value="<?php echo $tampil['kode_subkategori']; ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kategori</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_kategori" name="kode_kategori">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_kategori WHERE STATUS='A' ORDER BY kode_kategori");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_kategori'] == $tampil['kode_kategori']) {
                                                    echo "<option value ='$data[kode_kategori]' selected >$data[deskripsi_kategori]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_kategori]'>$data[deskripsi_kategori]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Sub Kategori</label>
                                    <input type="text" class="form-control" name="deskripsi_subkategori" value="<?php echo $tampil['deskripsi_subkategori']; ?>" required>
                                </div>
                                
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=subkategori" class="btn btn-dark">Kembali</a>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>