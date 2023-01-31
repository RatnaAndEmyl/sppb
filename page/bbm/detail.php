<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
// echo $kode_bbm;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php

}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm WHERE kode_bbm='$kode_bbm'");
$tampil = $sql->fetch_assoc();


// $sql1 = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm_detail WHERE kode_bbm='$kode_bbm'");
// $tampil1 = $sql1->fetch_assoc();

$sql1 = $koneksi_master->query("SELECT COUNT(kode_po) 'jumlah' FROM pb_transaksi.tb_bbm_detail WHERE kode_bbm='$kode_bbm'");
$tampil1 = $sql1->fetch_assoc();


$sql2 = $koneksi_master->query("SELECT COUNT(kode_po) 'jumlah' FROM pb_transaksi.tb_po_detail WHERE kode_po='$kode_po'");
$tampil2 = $sql2->fetch_assoc();

// $sql2 = $koneksi_master->query("SELECT COUNT(b.kode_po) 'jumlah' FROM pb_transaksi.tb_po_detail a INNER JOIN  pb_transaksi.tb_bbm_detail b ON a.kode_po=b.kode_po WHERE b.kode_bbm='$kode_bbm'");
// $tampil2 = $sql2->fetch_assoc();


$sql_count_status = $koneksi_master->query("SELECT COUNT(kode_bbm) 'jumlah' FROM pb_transaksi.tb_bbm_detail WHERE status='A' AND status_bbm='A' AND kode_bbm='$kode_bbm'");
$tampil_count_status = $sql_count_status->fetch_assoc();

$sql_count_barang = $koneksi_master->query("SELECT COUNT(kode_barang) 'jumlah' FROM pb_transaksi.tb_bbm_detail WHERE status='A' AND status_bbm<>'A' AND kode_bbm='$kode_bbm'");
$tampil_count_barang = $sql_count_barang->fetch_assoc();


$sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_bbm) 'jumlah' FROM pb_transaksi.tb_bbm_detail WHERE status='A' AND status_bbm<>'A' AND kode_bbm='$kode_bbm'");
$tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
//echo $tampil_count_status_selain_a['jumlah'];

