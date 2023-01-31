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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DAFTAR SURAT PERMINTAAN PEMBELIAN BARANG
                            <!-- <?php echo $_SESSION['s_pilih_tanggal'] . $_SESSION['s_status_sppb']; ?> (<?php echo $_SESSION['s_pilih_pengguna_sppb'] ?>) (<?php echo $_SESSION['s_pilih_departemen_sppb'] ?>) -->
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php if ($level <> 'SUPERVISOR') { ?>
                            <a href="?page=sppb&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

                        <?php } ?>

                        <div class="row">
                            <?php
                            
                            $tgl_awal = date('Y-m-01', strtotime($_SESSION['s_pilih_tanggal']));
                            $tgl_akhir = date('Y-m-t', strtotime($_SESSION['s_pilih_tanggal']));

                            $sqltext = "SELECT a.kode_sppb, a.tanggal_sppb, a.username, a.jabatan, b.nama_gudang, a.status_sppb, c.nik, d.nama_departemen FROM pb_transaksi.tb_sppb a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN pb_master.tb_departemen_karyawan d ON c.kode_departemen=d.kode_departemen";

                            $sqltext = $sqltext . " WHERE a.status='A' ";

                            if ($level == 'USER') {
                                $sqltext = $sqltext . "AND c.nik='$nik_login' ";
                            }
                            if ($level == 'SUPERVISOR') {
                                $sqltext = $sqltext . "AND EXISTS(SELECT x.* FROM pb_transaksi.tb_sppb_detail x WHERE x.kode_sppb=a.kode_sppb) AND c.kode_departemen='$kode_departemen' ";
                            }


                            $sqltext = $sqltext . " AND '" .  $_SESSION['s_pilih_gudang'] . "' = b.nama_gudang
                             AND d.nama_departemen = '$_SESSION[s_pilih_departemen]'
                             AND a.tanggal_sppb between '$tgl_awal' and '$tgl_akhir'";

                            if ($_SESSION['s_pilih_pengguna'] <> 'ALL') {
                                $sqltext = $sqltext . " AND '" . $_SESSION['s_pilih_pengguna'] . "' = a.username";
                            }

                            if ($_SESSION['s_status_permintaan'] <> 'ALL') {
                                $sqltext = $sqltext . " AND '" . $_SESSION['s_status_permintaan'] . "' = a.status_sppb";
                            }

                            $sqltext = $sqltext . " ORDER BY a.tgl_create DESC";
                            $sqlpaging = $sqltext;
                            $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;
                            $sql = $koneksi_master->query($sqltext);
                            $no = $limitStart + 1;
                            // $color_bg = '#FFFFFF';

                            $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

                            // echo $sqltext. '<br>';

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
                                    if ($halaman > $jumlahPage + 1) { ?>
                                        <script>
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
                                $status_sppb = '-';
                                if ($data['status_sppb'] == 'A') {
                                    $status_sppb = 'Perlu Persetujuan' and $color = 'bg-warning';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb='A' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Perlu Persetujuan' and $colortext = 'text-orange';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb<>'A' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
                                } elseif ($data['status_sppb'] == 'Y') {
                                    $status_sppb = 'Sudah Disetujui' and $color = 'bg-success';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb='Y' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Telah Disetujui' and $colortext = 'text-success';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb<>'A' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
                                } elseif ($data['status_sppb'] == 'X') {
                                    $status_sppb = 'Ditolak!' and $color = 'bg-danger';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb='N' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Ditolak' and $colortext = 'text-danger';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb<>'A' AND kode_sppb='" . $data['kode_sppb'] . "'");
                                    $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
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
                                    <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; background-color: <?php echo $bg_color ?>">
                                        <h6><strong><?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($data['tanggal_sppb']))); ?></strong></h6>
                                        <h6><strong><?php echo $data['username']; ?></strong></h6>
                                        <b><?php echo $data['nik']; ?> <?php echo '(' . $data['jabatan'] . ')'; ?></b>
                                    </div>
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="shadow p-2 mb-3 ribbon bg- <?php echo $color ?>">
                                            <?php echo '<b>' .  $status_sppb . '</b>'; ?> </div>
                                    </div>

                                    <form class="form-horizontal">
                                        <div class="form-body">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Dokumen</label>
                                                            <div class="col-md-6">
                                                                <?php echo $data['kode_sppb']; ?> <br>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Gudang</label>
                                                            <div class="col-md-6">
                                                                <?php echo $data['nama_gudang']; ?><br>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Barang</label>
                                                            <div class="col-md-6">
                                                                <!-- <b class=<?php echo $colortext ?>><?php echo $tampil_count_status['jumlah'] ?> <?php echo $status ?></b><br> -->
                                                                <?php if ($status == 'Barang Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-pill badge-warning';
                                                                } else if ($status == 'Barang Telah Disetujui') {
                                                                    $warna_status = 'badge badge-pill badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-pill badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $tampil_count_status['jumlah'] ?> <?php echo $status; ?></span></h5>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label col-md-3">Aksi </label>
                                                            <div class="col-md-6">

                                                                <a href="?page=sppb&aksi=detail&kode_sppb=<?php echo $data['kode_sppb']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-success" title="Lihat Detail"><i class="fas fa-eye"></i></a>

                                                                <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menyetujui Data Ini ?')" href="?page=sppb&aksi=proses_sppb&kode_sppb=<?php echo $data['kode_sppb']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-success"><i class="fas fa-check"></i></a> -->

                                                                <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menolak Data Ini ?')" href="?page=sppb&tidak_disetujui&aksi=proses_sppb&kode_sppb=<?php echo $data['kode_sppb']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-danger" ><i class="fas fa-times"></i></a> -->

                                                                <!-- if (($level == 'USER') OR (($level == 'ADMIN') AND ($nik_login))) -->
                                                                <!-- AND ($nik_login == '202200004') -->

                                                                <?php if (($level == 'USER') or ($level == 'ADMIN')) {
                                                                    if ($tampil_count_status_selain_a['jumlah'] == 0) {
                                                                        if (($data['status_sppb'] == 'A') and ($_SESSION['s_nik'] == $data['nik'])) { ?>
                                                                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count_status['jumlah'] ?> Barang Ini?')" href="?page=sppb&aksi=hapus&kode_sppb=<?php echo $data['kode_sppb']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                        <?php } ?>
                                                                    <?php } ?>

                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                    </div>
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