<?php


$kode_aktiva        = $_GET['kode_aktiva'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_aktiva . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
       window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva where kode_aktiva='$kode_aktiva'");

$tampil = $sql->fetch_assoc();

$kode_subkategori =  $tampil['kode_subkategori'];
// echo $kode_subkategori;
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah aktiva</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=aktiva&aksi=tambah_detail_proses" 
                                enctype="multipart/form-data">
                                    
                                <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Kode aktiva</label> -->
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_aktiva ?>" name="kode_aktiva" hidden>
                                    <!-- </div> -->
                                  <div class="form-group">
                                        <label for="exampleInputEmail111">Trx Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            </div>
                                            <select class="form-control" name="kode_trxtype" id="kode_trxtype">
                                            <?php
                                                echo "<option value=''>-- Pilih TrxType --</option>";
                                                $sql1 = $koneksi_master->query("select* from( SELECT * FROM pb_master.tb_trxtype a where a.status='A' and exists(select * from pb_master.tb_mapping_master x inner join pb_master.tb_mapping_detail y on x.kode_mapping=y.kode_mapping where x.kode_subkategori='$kode_subkategori' and x.status='A' and a.kode_trxtype=y.kode_trxtype and y.status='A' )) kk  where  not exists(select * from pb_transaksi.tb_aktiva_detail v where v.kode_aktiva='$kode_aktiva' and v.kode_trxtype=kk.kode_trxtype and v.status='A')   ");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                            }
                                            ?>
                                                
                                            </select>
                                        </div>
                                        </div>


                                        <div class="table-responsive" id="view_deskripsi_aktiva"></div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=aktiva&aksi=detail&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_aktiva . $angka); ?>" class="btn btn-dark">Kembali</a>


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