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
                <h5 align="center"><b>SELAMAT DATANG <?= $nama; ?> DI WEBSITE SNI</b></h5>
                <H6 align="center">ANDA MASUK SEBAGAI <strong><span class=<?php echo $colour; ?>><?= $level; ?></strong></span></h6><br>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                                <div class="row">

                                    <div class="col-md-4" style="padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px">Dashboard</label>

                                            <select class="custom-select" id="dashboard" style="width: 200px;" name="dashboard" required>
                                                <option value="1" <?php if ($_SESSION['s_dashboard'] == '1') {
                                                                        echo 'selected';
                                                                    } ?>>SPPB</option>
                                                <option value="2" <?php if ($_SESSION['s_dashboard'] == '2') {
                                                                        echo 'selected';
                                                                    } ?>>PO</option>
                                                <option value="3" <?php if ($_SESSION['s_dashboard'] == '3') {
                                                                        echo 'selected';
                                                                    } ?>>BBM</option>
                                                <option value="4" <?php if ($_SESSION['s_dashboard'] == '4') {
                                                                        echo 'selected';
                                                                    } ?>>PERMINTAAN</option>
                                                <option value="5" <?php if ($_SESSION['s_dashboard'] == '5') {
                                                                        echo 'selected';
                                                                    } ?>>BBK</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style=" padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Gudang</label>
                                            <select class="custom-select" id="pilih_gudang" name="pilih_gudang" style="width: 200px;" required>

                                                <?php
                                                // if ($_SESSION['pilih_gudang'] == 'ALL') {
                                                //     echo "<option value ='ALL' selected>ALL</option>";
                                                // } else {
                                                //     echo "<option value ='ALL'>ALL</option>";
                                                // }

                                                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE status='A' ORDER BY kode_gudang  ASC");
                                                while ($datacek = $sql1->fetch_assoc()) {

                                                    if ($_SESSION['s_pilih_gudang'] == $datacek['nama_gudang']) {
                                                        echo "<option value ='$datacek[nama_gudang]' selected>$datacek[nama_gudang]</option>";
                                                    } else {
                                                        echo "<option value ='$datacek[nama_gudang]'>$datacek[nama_gudang]</option>";
                                                    }
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px">Bulan</label>

                                            <input type="month" id="pilih_tanggal_home" style="width: 200px;" name="pilih_tanggal" value="<?php echo $_SESSION['s_pilih_tanggal'];  ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Status</label>

                                            <select class="custom-select" id="status_permintaan" style="width: 200px;" name="status_permintaan" required>
                                                <?php
                                                if ($_SESSION['status_permintaan'] == 'ALL') {
                                                    echo "<option value ='ALL' selected>ALL</option>";
                                                } else {
                                                    echo "<option value ='ALL'>ALL</option>";
                                                }
                                                ?>
                                                <option value="A" <?php if ($_SESSION['s_status_permintaan'] == 'A') {
                                                                        echo 'selected';
                                                                    } ?>>PERLU PERSETUJUAN</option>

                                                <option value="Y" <?php if ($_SESSION['s_status_permintaan'] == 'Y') {
                                                                        echo 'selected';
                                                                    } ?>>SUDAH DISETUJUI</option>

                                                <option value="X" <?php if ($_SESSION['s_status_permintaan'] == 'X') {
                                                                        echo 'selected';
                                                                    } ?>>DITOLAK</option>
                                            </select>
                                        </div>
                                    </div>

                                    <?php if ($level == 'ADMIN') { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Departemen</label>
                                                <select class="custom-select" id="pilih_departemen" name="pilih_departemen" style="width: 200px;" required>

                                                    <?php

                                                    $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_departemen_karyawan WHERE status='A' ORDER BY kode_departemen ASC");

                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_departemen'] == $datacek['nama_departemen']) {
                                                            echo "<option value ='$datacek[nama_departemen]' selected>$datacek[nama_departemen]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[nama_departemen]'>$datacek[nama_departemen]</option>";
                                                        }
                                                    }

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($level <> 'USER') { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Pengguna</label>
                                                <select class="custom-select" id="pilih_pengguna" name="pilih_pengguna" style="width: 200px;" required>

                                                    <?php

                                                    // $sql1 = $koneksi_master->query("SELECT a.nama FROM pb_role.tb_user a INNER JOIN pb_master.tb_departemen_karyawan b ON a.kode_departemen=b.kode_departemen where a.status='A' AND b.status='A' AND a.kode_departemen='$kode_departemen' ORDER BY kode_user ASC");

                                                    if ($_SESSION['s_pilih_pengguna'] == 'ALL') {
                                                        echo "<option value ='ALL' selected>ALL</option>";
                                                    } else {
                                                        echo "<option value ='ALL'>ALL</option>";
                                                    }


                                                    $sql1 = $koneksi_master->query("SELECT a.nama FROM pb_role.tb_user a INNER JOIN pb_master.tb_departemen_karyawan b ON a.kode_departemen=b.kode_departemen where a.status='A' AND b.status='A' AND b.nama_departemen='$_SESSION[s_pilih_departemen]' ORDER BY kode_user ASC");

                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_pengguna'] == $datacek['nama']) {
                                                            echo "<option value ='$datacek[nama]' selected>$datacek[nama]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[nama]'>$datacek[nama]</option>";
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
                </div>

                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade  show active" id="adminloker" role="tabpanel" aria-labelledby="adminloker-tab">
                        <!-- <?php echo $_SESSION['s_status_loker']; ?> -->
                        <?php
                        if ($_SESSION['s_dashboard'] == '1') {
                        ?>
                            <?php include "page/sppb/home_sppb.php";
                            ?>

                        <?php
                        } else if ($_SESSION['s_dashboard'] == '2') {
                        ?>

                            <?php include "page/po/home_po.php";
                            ?>

                        <?php
                        } else if ($_SESSION['s_dashboard'] == '3') {
                        ?>

                            <?php include "page/bbm/home_bbm.php";
                            ?>

                        <?php } else if ($_SESSION['s_dashboard'] == '4') {
                        ?>
                            <?php include "page/home/home.php";
                            ?>

                        <?php } else if ($_SESSION['s_dashboard'] == '5') {
                        ?>
                            <?php include "page/bbk/home_bbk.php"; ?>

                        <?php } ?>
                    </div>
                </div>
                <!-- /.card -->

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DAFTAR PERMINTAAN BARANG
                            <!-- <?php echo $_SESSION['s_pilih_tanggal'] . $_SESSION['s_status_permintaan']; ?> (<?php echo $_SESSION['s_pilih_pengguna'] ?>) (<?php echo $_SESSION['s_pilih_departemen'] ?>) -->
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php if ($level <> 'SUPERVISOR') { ?>
                            <a href="?page=permintaan&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

                        <?php } ?>

                        <div class="row">
                            <?php
                            $sqltext = "SELECT a.kode_permintaan, a.tanggal, c.nama, a.jabatan, b.nama_gudang, a.status_permintaan, c.nik FROM pb_transaksi.tb_permintaan a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN pb_master.tb_departemen_karyawan d ON c.kode_departemen=d.kode_departemen";


                            $sqltext = $sqltext . " where a.status='A' ";

                            if ($level == 'USER') {
                                $sqltext = $sqltext . "and a.nik='$nik_login' ";
                            }
                            if ($level == 'SUPERVISOR') {
                                $sqltext = $sqltext . "and exists(select x.* from pb_transaksi.tb_permintaan_detail x where x.kode_permintaan=a.kode_permintaan) and c.kode_departemen='$kode_departemen' ";
                            }


                            $sqltext = $sqltext . " AND '" .  $_SESSION['s_pilih_tanggal'] . "' = date_format (a.tanggal,'%Y-%m') 
                            AND b.nama_gudang ='$_SESSION[s_pilih_gudang]'
                            AND d.nama_departemen = '$_SESSION[s_pilih_departemen]'";

                            if ($_SESSION['s_pilih_pengguna'] <> 'ALL') {
                                $sqltext = $sqltext . " AND '" . $_SESSION['s_pilih_pengguna'] . "' = c.nama";
                            }

                            if ($_SESSION['s_status_permintaan'] <> 'ALL') {
                                $sqltext = $sqltext . " AND '" . $_SESSION['s_status_permintaan'] . "' = a.status_permintaan";
                            }

                            $sqltext = $sqltext . " ORDER BY a.tgl_create DESC";


                            // AND a.status_permintaan ='$_SESSION[s_status_permintaan]'

                            // $sqltext = "SELECT a.kode_permintaan, a.tanggal, c.nama, a.jabatan, b.nama_gudang, a.status_permintaan, c.nik FROM pb_transaksi.tb_permintaan a 
                            // INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang 
                            // INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user
                            // INNER JOIN pb_master.tb_departemen_karyawan d ON c.kode_departemen=d.kode_departemen 
                            // ";

                            // if ($level == 'SUPERVISOR') {
                            //     $sqltext = $sqltext . " INNER JOIN (SELECT x.kode_permintaan, COUNT(x.kode_permintaan) AS 'jumlah' FROM pb_transaksi.tb_permintaan_detail x WHERE x.status <> 'N' GROUP BY x.kode_permintaan ORDER BY x.kode_permintaan)xx ON a.kode_permintaan = xx.kode_permintaan ";
                            // }

                            // $sqltext = $sqltext . " where a.status='A'";


                            // if ($level == 'USER') {
                            //     $sqltext = $sqltext . " AND a.nik='$nik_login'";
                            // } else if ($level == 'SUPERVISOR') {
                            //     $sqltext = $sqltext . " AND xx.jumlah > 0 AND c.kode_departemen='$kode_departemen'";
                            // }


                            $sqlpaging = $sqltext;
                            $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;
                            // $sqltext = $sqltext . " AND '" .  $_SESSION['s_pilih_tanggal'] . "' = date_format (a.tanggal,'%Y-%m') 
                            // AND '" . $_SESSION['s_pilih_pengguna'] . "' = c.nama
                            // AND '" . $_SESSION['s_status_permintaan'] . "' = a.status_permintaan 
                            // AND '" . $_SESSION['s_pilih_gudang'] . "' = b.nama_gudang  
                            // AND '" . $_SESSION['s_pilih_departemen'] . "' = d.nama_departemen ORDER BY a.tgl_create DESC"; 
                            // $sqltext = $sqltext . " LIMIT '  . $limitStart . ',' . $limit;";



                            // if ($_SESSION['s_pilih_pengguna'] == 'ALL') {
                            //     echo "'" . $_SESSION['s_pilih_pengguna'] . "' = c.nama";
                            // } else {

                            // }

                            // AND '" . $_SESSION['s_pilih_pengguna'] . "' = c.nama 
                            // AND '" . $_SESSION['s_pilih_gudang'] . "' = b.nama_gudang


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
                                $status_permintaan = '-';
                                if ($data['status_permintaan'] == 'A') {
                                    $status_permintaan = 'Perlu Persetujuan' and $color = 'bg-warning';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Perlu Persetujuan' and $colortext = 'text-orange';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan<>'A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                    $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
                                } elseif ($data['status_permintaan'] == 'Y') {
                                    $status_permintaan = 'Sudah Disetujui' and $color = 'bg-success';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='Y' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Telah Disetujui' and $colortext = 'text-success';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan<>'A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                    $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
                                } elseif ($data['status_permintaan'] == 'X') {
                                    $status_permintaan = 'Ditolak!' and $color = 'bg-danger';
                                    $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='N' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                    $tampil_count_status = $sql_count_status->fetch_assoc();
                                    $status = 'Barang Ditolak' and $colortext = 'text-danger';

                                    $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan<>'A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
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
                                        <h6><strong><?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($data['tanggal']))); ?></strong></h6>
                                        <h6><strong><?php echo $data['nama']; ?></strong></h6>
                                        <b><?php echo $data['nik']; ?> <?php echo '(' . $data['jabatan'] . ')'; ?></b>
                                    </div>
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="shadow p-2 mb-3 ribbon bg- <?php echo $color ?>">
                                            <?php echo '<b>' .  $status_permintaan . '</b>'; ?> </div>
                                    </div>

                                    <form class="form-horizontal">
                                        <div class="form-body">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="control-label text-left col-md-3">Dokumen</label>
                                                            <div class="col-md-6">
                                                                <?php echo $data['kode_permintaan']; ?> <br>

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
                                                                <!-- <?php echo $data['kode_permintaan']; ?><br> -->
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

                                                                <a href="?page=permintaan&aksi=detail&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success" title="Lihat Detail"><i class="fas fa-eye"></i></a>

                                                                <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menyetujui Data Ini ?')" href="?page=permintaan&aksi=proses_permintaan&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success"><i class="fas fa-check"></i></a> -->

                                                                <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menolak Data Ini ?')" href="?page=permintaan&tidak_disetujui&aksi=proses_permintaan&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger" ><i class="fas fa-times"></i></a> -->

                                                                <!-- if (($level == 'USER') OR (($level == 'ADMIN') AND ($nik_login))) -->
                                                                <!-- AND ($nik_login == '202200004') -->

                                                                <?php if (($level == 'USER') or ($level == 'ADMIN')) {
                                                                    if ($tampil_count_status_selain_a['jumlah'] == 0) {
                                                                        if (($data['status_permintaan'] == 'A') and ($_SESSION['s_nik'] == $data['nik'])) { ?>
                                                                            <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count_status['jumlah'] ?> Barang Ini?')" href="?page=permintaan&aksi=hapus&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

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