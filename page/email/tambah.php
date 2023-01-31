<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah email</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=email&aksi=tambah_proses"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> Pengguna</label>
                                        <input type="text" class="form-control" name="pengguna"
                                            placeholder="Masukan email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> email</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Masukan email" required>
                                    </div>
                                

                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=jatuh_tempo&aksi=p_detail" class="btn btn-dark">Kembali</a>

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