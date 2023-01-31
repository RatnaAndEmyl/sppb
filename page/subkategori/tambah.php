<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Sub Kategori</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=subkategori&aksi=tambah_proses"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Kategori</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control select2" name="kode_kategori" id="kode_kategori">
                                                <?php

                                                echo "<option value='' >-- Pilih Kategori --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_kategori WHERE STATUS='A' ORDER BY kode_kategori");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_kategori]'>$datacek[deskripsi_kategori]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> Deskripsi Sub Kategori</label>
                                        <input type="text" class="form-control" name="deskripsi_subkategori"
                                            placeholder="Masukan subkategori" required>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=subkategori" class="btn btn-dark">Kembali</a>

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