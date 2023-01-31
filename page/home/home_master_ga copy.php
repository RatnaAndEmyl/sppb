<?php
$angka = date('Ymdhis');
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-light collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h6><label>*Kode Warna</label></h6>
                            <button type="button" class="btn btn-dark"></button> Data Master
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<button type="button" class="btn btn-primary"></button> Penambahan Data
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<button type="button" class="btn btn-success"></button> History Stok
                            
                        </h3>
                        <div class="card-tools">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">DATA BARANG <small><i>Tambah dan Ubah Barang</i></small></h5>
        <div class="row">


            <div class="col-md-6">


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-list"></i>
                            DATA BARANG
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#ModalTambahJadwal">
                                <i class="fas fa-circle-info"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>


                    <div class="modal fade" id="ModalTambahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <h5><b>NOTE : </b><br></h5>
                                    <p><b>Untuk Tambah Data Barang Dapat dilakukan dengan:</b><br>
                                        <b>1.</b> Klik Button Tambah Jenis Barang Untuk Menambah Data Jenis Barang Terlebih Dahulu, Lalu Simpan.<br>
                                        <b>2.</b> Klik Button Tambah Satuan Untuk Penambahan Satuan, Jika Data Satuan Tidak Ada Dilist. <br>
                                        <b>3.</b> Selanutnya, Klik Button Tambah Barang Untuk Penambahan Barang.

                                    </p>

                                    <h5><b>BUTTON : </b><br></h5>
                                    <p><i class="fa fa-cube"></i> &nbsp <b>Jenis Barang : </b><br>
                                        Daftar Data Jenis Barang </p>

                                    <p><i class="fa fa-balance-scale"></i> &nbsp <b>Satuan : </b><br>
                                        Daftar Data Satuan </p>

                                    <p><i class="fa fa-cubes"></i> &nbsp <b> Barang : </b><br>
                                        Daftar Data Satuan </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-cube"> </i> </i>
                                        &nbsp <b>Tambah Jenis Barang : </b><br>
                                        Tambah Jenis Barang Baru
                                    </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-balance-scale"> </i> </i>
                                        &nbsp <b>Tambah Satuan : </b><br>
                                        Tambah Satuan Baru
                                    </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-cubes"> </i> </i>
                                        &nbsp <b>Tambah Barang : </b><br>
                                        Tambah Barang Baru
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <a href="?page=jenis_barang&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">
                            <i class="fa fa-cube"></i> Jenis Barang
                        </a>

                        <a href="?page=satuan&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">

                            <i class="fa fa-balance-scale"></i> Satuan Barang
                        </a>

                        <a href="?page=barang&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">

                            <i class="fa fa-cubes"></i> Barang
                        </a>

                        <a href="?page=jenis_barang&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-cube"> </i> </i> Tambah Jenis Barang
                        </a>

                        <a href="?page=satuan&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-balance-scale"> </i> </i> Tambah Satuan Barang
                        </a>

                        <a href="?page=barang&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-cubes"></i></i> Tambah Barang
                        </a>

                    </div>
                </div>
            </div>



            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-list"></i>
                            DATA GUDANG
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#ModalUbahJadwal">
                                <i class="fas fa-circle-info"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>


                    <div class="modal fade" id="ModalUbahJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Data Gudang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <h5><b>NOTE : </b><br></h5>
                                    <p><b>Untuk Tambah Data Admin Gudang Bisa Dengan Cara :</b><br>
                                        <b>1.</b> Klik Button Admin Gudang, Anda Dapat Data Gudang Terlebih Dahulu Jika Data Gudang Tidak Ada Dalam List, Simpan.<br>
                                        <b>2.</b> Lalu, Klik Button Detail Untuk Menambahkan Admin Gudangnya, Simpan.
                                    </p>

                                    <h5><b>BUTTON : </b><br></h5>

                                    <p><i class="fa fa-home"> </i> &nbsp <b>Gudang : </b><br>
                                        Data Gudang Yang Sudah Ada </p>

                                    <p><i class="fas fa-people-roof"></i> &nbsp <b>Admin Gudang </b><br>
                                        Data Admin Gudang Yang Sudah Ada</p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-home"></i></i> &nbsp <b>Tambah Data Gudang : </b><br>
                                        Tambah Data Gudang Baru <br></p>

                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="card-body">

                        <a href="?page=gudang&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">

                            <i class="fa fa-home"> </i>Gudang
                        </a>

                        <a href="?page=mapping_usergudang&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">

                            <i class="fas fa-people-roof"></i> Admin Gudang
                        </a>

                        <a href="?page=gudang&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-home"> </i> </i> Tambah Data Gudang
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">DATA STOK</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-list"></i>
                            DATA STOK
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#Modalstok">
                                <i class="fas fa-circle-info"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="Modalstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Stok Barang</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <h5><b>BUTTON : </b><br></h5>
                                    <p><i class="fa fa-shopping-cart"></i> &nbsp <b>Suplier : </b><br>
                                        Data Gudang Yang Sudah Ada </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-shopping-cart"></i></i> &nbsp <b>Tambah Suplier : </b><br>
                                        Tambah Data Suplier Baru </p>

                                    <p><i class="fa fa-bar-chart"></i> &nbsp <b> History Stok : </b><br>
                                        Data History Stok Yang Terjadi </p>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <a href="?page=suplier&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">
                            <i class="fa fa-shopping-cart"></i> Suplier
                        </a>

                        <a href="?page=suplier&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-info" style="width: 130px;">
                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-shopping-cart"></i></i>Tambah Suplier
                        </a>

                        <a href="?page=home&aksi=home_history_stok" target="_BLANK" class="btn btn-app bg-success" style="width: 130px;">

                            <i class="fa fa-bar-chart"></i> History Stok
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">DATA KARYAWAN & AKUN <small><i>Tambah Karyawan, Akun & Departemen</i></small></h5>
        <div class="row">

            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-clipboard-list"></i>
                            DATA KARYAWAN
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#ModalKaryawan">
                                <i class="fas fa-circle-info"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>


                    <div class="modal fade" id="ModalKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Data Karyawan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <p><i class="fas fa-user"></i> &nbsp <b>Karyawan : </b><br>
                                        Data Karyawan Yang Telah Ada</p>

                                    <p><i class="fas fa-id-card"></i> &nbsp <b>Pengguna: </b><br>
                                        Data Pengguna Yang Telah Ada</p>

                                    <p><i class="fa fa-user-plus"></i> &nbsp <b>Tambah Karyawan : </b><br>
                                        Tambah Data Karyawan Baru</p>

                                    <p><i class="fa fa-user-plus"></i> &nbsp <b>Tambah Pengguna : </b><br>
                                        Tambah Data Pengguna Baru</p>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="card-body">
                        <a href="?page=karyawan&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">
                            <i class="fa fa-users"></i> Karyawan
                        </a>

                        <a href="?page=user&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">
                            <i class="fas fa-id-card"></i> Pengguna
                        </a>

                        <a href="?page=fingeruser&aksi=tarikfinger&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-success" style="width: 130px;">
                            <i class="fa fa-user-plus"></i> Tambah Karyawan
                        </a>

                        <a href="?page=fingeruser&aksi=upload&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-success" style="width: 130px;">
                            <i class="fa fa-user-plus"></i> Tambah Pengguna
                        </a>

                    </div>
                </div>
            </div>



            <!-- Left col -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">

                        <h3 class="card-title">
                            <i class="fas fa-clipboard-list"></i>
                            DATA DEPARTEMEN KARYAWAN
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#ModalDepartemen">
                                <i class="fas fa-circle-info"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="ModalDepartemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Data Departemen Karyawan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <p><i class="fa fa-sitemap"></i> &nbsp <b>Departemen : </b><br>
                                        Data Departemen Yang Telah Ada</p>

                                    <p><i class="fas fa-folder-tree"></i> &nbsp <b>Sub_Departemen: </b><br>
                                        Data Sub-Departemen Yang Telah Ada</p>

                                    <p><i class="fa fa-briefcase"></i> &nbsp <b>Jabatan : </b><br>
                                        Data Jabatan Yang Telah Ada</p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-sitemap"></i></i> &nbsp <b>Tambah Departemen : </b><br>
                                        Tambah Data Departemen Baru
                                    </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fas fa-folder-tree"></i></i> &nbsp <b>Tambah Sub-Departemen : </b><br>
                                        Tambah Data Sub-Departemen Baru
                                    </p>

                                    <p><i class="fas fa-circle-plus"> &nbsp <i class="fa fa-briefcase"></i></i> &nbsp <b>Tambah Jabatan : </b><br>
                                        Tambah Data Jabatan Baru
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="?page=departemen&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-dark" style="width: 130px;">
                            <i class="fa fa-sitemap"></i> Departemen
                        </a>

                        <a href="?page=subdepartemen&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-success" style="width: 130px;">
                            <i class="fas fa-folder-tree"></i> Sub-Departemen
                        </a>

                        <a href="?page=jabatan&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-info" style="width: 130px;">
                            <i class="fa fa-briefcase"></i> Jabatan

                        </a>

                        <a href="?page=departemen&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-sitemap"></i> </i> Tambah Departemen

                        </a>

                        <a href="?page=subdepartemen&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fas fa-folder-tree"> </i> </i> Tambah Sub Departemen
                        </a>

                        <a href="?page=jabatan&aksi=tambah&pc=<?php echo $angka; ?>&oc=<?php echo md5($angka); ?>" target="_BLANK" class="btn btn-app bg-primary" style="width: 130px;">

                            <i class="fas fa-circle-plus"> &nbsp <i class="fa fa-briefcase"></i> </i> Tambah Jabatan

                        </a>

                    </div>

                </div>
            </div>