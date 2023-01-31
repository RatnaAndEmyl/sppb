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
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px">Dashboard</label>

                                            <select class="custom-select" id="pilih_dashboard" style="width: 200px;" name="pilih_dashboard" required>
                                                <option value="7" <?php if ($_SESSION['s_dashboard'] == '7') {
                                                                        echo 'selected';
                                                                    } ?>>MASTER GA</option>
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
                                                <option value="8" <?php if ($_SESSION['s_dashboard'] == '8') {
                                                                        echo 'selected';
                                                                    } ?>>ADJUSTMENT</option>

                                                <option value="6" <?php if ($_SESSION['s_dashboard'] == '6') {
                                                                        echo 'selected';
                                                                    } ?>>PENGINGAT</option>
                                                                    
                                                <!-- <option value="9" <?php if ($_SESSION['s_dashboard'] == '9') {
                                                                            echo 'selected';
                                                                        } ?>>HISTORY STOK</option> -->
                                            </select>
                                        </div>
                                    </div>

                                    <?php if (($_SESSION['s_dashboard'] <> '7') and ($_SESSION['s_dashboard'] <> '6')) { ?>
                                        <div class="col-md-4" style=" padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Gudang</label>
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
                                    <?php } ?>

                                    <?php if ($_SESSION['s_dashboard'] == '9') { ?>
                                        <?php if ($level <> 'USER') { ?>
                                            <div class="col-md-4" style="padding-bottom: 10px;">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px; text-align:right;">Barang</label>
                                                    <select class="custom-select" id="pilih_barang_history" name="pilih_barang_history" style="width: 200px;" required>

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
                                    <?php } ?>

                                    <?php if (($_SESSION['s_dashboard'] <> '7') and ($_SESSION['s_dashboard'] <> '6') and ($_SESSION['s_dashboard'] <> '9')) { ?>
                                        <div class="col-md-4" style="padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px">Bulan</label>

                                                <?php

                                                $check_tgl = $_SESSION['s_pilih_tanggal'];

                                                ?>

                                                <input type="month" id="pilih_tanggal_home" style="width: 200px;" name="pilih_tanggal" value="<?php echo $_SESSION['s_pilih_tanggal'];  ?>" required>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (($_SESSION['s_dashboard'] <> '7') and ($_SESSION['s_dashboard'] <> '6') and ($_SESSION['s_dashboard'] <> '9')) { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Status</label>

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
                                                    <!-- <option value="XX" <?php if ($_SESSION['s_status_permintaan'] == 'XX') {
                                                                                echo 'selected';
                                                                            } ?>>HANGUS</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (($level == 'ADMIN') and ($_SESSION['s_dashboard'] <> '7') and ($_SESSION['s_dashboard'] <> '6') and ($_SESSION['s_dashboard'] <> '9')) { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Departemen</label>
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
                                    <!-- $_SESSION['s_dashboard'] -->

                                    <?php if (($level <> 'USER') and ($_SESSION['s_dashboard'] <> '3') and ($_SESSION['s_dashboard'] <> '7' and ($_SESSION['s_dashboard'] <> '6') and ($_SESSION['s_dashboard'] <> '9'))) { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Pengguna</label>
                                                <select class="custom-select" id="pilih_pengguna" name="pilih_pengguna" style="width: 200px;" required>

                                                    <?php

                                                    // $sql1 = $koneksi_master->query("SELECT a.nama FROM pb_role.tb_user a INNER JOIN pb_master.tb_departemen_karyawan b ON a.kode_departemen=b.kode_departemen where a.status='A' AND b.status='A' AND a.kode_departemen='$kode_departemen' ORDER BY kode_user ASC");

                                                    if ($_SESSION['s_pilih_pengguna'] == 'ALL') {
                                                        echo "<option value ='ALL' selected>ALL</option>";
                                                    } else {
                                                        echo "<option value ='ALL'>ALL</option>";
                                                    }

                                                    $sql1 = $koneksi_master->query("SELECT a.nama FROM pb_role.tb_user a INNER JOIN pb_master.tb_departemen_karyawan b ON a.kode_departemen=b.kode_departemen WHERE a.status='A' AND b.status='A' AND b.nama_departemen='$_SESSION[s_pilih_departemen]' ORDER BY kode_user ASC");

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

                                    <?php if (($level <> 'USER') and ($_SESSION['s_dashboard'] == '3') and ($_SESSION['s_dashboard'] <> '6') and ($_SESSION['s_dashboard'] <> '9')) { ?>
                                        <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Suplier</label>
                                                <select class="custom-select" id="pilih_suplier_bbm" name="pilih_suplier_bbm" style="width: 200px;" required>

                                                    <?php

                                                    if ($_SESSION['s_pilih_suplier_bbm'] == 'ALL') {
                                                        echo "<option value ='ALL' selected>ALL</option>";
                                                    } else {
                                                        echo "<option value ='ALL'>ALL</option>";
                                                    }

                                                    $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier WHERE status='A' ORDER BY kode_suplier ASC");

                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_suplier_bbm'] == $datacek['nama_suplier']) {
                                                            echo "<option value ='$datacek[nama_suplier]' selected>$datacek[nama_suplier]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[nama_suplier]'>$datacek[nama_suplier]</option>";
                                                        }
                                                    }
                                                    // }

                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>


                                    <?php if ($_SESSION['s_dashboard'] == '6') { ?>
                                        <!-- FILTER PENGINGAT ON OFF -->
                                        <div class="col-md-4" style="padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px">Pengingat</label>
                                                <select class="custom-select" id="pilih_pengingat" style="width: 200px;" name="pilih_pengingat" required>
                                                    <?php

                                                    $sql1 = $koneksi_master->query("SELECT distinct a.status_reminder from pb_transaksi.tb_pengingat a where a.status = 'A' ");
                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_pengingat'] == $datacek['status_reminder']) {
                                                            echo "<option value ='$datacek[status_reminder]' selected>$datacek[status_reminder]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[status_reminder]'>$datacek[status_reminder]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- FILTER JATUH TEMPO -->
                                        <div class="col-md-4" style=" padding-bottom: 10px; ">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Jatuh Tempo</label>
                                                <select class="custom-select" id="pilih_jatuh" name="pilih_jatuh" style="width: 200px;" required>
                                                    <?php
                                                    // if ($_SESSION['s_pilih_jatuh'] == 'ALL') {
                                                    //     echo "<option value ='ALL' selected>ALL</option>";
                                                    // } else {
                                                    //     echo "<option value ='ALL'>ALL</option>";
                                                    // }

                                                    $sql1 = $koneksi_master->query("SELECT * from pb_master.tb_trxtype a where a.status='A' and exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.status='A' and a.kode_trxtype=x.kode_trxtype) ORDER BY a.kode_trxtype asc");
                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_jatuh'] == $datacek['kode_trxtype']) {
                                                            echo "<option value ='$datacek[kode_trxtype]' selected>$datacek[deskripsi]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- FILTER JANGKA WAKTU -->
                                        <div class="col-md-4" style="padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px">Jangka Waktu</label>
                                                <select class="custom-select" id="pilih_jangka" style="width: 200px;" name="pilih_jangka" required>
                                                    <option value="30" <?php if ($_SESSION['s_pilih_jangka'] == '30') {
                                                                            echo 'selected';
                                                                        } ?>>1 Bulan</option>
                                                    <option value="90" <?php if ($_SESSION['s_pilih_jangka'] == '90') {
                                                                            echo 'selected';
                                                                        } ?>>3 Bulan</option>
                                                    <option value="180" <?php if ($_SESSION['s_pilih_jangka'] == '180') {
                                                                            echo 'selected';
                                                                        } ?>>6 Bulan</option>
                                                    <option value="365" <?php if ($_SESSION['s_pilih_jangka'] == '365') {
                                                                            echo 'selected';
                                                                        } ?>>1 Tahun</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- FILTER PENGGUNA MOBIL -->
                                        <div class="col-md-4" style=" padding-bottom: 10px;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 120px; text-align:right;">Pengguna</label>
                                                <select class="custom-select" id="pilih_pengguna_mobil" name="pilih_pengguna_mobil" style="width: 200px;" required>
                                                    <?php
                                                    if ($_SESSION['s_pilih_pengguna_mobil'] == 'ALL') {
                                                        echo "<option value ='ALL' selected>ALL</option>";
                                                    } else {
                                                        echo "<option value ='ALL'>ALL</option>";
                                                    }

                                                    $sql1 = $koneksi_master->query("SELECT distinct a.deskripsi_aktiva from pb_transaksi.tb_aktiva_detail a where a.status = 'A' and a.kode_trxtype = 'TRX000005' ORDER BY a.kode_trxtype ASC");
                                                    while ($datacek = $sql1->fetch_assoc()) {

                                                        if ($_SESSION['s_pilih_pengguna_mobil'] == $datacek['deskripsi_aktiva']) {
                                                            echo "<option value ='$datacek[deskripsi_aktiva]' selected>$datacek[deskripsi_aktiva]</option>";
                                                        } else {
                                                            echo "<option value ='$datacek[deskripsi_aktiva]'>$datacek[deskripsi_aktiva]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!--  -->

                                    <?php } ?>
                                    <!-- PUNYA PENGINGAT -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade  show active" id="adminloker" role="tabpanel" aria-labelledby="adminloker-tab">
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
                            <?php include "page/permintaan/home_permintaan.php"; ?>
                        <?php } else if ($_SESSION['s_dashboard'] == '5') {
                        ?>
                            <?php include "page/bbk/home_bbk.php"; ?>


                        <?php } else if ($_SESSION['s_dashboard'] == '6') { ?>
                            <?php include "page/jatuh_tempo/home_reminder_coba.php"; ?>


                        <?php } else if ($_SESSION['s_dashboard'] == '7') { ?>
                            <?php include "page/home/home_master_ga.php"; ?>

                        <?php } else if ($_SESSION['s_dashboard'] == '8') { ?>
                            <?php include "page/adjustment/home_adjustment.php"; ?>

                        <?php } else if ($_SESSION['s_dashboard'] == '9') { ?>
                            <?php include "page/home/home_history_stok.php"; ?>

                        <?php } ?>

                    </div>
                </div>
                <!-- /.card -->

                <!--  -->

            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->