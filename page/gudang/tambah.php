<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Gudang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=gudang&aksi=tambah_proses" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama gudang</label>
                                        <input type="text" class="form-control" name="nama_gudang" placeholder="Masukan Nama Gudang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Alamat Gudang</label>
                                        <input type="text" class="form-control" name="alamat_gudang" placeholder="Masukan Alamat Gudang" required>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=gudang" class="btn btn-dark">Kembali</a>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>