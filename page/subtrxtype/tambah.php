<?php 
$kode_trxtype        = $_GET['kode_trxtype'];

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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Sub Trxtype</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=subtrxtype&aksi=tambah_proses"
                                    enctype="multipart/form-data">

                                   
                                        <input type="text" class="form-control" readonly value="<?php echo $kode_trxtype ?>" name="kode_trxtype" hidden>
                                  

                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">kode_trxtype</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            
                                            <select class="form-control" name="kode_trxtype" id="kode_trxtype">
                                                <?php

                                                echo "<option value='' >-- Pilih kode_trxtype --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype WHERE STATUS='A' ORDER BY kode_trxtype");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> Deskripsi Sub kode_trxtype</label>
                                        <input type="text" class="form-control" name="deskripsi_subtrxtype"
                                            placeholder="Masukan subtrxtype" required>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=subtrxtype&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>" class="btn btn-dark">Kembali</a>

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