<?php


$kode_mapping        = $_GET['kode_mapping'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
       window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_master where kode_mapping='$kode_mapping'");

$tampil = $sql->fetch_assoc();
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah mapping</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=mapping&aksi=tambah_detail_proses" 
                                enctype="multipart/form-data">
                                    
                                <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Kode Mapping</label> -->
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_mapping ?>" name="kode_mapping" hidden>
                                    <!-- </div> -->

                                    
                                    <div class="select2-primary">
                                        <div class="form-group">
                                        <label for="exampleInputEmail111">Trx Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <select class="select2" multiple="multiple" data-placeholder="Pilih TrxType"
                                            data-dropdown-css-class="select2-primary" style="width: 100%;" name="kode_trxtype[]"
                                            id="kode_trxtype">
                                            <?php
                                                echo "<option value=''>-- Pilih TrxType --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype a 
                                                WHERE a.STATUS='A' and not exists (select x.kode_trxtype from pb_master.tb_mapping_detail x  
                                                where x.kode_trxtype=a.kode_trxtype and x.status='A' AND x.kode_mapping='$kode_mapping'
                                                ) ORDER BY a.kode_trxtype");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                            }
                            ?>
                                                ?>
                                            </select>
                                        </div>
                                        </div>
                                        </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping&aksi=detail&kode_mapping=<?php echo $kode_mapping; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping . $angka); ?>" class="btn btn-dark">Kembali</a>


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