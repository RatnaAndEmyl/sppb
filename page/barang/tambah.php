<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form method="POST" action="?page=barang&aksi=tambah_proses" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Jenis Barang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="id_jenis_barang" id="id_jenis_barang">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Nama Jenis Barang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_jenis_barang where status='A' order by id_jenis_barang");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[id_jenis_barang]'>$datacek[nama_jenis_barang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukan Nama Barang" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Harga Barang</label>
                                        <input type="text" class="form-control" name="harga_barang" placeholder="Masukan Harga Barang" required>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Detail</label>
                                        <input type="text" class="form-control" name="detail" placeholder="Masukan Detail Barang" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Stok Barang</label>
                                        <input type="text" class="form-control" name="onhandstok" placeholder="Masukan Stok Barang" value="0" readonly>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Stok Barang</label>
                                        <input type="text" class="form-control" name="stok_barang" placeholder="Masukan Stok Barang" value="0" readonly>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Satuan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_satuan">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Satuan --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_satuan WHERE STATUS='A' ORDER BY kode_satuan");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_satuan]'>$datacek[nama_satuan]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=barang" class="btn btn-dark">Kembali</a>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>