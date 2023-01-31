<!DOCTYPE html>
<html lang="en">

<?php
$angka = date('Ymdhis');
$tgl = date("Y-m-d");

$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($tgl)))

?>

<body>

    <div class="page-breadcrumb">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Stok Barang</h4>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="?page=laporan&aksi=stokbarang&pc=<?php echo $angka; ?>&oc=<?php echo md5($kodeuser . $angka); ?>" enctype="multipart/form-data">

                                <div class="form-group">

                                    <div class="row justify">
                                        <div class="col-sm-3 col-xs-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Dari Tanggal</label>
                                                <input type="date" class="form-control" name="dari_tgl" value="dd-MM-yyyy" max="<?php echo $tgl ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Sampai Tanggal</label>
                                                <input type="date" class="form-control" name="sampai_tgl" value="dd-MM-yyyy" max="<?php echo $tgl ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Gudang</label>

                                        <div class="select2-purple">
                                            <select class="select2" multiple="multiple" data-placeholder="-- Pilih Gudang --" data-dropdown-css-class="select2-purple" style="width: 100%;" name="kode_gudangstok[]" id="kode_gudangstok[]">
                                                <?php
                                                echo "<option value=''>-- Pilih Gudang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE status='A'");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Gudang</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control select2" name="kode_gudangstok" id="kode_gudangstok">
                                                <?php

                                                echo "<option value='' selected disabled>-- Pilih Gudang --</option>";
                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE status='A' ORDER BY nama_gudang");
                                                while ($datacek = $sql1->fetch_assoc()) {
                                                    echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group">
                                        <label for="exampleInputEmail111">Pilih Rekap</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                            </div>
                                            <select class="form-control" name="kode_mesinfinger" id="kode_mesinfinger">
                                                <option value="">-- Pilih --</option>

                                                <option value="rekappilihmesin"> Mesin - Regu</option>
                                                <option value="rekappilihdepartemen"> Departemen</option>
                                                <option value="rekappilihkaryawan"> Karyawan</option>

                                            </select>

                                        </div>
                                    </div> -->

                                    <!-- <div class="table-responsive" id="view_mesinregu"></div> -->

                                    <div>
                                        <input type="submit" value="filter" name="filter" class="btn btn-success m-r-10">
                                        <a href="?page=home" class="btn btn-dark">Kembali</a>
                                    </div>



                                </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>


</body>

</html>