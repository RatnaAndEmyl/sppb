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
                                <form method="POST" action="?page=mapping&aksi=tambah_proses" 
                                enctype="multipart/form-data">
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Deskripsi mapping</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control select2" name="kode_subkategori" id="kode_subkategori">
                                                <?php
                                                // digunakan untuk membuat data yang dipilih hanya yang belum di pilih saja//
                                                echo "<option value='' >-- Pilih subkategori --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_subkategori a 
                                                 WHERE a.STATUS='A' and not exists (select x.kode_subkategori from pb_master.tb_mapping_master x  where x.kode_subkategori=a.kode_subkategori and x.status='A') ORDER BY a.kode_subkategori");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_subkategori]'>$datacek[deskripsi_subkategori]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping" class="btn btn-dark">Kembali</a>

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