<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah kategori</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=kategori&aksi=tambah_proses"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> Deskripsi Kategori</label>
                                        <input type="text" class="form-control" name="deskripsi_kategori"
                                            placeholder="Masukan kategori" required>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=kategori" class="btn btn-dark">Kembali</a>

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