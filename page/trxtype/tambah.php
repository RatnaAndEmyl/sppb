<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah trxtype</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=trxtype&aksi=tambah_proses"
                                    enctype="multipart/form-data">



                                    <div class="form-group">
                                        <label for="exampleInputEmail111"> Deskripsi trxtype</label>
                                        <input type="text" class="form-control" name="deskripsi"
                                            placeholder="Masukan trxtype" required>
                                    </div>
                                    <label for="exampleInputEmail111">Input</label>               
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flag_inputan"  value="Y" required>
                                                <label class="form-check-label" for="inlineRadio1" >Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flag_inputan" value="N"required>
                                                <label class="form-check-label" for="inlineRadio2" >Tidak</label>
                                            </div>
                                        </div>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=trxtype" class="btn btn-dark">Kembali</a>

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