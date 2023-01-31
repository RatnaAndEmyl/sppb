<?php

$kode_submodul = $_GET['kode_submodul'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_submodul . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_role.tb_submodul where kode_submodul='$kode_submodul'");

$user   = $data['kode_user'];
$tampil = $sql->fetch_assoc();
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Ubah Sub-Modul</h4>
            <div class="d-flex align-items-center">

            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <form method="POST" action="?page=submodul&aksi=ubah_proses">
                <div class="form-group">
                    <label for="exampleInputEmail111">Kode Sub-Modul</label>
                    <input type="text" class="form-control" name="kode_submodul"
                        value="<?php echo $tampil['kode_submodul']; ?>" readonly>
                </div>



                <div class="form-group">
                    <label for="exampleInputPassword1">Modul</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <select class="custom-select col-12" id="kode_modul" name="kode_modul">
                            <?php
                            $sql = $koneksi_master->query("select * from pb_role.tb_modul where status='A' order by kode_modul");
                            while ($data = $sql->fetch_assoc()) {
                                if ($data['kode_modul'] == $tampil['kode_modul']) {
                                    echo "<option value ='$data[kode_modul]' selected >$data[nama_modul]</option>";
                                } else {
                                    echo "<option value ='$data[kode_modul]'>$data[nama_modul]</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail111">Nama Sub-Modul</label>
                    <input type="text" class="form-control" name="nama_submodul"
                        value="<?php echo $tampil['nama_submodul']; ?>" required>
                </div>




                <label for="exampleInputEmail111">Jenis</label>
                <div class="card">
                    <div class="card-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="H" <?php if ($tampil['jenis'] == 'H') {
                                                                                                    echo 'checked';
                                                                                                } ?> required>
                            <label class="form-check-label" for="inlineRadio1">Href</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="DT" <?php if ($tampil['jenis'] == 'DT') {
                                                                                                        echo 'checked';
                                                                                                    } ?> required>
                            <label class="form-check-label" for="inlineRadio2">Data-Target</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis" value="OC" <?php if ($tampil['jenis'] == 'OC') {
                                                                                                        echo 'checked';
                                                                                                    } ?> required>
                            <label class="form-check-label" for="inlineRadio2">Onclick</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail111">Link</label>
                    <input type="text" class="form-control" name="link" value="<?php echo $tampil['link']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tgl_create"
                        value="<?php echo $tampil['tgl_create']; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="create_by" value="<?php echo $tampil['create_by']; ?>"
                        hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tgl_update"
                        value="<?php echo $tampil['tgl_update']; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="update_by" value="<?php echo $kodeuser; ?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="status" value="<?php echo $tampil['status']; ?>"
                        hidden>
                </div>
                <div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                    <a href="?page=submodul" class="btn btn-dark">Kembali</a>
                </div>
            </form>
        </div>
    </div>