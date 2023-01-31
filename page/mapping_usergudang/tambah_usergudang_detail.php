<?php
$kode_mapping_usergudang        = $_GET['kode_mapping_usergudang'];

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


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Mapping User Gudang</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=mapping_usergudang&aksi=tambah_usergudang_detail_proses" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kode Mapping User Gudang</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_mapping_usergudang ?>" name="kode_mapping_usergudang" id="kode_mapping_usergudang">
                                    </div>
                                    <div class="select2-primary">
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Pengguna</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <select class="select2" multiple="multiple" data-placeholder="-- Pilih Pengguna --" data-dropdown-css-class="select2-primary" style="width: 100%;" name="kode_user[]" id="kode_user">
                                                    <?php
                                                    $sql1 = $koneksi_master->query("SELECT * FROM pb_role.tb_user a 
                                                WHERE a.STATUS='A' and not exists (select x.kode_user from pb_master.tb_mapping_usergudang_detail x  
                                                where x.kode_user=a.kode_user and x.status='A' AND x.kode_mapping_usergudang='$kode_mapping_usergudang'
                                                ) ORDER BY a.kode_user");
                                                    while ($datacek = $sql1->fetch_assoc()) {
                                                        echo "<option value ='$datacek[kode_user]'>$datacek[nama]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping_usergudang&aksi=detail&kode_mapping_usergudang=<?php echo $kode_mapping_usergudang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping_usergudang . $angka); ?>" class="btn btn-dark">Kembali</a>

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