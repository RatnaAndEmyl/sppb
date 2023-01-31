<?php

$nik = $_GET['nik'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($nik . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan where nik='$nik'");

$user   = $data['kode_user'];
$tampil = $sql->fetch_assoc();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Data Karyawan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=karyawan&aksi=ubah_proses">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">NIK</label>
                                        <input type="text" class="form-control" name="nik" value="<?php echo $tampil['nik']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $tampil['nama_karyawan']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jenis Kelamin</label>
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jk" value="Laki-laki" <?php if ($tampil['jk'] == 'Laki-laki') { 
                                                    echo 'checked'; } ?> required>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jk" value="Perempuan" <?php if ($tampil['jk'] == 'Perempuan') {
                                                    echo 'checked'; } ?> required>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Alamat </label>
                                        <input type="text" class="form-control" name="alamat" value="<?php echo $tampil['alamat']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Agama</label>
                                        <select class="form-control" name="agama" required>
                                            <option <?php if ($tampil['agama'] == 'Islam') {
                                                        echo "selected";
                                                    } ?> value="Islam">Islam</option>
                                            <option <?php if ($tampil['agama'] == 'Kristen') {
                                                        echo "selected";
                                                    } ?> value="Kristen">Kristen</option>
                                            <option <?php if ($tampil['agama'] == 'Katolik') {
                                                        echo "selected";
                                                    } ?> value="Katolik">Katolik</option>
                                            <option <?php if ($tampil['agama'] == 'Hindu') {
                                                        echo "selected";
                                                    } ?> value="Hindu">Hindu</option>
                                            <option <?php if ($tampil['agama'] == 'Budha') {
                                                        echo "selected";
                                                    } ?> value="Budha">Budha</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Departemen</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="custom-select col-12" id="kode_departemen" name="kode_departemen">
                                                <?php
                                                $sql = $koneksi_master->query("select * from pb_master.tb_departemen_karyawan where status='A' order by kode_departemen");
                                                while ($data = $sql->fetch_assoc()) {
                                                    if ($data['kode_departemen'] == $tampil['kode_departemen']) {
                                                        echo "<option value ='$data[kode_departemen]' selected >$data[nama_departemen]</option>";
                                                    } else {
                                                        echo "<option value ='$data[kode_departemen]'>$data[nama_departemen]</option>";
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Sub Departemen</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="custom-select col-12" id="kode_subdepartemen" name="kode_subdepartemen">
                                                <?php
                                                $sql = $koneksi_master->query("select * from pb_master.tb_subdepartemen_karyawan where status='A' order by kode_subdepartemen");
                                                while ($data = $sql->fetch_assoc()) {
                                                    if ($data['kode_subdepartemen'] == $tampil['kode_subdepartemen']) {
                                                        echo "<option value ='$data[kode_subdepartemen]' selected >$data[nama_subdepartemen]</option>";
                                                    } else {
                                                        echo "<option value ='$data[kode_subdepartemen]'>$data[nama_subdepartemen]</option>";
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <label for="exampleInputPassword1">Jabatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="custom-select col-12" id="kode_jabatan" name="kode_jabatan">
                                                <?php
                                                $sql = $koneksi_master->query("select * from pb_master.tb_jabatan_karyawan where status='A' order by kode_jabatan");
                                                while ($data = $sql->fetch_assoc()) {
                                                    if ($data['kode_jabatan'] == $tampil['kode_jabatan']) {
                                                        echo "<option value ='$data[kode_jabatan]' selected >$data[jabatan]</option>";
                                                    } else {
                                                        echo "<option value ='$data[kode_jabatan]'>$data[jabatan]</option>";
                                                    }
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">NIK KTP</label>
                                        <input type="text" class="form-control" name="nik_ktp" value="<?php echo $tampil['nik_ktp']; ?>" required>
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
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="status" value="<?php echo $tampil['status']; ?>" hidden>
                                    </div>


                                    <div>
                                        <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                        <a href="?page=karyawan" class="btn btn-dark">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>