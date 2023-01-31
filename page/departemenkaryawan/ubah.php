<?php

$kode_departemen = $_GET['kode_departemen']; //untuk enkripsi di link agar user tidak bisa mengubah linknya


$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_departemen . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}



$sql = $koneksi_master->query("select * from pb_master.tb_departemen where kode_departemen='$kode_departemen'");


$tampil = $sql->fetch_assoc();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Departemen</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=departemen&aksi=ubah_proses">


                                    <input type="text" class="form-control" name="kode_departemen"
                                        value="<?php echo $tampil['kode_departemen']; ?>" hidden>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama</label>
                                        <input type="text" class="form-control" name="nama_departemen"
                                            value="<?php echo $tampil['nama_departemen']; ?>" required>
                                    </div>

                                    <div>
                                        <input type="submit" value="Simpan" name="simpan"
                                            class="btn btn-success m-r-10">
                                        <a href="?page=departemen" class="btn btn-dark">Kembali</a>
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