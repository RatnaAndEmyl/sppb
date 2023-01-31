<?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$menu = '';
$limit = $_SESSION['s_limit'];
$halaman = (isset($_GET['halaman'])) ? (int) $_GET['halaman'] : 1;
$limitStart = ($halaman - 1) * $limit;

// echo $_SESSION['s_nik'] . '<br>';

if ($level == 'ADMIN') {
    $colour = 'text-primary';
} else if ($level == 'SUPERVISOR') {
    $colour = 'text-danger';
} elseif ($level == 'USER') {
    $colour = 'text-orange';
}

?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- <h5 align="center"><b>SELAMAT DATANG <?= $nama; ?> DI WEBSITE SNI</b></h5>
                <H6 align="center">ANDA MASUK SEBAGAI <strong><span class=<?php echo $colour; ?>><?= $level; ?></strong></span></h6><br> -->

                <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                                <div class="row">

                                    <div class="col-md-6" style=" padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Gudang</label>
                                            <select class="custom-select" id="pilih_gudang_history" name="pilih_gudang_history" style="width: 300px;" required>

                                                <?php

                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE status='A' ORDER BY kode_gudang  ASC");
                                                while ($datacek = $sql1->fetch_assoc()) {

                                                    if ($_SESSION['s_pilih_gudang_history'] == $datacek['nama_gudang']) {
                                                        echo "<option value ='$datacek[nama_gudang]' selected>$datacek[nama_gudang]</option>";
                                                    } else {
                                                        echo "<option value ='$datacek[nama_gudang]'>$datacek[nama_gudang]</option>";
                                                    }
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <?php if ($level <> 'USER') { ?>
                                        <div class="col-md-6" style="padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Barang</label>
                                                <select class="custom-select" id="pilih_barang_history" name="pilih_barang_history" style="width: 300px;" required>

                                                    <?php

                                                    if ($_SESSION['s_pilih_barang_history'] == 'ALL') {
                                                        echo "<option value ='ALL' selected>ALL</option>";
                                                    } else {
                                                        echo "<option value ='ALL'>ALL</option>";
                                                    }


                                                    $sql1 = $koneksi_master->query("SELECT DISTINCT b.nama_barang FROM pb_master.tb_barang a INNER JOIN pb_transaksi.tb_history_stok b WHERE a.status='A' AND b.status='A' ORDER BY id_barang ASC");

                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_barang_history'] == $datacek['nama_barang']) {
                                                            echo "<option value ='$datacek[nama_barang]' selected>$datacek[nama_barang]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[nama_barang]'>$datacek[nama_barang]</option>";
                                                        }
                                                    }
                                                    // }

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-12">
                    <div class="card card-light collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <h6><label>*Kode Warna</label></h6>
                               <button type="button" class="btn btn-dark"></button> Adjustment Out
                                &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp<button type="button" class="btn btn-primary"></button> Adjustment In
                                &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp<button type="button" class="btn btn-warning"></button> Barang Masuk
                                &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp<button type="button" class="btn btn-success"></button> Barang Keluar
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DAFTAR HISTORY BARANG
                            <!-- (<?php echo $_SESSION['s_pilih_gudang_history'] ?>) (<?php echo $_SESSION['s_pilih_barang_history'] ?>) -->
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sqltext = "SELECT a.pemohon, a.kode, b.nama_gudang, e.nama_barang, a.admin, a.jenis_modul, a.stok_awal, a.stok_masuk, a.stok_keluar, a.stok_akhir, a.tgl_create, f.nama_satuan FROM pb_transaksi.tb_history_stok a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.create_by=c.kode_user INNER JOIN pb_master.tb_departemen_karyawan d ON c.kode_departemen=d.kode_departemen INNER JOIN pb_master.tb_barang e ON a.kode_barang=e.id_barang INNER JOIN pb_master.tb_satuan f ON e.kode_satuan=f.kode_satuan";

                            $sqltext = $sqltext . " WHERE a.status='A' ";

                            // if ($level == 'USER') {
                            //     $sqltext = $sqltext . "AND c.nik='$nik_login' ";
                            // }
                            // if ($level == 'SUPERVISOR') {
                            //     $sqltext = $sqltext . "AND EXISTS(SELECT x.* from pb_transaksi.tb_permintaan_detail x WHERE x.kode_permintaan=a.kode_permintaan) AND c.kode_departemen='$kode_departemen' ";
                            // }

                            $sqltext = $sqltext . " AND '" .  $_SESSION['s_pilih_gudang'] . "' = b.nama_gudang";

                            if ($_SESSION['s_pilih_barang_history'] <> 'ALL') {
                                $sqltext = $sqltext . " AND '" . $_SESSION['s_pilih_barang_history'] . "' = e.nama_barang";
                            }

                            $sqltext = $sqltext . " ORDER BY a.tgl_create DESC";

                            $sqlpaging = $sqltext;
                            $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;
                            $sql = $koneksi_master->query($sqltext);
                            $no = $limitStart + 1;
                            // $color_bg = '#FFFFFF';

                            $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

                            //Hitung semua jumlah data yang berada pada tabel Sisawa
                            $JumlahData = mysqli_num_rows($SqlQuery);
                            ?>
                            <?php if ($JumlahData == 0) {
                                $posisi = 'center';
                            } else {
                                $posisi = 'right';
                            }


                            ?>

                            <div class="col-sm-12" style="text-align:<?php echo $posisi ?>; padding-bottom:10px;">
                                <?php
                                if ($JumlahData > 0) { ?>
                                    <select class="custom-select" id="limit" style="width: 60px;" name="limit" required>
                                        <option value="5" <?php if ($_SESSION['s_limit'] == '5') {
                                                                echo 'selected';
                                                            } ?>>5</option>
                                        <option value="10" <?php if ($_SESSION['s_limit'] == '10') {
                                                                echo 'selected';
                                                            } ?>>10</option>
                                        <option value="25" <?php if ($_SESSION['s_limit'] == '25') {
                                                                echo 'selected';
                                                            } ?>>25</option>
                                        <option value="50" <?php if ($_SESSION['s_limit'] == '50') {
                                                                echo 'selected';
                                                            } ?>>50</option>
                                    </select>
                                    <?php
                                    // Jika page = 1, maka LinkPrev disable
                                    if ($halaman == 1) {
                                    ?>
                                        <!-- link Previous halaman disable -->
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
                                    <?php
                                    } else {
                                        $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                                    ?>
                                        <!-- link Previous Page -->
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                                    <?php
                                    }
                                    ?>
                                    <?php

                                    // Hitung jumlah halaman yang tersedia
                                    $jumlahPage = ceil($JumlahData / $limit);
                                    if ($halaman > $jumlahPage + 1) { ?><script>
                                            window.location.href = "?page=home&halaman=1";
                                        </script> <?php }

                                                // Jumlah link number 
                                                $jumlahNumber = 1;

                                                // Untuk awal link number
                                                $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

                                                // Untuk akhir link number
                                                $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

                                                for ($i = $startNumber; $i <= $endNumber; $i++) {
                                                    $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
                                                    ?>
                                        <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    <?php
                                                }
                                    ?>

                                    <!-- link Next Page -->
                                    <?php
                                    if ($halaman == $jumlahPage) { ?>
                                        <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                                    <?php
                                    } else {
                                        $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                                    ?>
                                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                                <?php
                                    }
                                    $awal = (($halaman - 1) * $limit) + 1;

                                    $akhir = (($halaman - 1) * $limit) + $limit;
                                    if ($akhir > $JumlahData) {
                                        $akhir = $JumlahData;
                                    }
                                } else {
                                    echo 'Tidak ada data.';
                                }
                                ?>
                            </div>

                            <?php
                            while ($data = $sql->fetch_assoc()) {
                                if ($data['jenis_modul'] == 'BBM') {
                                    $jenis_modul = 'Barang Masuk' and $color = 'bg-warning';
                                } elseif ($data['jenis_modul'] == 'BBK') {
                                    $jenis_modul = 'Barang Keluar' and $color = 'bg-success';
                                } elseif ($data['jenis_modul'] == 'ADJ IN') {
                                    $jenis_modul = 'ADJUSTMENT IN' and $color = 'bg-primary';
                                } else {
                                    $jenis_modul = 'ADJUSTMENT OUT' and $color = 'bg-dark';
                                }

                                if ($level == 'SUPERVISOR') {
                                    $bg_color = '#DCDCDC';
                                } elseif ($level == 'USER') {
                                    $bg_color = '#FFE4B5';
                                } elseif ($level == 'ADMIN') {
                                    $bg_color = '#B0C4DE';
                                }

                            ?>

                                <!-- <div class="col-sm-12" style="padding: 4px; background-color:bg-white;"> -->

                                <div class="card col-sm-12 shadow p-2 mb-4 bg-body" style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: 	#F5F5F5;">
                                    <!-- <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; border-inline: 1rem solid; writing-mode: horizontal-tb; background-color: <?php echo $bg_color ?>"> -->

                                    <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; background-color: <?php echo $bg_color ?>">
                                        <h6><strong><?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($data['tgl_create']))); ?></strong></h6>
                                        <?php if (($jenis_modul == 'Barang Masuk') or ($jenis_modul == 'Barang Keluar')) { ?>
                                            <h6><strong><?php echo $data['pemohon']; ?></strong></h6>
                                        <?php } else { ?>
                                            <h6><strong><?php echo $data['admin']; ?></strong></h6>
                                        <?php } ?>


                                        <!-- <b><?php echo '(' . $jenis_modul . ')'; ?></b> -->
                                    </div>
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="shadow p-2 mb-3 ribbon bg- <?php echo $color ?>">
                                            <?php echo '<b>' .  $jenis_modul . '</b>'; ?> </div>
                                    </div>

                                    <form class="form-horizontal">
                                        <div class="form-body">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Dokumen</label>
                                                            <div class="col-sm-4">
                                                                <?php echo $data['kode']; ?> <br>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Gudang</label>
                                                            <div class="col-sm-4">
                                                                <?php echo $data['nama_gudang']; ?><br>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Barang </label>
                                                            <div class="col-sm-4">
                                                                <?php echo $data['nama_barang']; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Stok Awal</label>
                                                            <div class="col-sm-4">
                                                                <?php echo $data['stok_awal']; ?> <?php echo $data['nama_satuan']; ?>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php if (($jenis_modul == 'Barang Masuk') or ($jenis_modul == 'ADJUSTMENT IN')) { ?>
                                                        <div class="col-sm-4">
                                                            <div class="form-group row">
                                                                <label class="control-label text-left col-md-3">Stok Masuk</label>
                                                                <div class="col-sm-4">
                                                                    <?php echo $data['stok_masuk']; ?> <?php echo $data['nama_satuan']; ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } elseif (($jenis_modul == 'Barang Keluar') or ($jenis_modul == 'ADJUSTMENT OUT')) { ?>
                                                        <div class="col-sm-4">
                                                            <div class="form-group row">
                                                                <label class="control-label text-left col-md-3">Stok Keluar</label>
                                                                <div class="col-sm-4">
                                                                    <?php echo $data['stok_keluar']; ?> <?php echo $data['nama_satuan']; ?>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="col-sm-4">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Stok Akhir</label>
                                                            <div class="col-sm-4">
                                                                <!-- <?php echo $data['stok_akhir']; ?> <?php echo $data['nama_satuan']; ?> -->
                                                                <h5><span class="badge badge-pill badge-warning"><?php echo $data['stok_akhir']; ?> <?php echo $data['nama_satuan']; ?></span></h5>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3">Aksi </label>
                                                            <div class="col-md-6">

                                                                <a href="?page=permintaan&aksi=detail&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success" title="Lihat Detail"><i class="fas fa-eye"></i></a>

                                                                <?php if (($level == 'USER') or ($level == 'ADMIN')) {
                                                                    if ($tampil_count_status_selain_a['jumlah'] == 0) {
                                                                        if (($data['status_permintaan'] == 'A') and ($_SESSION['s_nik'] == $data['nik'])) { ?>
                                                                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count_status['jumlah'] ?> Barang Ini?')" href="?page=permintaan&aksi=hapus&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                        <?php } ?>
                                                                    <?php } ?>


                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                
                                <!-- </div> -->
                            <?php }
                            if ($JumlahData > 0) {
                                echo '<br>Menampilkan ' . $awal . ' sampai ' . $akhir . ' dari total ' . $JumlahData . ' data.';
                            }
                            ?>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <?php
            if ($JumlahData > 0) { ?>
                <div class="col-sm-12" style="text-align:center">

                    <?php

                    // Jika page = 1, maka LinkPrev disable
                    if ($halaman == 1) {
                    ?>
                        <!-- link Previous halaman disable -->
                        <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
                    <?php
                    } else {
                        $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                    ?>
                        <!-- link Prev Page -->
                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                    <?php
                    }
                    ?>

                    <?php
                    $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

                    //Hitung semua jumlah data yang berada pada tabel Sisawa
                    $JumlahData = mysqli_num_rows($SqlQuery);

                    // Hitung jumlah halaman yang tersedia
                    $jumlahPage = ceil($JumlahData / $limit);

                    // Jumlah link number 
                    $jumlahNumber = 1;

                    // Untuk awal link number
                    $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

                    // Untuk akhir link number
                    $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

                    for ($i = $startNumber; $i <= $endNumber; $i++) {
                        $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
                    ?>
                        <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                    }
                    ?>

                    <!-- link Next Page -->
                    <?php
                    if ($halaman == $jumlahPage) {
                    ?>
                        <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                    <?php
                    } else {
                        $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                    ?>
                        <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                    <?php
                    }

                    ?>
                </div>
            <?php } ?>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->