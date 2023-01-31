<?php
$kode_user = $_GET['kode_user'];
$kode_submodul = $_GET['kode_submodul'];



$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_user . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$angka = date('Ymdhis');

$sql = $koneksi_master->query("select * from pb_role.tb_user_submodul where kode_submodul='$kode_submodul' and kode_user='$kode_user'");

$tampil = $sql->fetch_assoc();
?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Sub-Modul</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=usersubmodul&aksi=ubah_proses">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kode_user" value="<?php echo $tampil['kode_user']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kode_submodul" value="<?php echo $tampil['kode_submodul']; ?>" hidden>
                                    </div>





                                    <label for="exampleInputEmail111">tampil</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tampil" value="Y" <?php if ($tampil['tampil'] == 'Y') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> required>
                                                <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tampil" value="N" <?php if ($tampil['tampil'] == 'N') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> required>
                                                <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                            </div>
                                        </div>
                                    </div>


                                    <label for="exampleInputEmail111">tambah</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tambah" value="Y" <?php if ($tampil['tambah'] == 'Y') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> required>
                                                <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tambah" value="N" <?php if ($tampil['tambah'] == 'N') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> required>
                                                <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                            </div>
                                        </div>
                                    </div>


                                    <label for="exampleInputEmail111">ubah</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ubah" value="Y" <?php if ($tampil['ubah'] == 'Y') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> required>
                                                <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ubah" value="N" <?php if ($tampil['ubah'] == 'N') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> required>
                                                <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                            </div>
                                        </div>
                                    </div>


                                    <label for="exampleInputEmail111">hapus</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hapus" value="Y" <?php if ($tampil['hapus'] == 'Y') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> required>
                                                <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="hapus" value="N" <?php if ($tampil['hapus'] == 'N') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?> required>
                                                <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tgl_create" value="<?php echo $tampil['tgl_create']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="create_by" value="<?php echo $tampil['create_by']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tgl_update" value="<?php echo $tampil['tgl_update']; ?>" hidden>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="update_by" value="<?php echo $kodeuser; ?>" hidden>
                                    </div>
                                    <div>
                                        <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                        <a href="?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user . $angka); ?>" class="btn btn-dark">Kembali</a>
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