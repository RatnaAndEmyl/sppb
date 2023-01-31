<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Sub Departemen</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=subdepartemen&aksi=tambah_proses" enctype="multipart/form-data">
                                    <!-- <div class="form-group">
                    <input type="text" class="form-control" name="kode_departemen" hidden>
                </div> -->

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
                                        <label for="exampleInputEmail111">Nama Sub-Departemen</label>
                                        <input type="text" class="form-control" name="nama_subdepartemen" placeholder="Masukan Nama Sub-departemen" required>
                                    </div>

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=subdepartemen" class="btn btn-dark">Kembali</a>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>