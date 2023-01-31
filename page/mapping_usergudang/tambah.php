<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Mapping User Gudang</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=mapping_usergudang&aksi=tambah_proses" 
                                enctype="multipart/form-data">
                                    
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Deskripsi Mapping User Gudang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_gudang" id="kode_gudang">
                                                <?php
                                                // digunakan untuk membuat data yang dipilih hanya yang belum di pilih saja//
                                                echo "<option value='' >-- Pilih gudang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang a 
                                                 WHERE a.STATUS='A' and not exists (select x.kode_gudang from pb_master.tb_mapping_usergudang x  where x.kode_gudang=a.kode_gudang and x.status='A') ORDER BY a.kode_gudang");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping_usergudang" class="btn btn-dark">Kembali</a>

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