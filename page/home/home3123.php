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

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                                <div class="row">

                                    <div class="col-md-4" style="padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px">Dashboard</label>

                                            <select class="custom-select" id="pilih_dashboard" style="width: 200px;" name="pilih_dashboard" required>
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

                                    <!-- <?php echo $_SESSION['s_dashboard']; ?>

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
                                    </div> -->

                                    <!-- <div class="col-md-4" style="padding-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 110px">Bulan</label>

                                            <?php

                                            $check_tgl = $_SESSION['s_pilih_tanggal'];

                                            ?>

                                            <input type="month" id="pilih_tanggal_home" style="width: 200px;" name="pilih_tanggal" value="<?php echo $_SESSION['s_pilih_tanggal'];  ?>" required>
                                        </div>
                                    </div> -->


                                    <!-- <div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px;">
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
                                    </div>  -->

                                    <!-- <?php if ($level == 'ADMIN') { ?>
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
                                    <?php } ?> -->

                                    <!-- <?php if ($level <> 'USER') { ?>
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
                                    <?php } ?> -->

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
                            <?php include "page/permintaan/home_permintaan.php";
                            ?>

                        <?php } else if ($_SESSION['s_dashboard'] == '5') {
                        ?>
                            <?php include "page/bbk/home_bbk.php"; ?>

                        <?php } ?>
                    </div>
                </div>
                <!-- /.card -->

                <!--  -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
<!-- /.content -->