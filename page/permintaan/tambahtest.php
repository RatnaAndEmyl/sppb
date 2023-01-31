

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Ijin Dinas</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=ijindinaskaryawan&aksi=tambah_proses&pc=<?php echo $angka; ?>&oc=<?php echo md5($kodeuser . $angka); ?>">


                        


                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Pilih Keperluan</label>
                                            <div class="input-group">
                                                <select class="form-control select2" style="width: 100%;" name="kode_typeperijinan" id="kode_typeperijinan">
                                                    <?php
                                                    //mengambil kode_perijinan dan men generate
                                                    echo "<option value=''>-- Pilih Keperluan --</option>";
                                                    $sql1 = $koneksi_master->query("select * from hr_master.tb_typeperijinan_master a join hr_master.tb_perijinan b on a.kode_perijinan=b.kode_perijinan
                                            where a.status='A' and a.kode_perijinan='PRJ009'");
                                                    while ($datacek = $sql1->fetch_assoc()) {
                                                        echo "<option value ='$datacek[kode_typeperijinan]'>$datacek[deskripsi]</option>";
                                                    }

                                                    ?>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Keperluan Dinas</label>
                                            <input type="text" class="form-control" name="keperluan_dinas" placeholder="Masukan Keperluan Dinas" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail111">Tujuan Dinas</label>
                                            <input type="text" class="form-control" name="tujuan_dinas" placeholder="Masukan Tujuan Dinas" required>
                                        </div>

                                        <div class="row justify">
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Jenis Kendaraan</label>
                                                    <div class="input-group">
                                                        <select class="form-control select2" style="width: 100%;" name="jenis_kendaraan" id="jenis_kendaraan">
                                                            <?php
                                                            //mengambil kode_perijinan dan men generate
                                                            echo "<option value=''>-- Pilih Jenis kendaraan --</option>";
                                                            echo "<option value='PRIBADI'>Pribadi</option>";
                                                            echo "<option value='DINAS'> Dinas</option>";

                                                            ?>
                                                        </select>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify">
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Nomor Polisi</label>
                                                    <input type="text" style="width: 100%;" class="form-control" name="nomor_polisi" placeholder="Masukan Nomor Polisi" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Tanggal</label>
                                                    <input type="date" class="form-control" name="tanggal_kerja" placeholder="Masukan Tanggal" min="<?php echo $tgl_min ?>" required>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Dari Jam</label>
                                                    <input type="time" class="form-control" name="jam_awal" placeholder="Masukan Jam" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Ke Jam</label>
                                                    <input type="time" class="form-control" name="jam_selesai" placeholder="Masukan Jam" required>
                                                </div>
                                            </div> -->


                                            <div class="col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">Jam</label>
                                                    <input type="time" class="form-control" name="jam_awal" placeholder="Masukan Jam Awal" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-12">
                                                <div class="table-responsive" id="jamselesai"></div>
                                            </div>


                                        </div>
                            </div>
                    

                        <div>
                            <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                            <a href="?page=home&halaman=1" class="btn btn-dark">Kembali</a>
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