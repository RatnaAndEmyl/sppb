<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Jabatan</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=jabatan&aksi=tambah_proses"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan"
                                            placeholder="Masukan Jabatan" required>
                                    </div>

                                    <label for="exampleInputEmail111">Manajerial</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="manajerial" value="Y"
                                                    required>
                                                <label class="form-check-label" for="inlineRadio1">Y</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="manajerial" value="N"
                                                    required>
                                                <label class="form-check-label" for="inlineRadio2">N</label>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=jabatan" class="btn btn-dark">Kembali</a>

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