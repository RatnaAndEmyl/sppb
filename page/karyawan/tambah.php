<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Karyawan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=karyawan&aksi=tambah_proses" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" placeholder="Masukan Nama Karyawan" required>
                                    </div>

                                    <label for="exampleInputEmail111">Jenis Kelamin</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jk" value="Laki-Laki" required>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jk" value="Perempuan" required>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Agama</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="agama" id="agama">
                                                <?php

                                                echo "<option value=''>-- Pilih Agama --</option>";
                                                echo "<option value='Islam'>Islam</option>";
                                                echo "<option value='Kristen'>Kristen</option>";
                                                echo "<option value='Katolik'>Katolik</option>";
                                                echo "<option value='Hindu'>Hindu</option>";
                                                echo "<option value='Budha'>Budha</option>";

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Departemen</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_departemen" id="kode_departemen">
                                                <?php

                                                echo "<option value=''>-- Pilih Departemen --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_departemen_karyawan where status='A' order by kode_departemen");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_departemen]'>$datacek[nama_departemen]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Sub Departemen</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_subdepartemen" id="cari_subdepartemen">
                                                <?php
                                                echo "<option value=''>-- Pilih Sub Departemen --</option>"; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jabatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_jabatan" id="kode_jabatan">
                                                <?php

                                                echo "<option value=''>-- Pilih Jabatan --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_jabatan_karyawan where status='A' order by kode_jabatan");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_jabatan]'>$datacek[jabatan]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">NIK KTP</label>
                                        <input type="number" class="form-control" name="nik_ktp" placeholder="Masukan NIK KTP" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukan Tanggal Masuk" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Tanggal Keluar</label>
                                        <input type="date" class="form-control" name="tgl_keluar" placeholder="Masukan Tanggal Keluar" required>
                                    </div> -->

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=karyawan" class="btn btn-dark">Kembali</a>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>