$sql1 = $koneksi_master->query("SELECT COUNT(a.kode_po) AS 'jumlah' FROM pb_transaksi.tb_po_detail a INNER JOIN pb_transaksi.tb_po b on a.kode_po=b.kode_po WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik' AND b.kode_gudang='$kode_gudang' AND a.status_po='Y' AND not exists (SELECT x.kode_po, x.kode_barang FROM pb_transaksi.tb_bbm_detail x WHERE x.kode_po=a.kode_po and x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_po='Y' AND x.kode_bbm='$kode_bbm') ORDER BY a.kode_po");
$tampil_sql1 = $sql1->fetch_assoc();

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            DAFTAR BARANG MASUK
                            <?php echo $tampil['username']; ?> <br>
                            <?php echo $tampil['kode_bbm']; ?> (<?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($tampil['tanggal_bbm']))); ?>)

                            <!-- <?php echo $_SESSION['s_nik']; ?> -->
                            <!-- <?php echo $_SESSION['s_kode_user'] . '<br>'; ?> -->
                            <!-- <?php echo $tampil['nik']; ?> -->
                            <!-- <?php echo $tampil['create_by']; ?> -->
                            <!-- <?php echo $tampil2['jumlah']; ?> -->
                            <!-- <?php echo $nik_login; ?> -->

                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- ini nah salah -->
                        <?php
                        if (($tampil['status_bbm'] == 'A') and ($tampil_count_status['jumlah'] == 0) and ($tampil_count_barang['jumlah'] <> 0)) { ?>
                            <a href="?page=bbm&aksi=simpan_proses&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>
                        <?php } elseif (($tampil['status_bbm'] == 'Y') or ($tampil['status_bbm'] == 'X')) { ?>
                            <a href="?page=bbm" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fa fa-undo"></i></i> Kembali</a>
                        <?php } else {
                        ?>
                            <a href="?page=bbm" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i></i> Simpan</a>
                        <?php
                        } ?>

                        <?php
                        if (($level <> 'SUPERVISOR')) {
                            if (($tampil_count_status_selain_a['jumlah'] == 0) and (($_SESSION['s_kode_user'] == $tampil['create_by']))) { ?>

                                <!-- (($tampil_count_status_selain_a['jumlah'] == 0) and ($_SESSION['s_nik'] == $tampil['nik'])) -->

                                <a href="?page=bbm&aksi=tambah_bbm&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Barang</a>
                            <?php } ?>
                        <?php } ?>

                        <!-- <?php
                                if ($level <> 'SUPERVISOR') { ?>

                            <a href="?page=bbm&aksi=tambah_bbm&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Barang</a>

                        <?php } ?> -->

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Kode PO</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Barang Diminta</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jumlah Pemenuhan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status BBM</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm_detail a WHERE a.STATUS='A' AND a.kode_bbm='$kode_bbm' ORDER BY a.kode_bbm asc");
                                            while ($data = $sql->fetch_assoc()) {

                                                // perkondisian untuk status_bbm
                                                $status_bbm = '-';
                                                if ($data['status_bbm'] == 'A') {
                                                    $status_bbm = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_bbm'] == 'Y') {
                                                    $status_bbm = 'Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_bbm'] == 'N') {
                                                    $status_bbm = 'Ditolak' and $colortext = 'text-danger';
                                                }

                                                // perkondisian untuk status
                                                if ($data['jumlah_permintaan'] <> $data['jumlah_pemenuhan']) {
                                                    $status = 'Terpenuhi Sebagian' and $color = 'text-danger';
                                                } else {
                                                    $status = 'Terpenuhi' and $color = 'text-success';
                                                }

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_po']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nama_barang']; ?>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['jumlah_permintaan']; ?> <?php echo $data['nama_satuan']; ?> </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <b><?php echo $data['jumlah_pemenuhan']; ?> <?php echo $data['nama_satuan']; ?></b> <br>
                                                        <?php if ($status == 'Terpenuhi') {
                                                            $warna_status = 'badge rounded-pill bg-success';
                                                        } else {
                                                            $warna_status = 'badge rounded-pill bg-danger';
                                                        } ?>
                                                        <h5><span class="<?php echo $warna_status; ?>"><?php echo $status; ?></span></h5>
                                                     </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if ($status_bbm == 'Perlu Persetujuan') {
                                                            $warna_status = 'badge badge-warning';
                                                        } else if ($status_bbm == 'Disetujui') {
                                                            $warna_status = 'badge badge-success';
                                                        } else {
                                                            $warna_status = 'badge badge-danger';
                                                        } ?>
                                                        <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_bbm; ?></span></h5>

                                                        <?php if ($status_bbm == 'Ditolak') { ?>
                                                            <b><?php echo $data['keterangan']; ?></b>
                                                        <?php } ?>

                                                    </td></b>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php

                                                        if ($data['status_bbm'] == 'A') { ?>
                                                            <?php if ($level == 'SUPERVISOR') { ?>
                                                                <a href="?page=bbm&aksi=proses_bbm&kode_bbm=<?php echo $data['kode_bbm']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbm'] . $angka); ?>" class="btn btn-success btn-md" style="margin-bottom: 5px; "><i class="fas fa-check-circle"></i> Disetujui</a>

                                                                <a href="?page=bbm&tidak_disetujui&aksi=proses_bbm&kode_bbm=<?php echo $data['kode_bbm']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbm'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px;"><i class="fa fa-times-circle" aria-hidden="true"></i> Ditolak</a>


                                                                <?php } else {
                                                                if (($tampil_count_status_selain_a['jumlah'] == 0) and ($level == 'USER') or ($level == 'ADMIN')) { ?>
                                                                    <?php if ($_SESSION['s_kode_user'] == $tampil['create_by']) { ?>
                                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=bbm&aksi=hapus_barang&kode_bbm=<?php echo $data['kode_bbm']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbm'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true" title="Hapus Data"></i></a>
                                                                    <?php } else {
                                                                        echo '-';
                                                                    } ?>
                                                            <?php }  /*punya else tu pang */
                                                            } ?>
                                                            <!-- punya (($level == 'ADMIN') or ($level == 'SUPERVISOR')) -->

                                                        <?php } else {
                                                            echo '-';
                                                        } ?>

                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <!-- <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tfoot> -->
                                    </table>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>window.print()</script> -->