<!DOCTYPE html>
<html lang="en">

<body class="layout-footer-fixed layout-navbar-fixed layout-fixed text-sm" style="height: auto;">
    <div class="wrapper">
        <h5 align="center"><b>SELAMAT DATANG <?= $nama; ?> DI WEBSITE SNI</b></h5>
        <H6 align="center">ANDA MASUK SEBAGAI <?= $level; ?></H6><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                        <div class="row">

                            <div class="col-md-3" style="padding-bottom: 10px;">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px">Dashboard</label>

                                    <select class="custom-select" id="dashboard" style="width: 200px;" name="dashboard" required>

                                        <option value="1" selected>LOKER</option>

                                        <option value="2">PENJADWALAN</option>

                                        <option value="3">DATA MASTER</option>

                                        <option value="4">LAPORAN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3" style="padding-bottom: 10px;">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px">Bulan</label>
                                    <input type="month" id="pilih_tanggal" style="width: 200px;" name="pilih_tanggal" value="2022-06" required>
                                </div>
                            </div>

                            <div class="col-md-3" style=" padding-bottom: 10px;">
                                <div class="input-group-prepend">

                                    <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px; text-align:right;">Jenis</label>

                                    <select class="custom-select" id="status_loker" style="width: 200px;" name="status_loker" required>

                                        <option value="A" selected>AKTIF</option>

                                        <option value="N">TIDAK AKTIF</option>

                                        <option value="Y">BERAKHIR</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card card-primary card-tabs">
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="col-sm-12" style="text-align:right; padding-bottom:10px;">
                                            <select class="custom-select" id="limit" style="width: 60px;" name="limit" required>
                                                <option value="5" selected>5</option>
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                            </select>

                                            <!-- link Previous halaman disable -->
                                            <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>

                                            <a class="btn btn-primary " style="margin:2px;" href="?page=home&halaman=1">1</a>

                                            <!-- link Next Page -->
                                            <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                                        </div>

                                        <!-- <div class="col-sm-12" style="padding: 4px; background-color:bg-white;">
                                            <div class="position-relative p-3 " style="border-style: solid; border-width: thin; border-top-right-radius: 50px; border-bottom-left-radius: 50px;  background-color: #F5F5F5;">
                                                <div class="ribbon-wrapper ribbon-xl">
                                                    <div class="ribbon bg-dark">
                                                        CLOSE </div>
                                                </div>
                                                <form class="form-horizontal">
                                                    <div class="form-body">
                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Loker</label>
                                                                        <div class="col-md-6">
                                                                            <b>STAFF ASESMEN & PELATIHAN <br></b>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Tgl Loker</label>
                                                                        <div class="col-md-6">
                                                                            23 JUNI 2022 s/d 30 SEPTEMBER 2022
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Kuota (Diterima) </label>
                                                                        <div class="col-md-6">
                                                                            1 (0) orang <br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Pelamar</label>
                                                                        <div class="col-md-6">
                                                                            86 orang <br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Aksi</label>
                                                                        <div class="col-md-6">

                                                                            <a href="?page=lowongankerja&aksi=detail_pelamar&kode_loker=LKR000013&pc=20221103081945&oc=cce3b467b31e6f94892a3d38ab5bcc48" class="btn btn-dark"><i class="fas fa-user"></i></a>

                                                                            <a href="?page=lowongankerja&aksi=detail_loker&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-success"><i class="fas fa-eye"></i></a>


                                                                            <a onclick="return confirm('Apakah Anda Yakin untuk Refresh Data Ini ?')" href="?page=lowongankerja&aksi=refresh&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-primary"><i class="fas fa-recycle"></i></a>

                                                                            <a href="?page=lowongankerja&aksi=ubah&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" style="padding: 4px; background-color:bg-white;">
                                            <div class="position-relative p-3" style="border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: #EEE8AA;">
                                                <div class="ribbon-wrapper ribbon-xl">
                                                    <div class="ribbon bg-dark">
                                                        CLOSE </div>
                                                </div>

                                                <div class="position-absolute p-3" style="border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: #87CEEB;">
                                                </div>

                                                <form class="form-horizontal">
                                                    <div class="form-body">
                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Loker</label>
                                                                        <div class="col-md-6">
                                                                            <b>STAFF ASESMEN & PELATIHAN <br></b>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Tgl Loker</label>
                                                                        <div class="col-md-6">
                                                                            23 JUNI 2022 s/d 30 SEPTEMBER 2022
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Kuota (Diterima) </label>
                                                                        <div class="col-md-6">
                                                                            1 (0) orang <br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Pelamar</label>
                                                                        <div class="col-md-6">
                                                                            86 orang <br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="control-label text-left col-md-2">Aksi</label>
                                                                        <div class="col-md-6">

                                                                            <a href="?page=lowongankerja&aksi=detail_pelamar&kode_loker=LKR000013&pc=20221103081945&oc=cce3b467b31e6f94892a3d38ab5bcc48" class="btn btn-dark"><i class="fas fa-user"></i></a>

                                                                            <a href="?page=lowongankerja&aksi=detail_loker&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-success"><i class="fas fa-eye"></i></a>


                                                                            <a onclick="return confirm('Apakah Anda Yakin untuk Refresh Data Ini ?')" href="?page=lowongankerja&aksi=refresh&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-primary"><i class="fas fa-recycle"></i></a>

                                                                            <a href="?page=lowongankerja&aksi=ubah&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>  -->

                                        <div class="card col-sm-12 border border-dark" style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px;">
                                            <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 20px; background-color: #FF69B4;">
                                                <h6><strong>24 Mei 2022</strong></h6>
                                                <h6><strong>Ratna Dewi Arianti</strong></h6>
                                            </div>
                                            <div class="ribbon-wrapper ribbon-xl">
                                                <div class="ribbon bg-primary">
                                                    PERLU PERSETUJUAN </div>
                                            </div>
                                            <!-- <div class="card-body">
                                                    <h5 class="card-title">Special title treatment</h5>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    2 days ago
                                                </div> -->

                                            <form class="form-horizontal">
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Loker</label>
                                                                    <div class="col-md-6">
                                                                        <b>STAFF ASESMEN & PELATIHAN <br></b>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Tgl Loker</label>
                                                                    <div class="col-md-6">
                                                                        23 JUNI 2022 s/d 30 SEPTEMBER 2022
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Kuota (Diterima) </label>
                                                                    <div class="col-md-6">
                                                                        1 (0) orang <br>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Pelamar</label>
                                                                    <div class="col-md-6">
                                                                        86 orang <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-dark text-center">

                                                                <label class="control-label text-left">Aksi</label>

                                                                <a href="?page=lowongankerja&aksi=detail_pelamar&kode_loker=LKR000013&pc=20221103081945&oc=cce3b467b31e6f94892a3d38ab5bcc48" class="btn btn-dark"><i class="fas fa-user"></i></a>

                                                                <a href="?page=lowongankerja&aksi=detail_loker&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-success"><i class="fas fa-eye"></i></a>


                                                                <!-- <a onclick="return confirm('Apakah Anda Yakin untuk Refresh Data Ini ?')" href="?page=lowongankerja&aksi=refresh&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-primary"><i class="fas fa-recycle"></i></a> -->

                                                                <a href="?page=lowongankerja&aksi=ubah&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                            </div>

                                                            <!-- <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="control-label text-left col-md-2">Aksi</label>
                                                                    <div class="col-md-6">

                                                                        <a href="?page=lowongankerja&aksi=detail_pelamar&kode_loker=LKR000013&pc=20221103081945&oc=cce3b467b31e6f94892a3d38ab5bcc48" class="btn btn-dark"><i class="fas fa-user"></i></a>

                                                                        <a href="?page=lowongankerja&aksi=detail_loker&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-success"><i class="fas fa-eye"></i></a>


                                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Refresh Data Ini ?')" href="?page=lowongankerja&aksi=refresh&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-primary"><i class="fas fa-recycle"></i></a>

                                                                        <a href="?page=lowongankerja&aksi=ubah&kode_analisa_jabatan=AJ00025&kode_loker=LKR000013&home&pc=20221103081945&oc=21e52b59d442f9de282a4fa190e7c251" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                                    </div>
                                                                </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>

                                    </div>
                                    <!-- <div class="card col-sm-12 border border-dark" style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-bottom-left-radius: 50px; border-bottom-right-radius: 50px; ">
                                                <div class="card-header text-dark text-center" style="border-width: thin; border-bottom-left-radius: 50px; border-bottom-right-radius: 50px; background-color: #8FBC8F;">
                                                    isinya tanggal dan username
                                                </div>
                                                <div class="ribbon-wrapper ribbon-xl">
                                                    <div class="ribbon bg-dark">
                                                        CLOSE </div>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">Special title treatment</h5>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    2 days ago
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</body>

</html>