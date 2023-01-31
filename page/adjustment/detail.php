<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];
$tgl_create = $_GET['tgl_create'];
// echo $kode_adjustment;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_adjustment . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php

}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment WHERE kode_adjustment='$kode_adjustment'");
$tampil = $sql->fetch_assoc();


// $sql1 = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment_detail WHERE kode_adjustment='$kode_adjustment'");
// $tampil1 = $sql1->fetch_assoc();

// $sql1 = $koneksi_master->query("ADJ000005");
// $tampil1 = $sql1->fetch_assoc();


$sql2 = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE kode_permintaan='$kode_permintaan'");
$tampil2 = $sql2->fetch_assoc();

// $sql2 = $koneksi_master->query("SELECT COUNT(b.kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail a INNER JOIN  pb_transaksi.tb_adjustment_detail b ON a.kode_permintaan=b.kode_permintaan WHERE b.kode_adjustment='$kode_adjustment'");
// $tampil2 = $sql2->fetch_assoc();


$sql_count_status = $koneksi_master->query("SELECT COUNT(kode_adjustment) 'jumlah' FROM pb_transaksi.tb_adjustment_detail WHERE status='A' AND status_adjustment='A' AND kode_adjustment='$kode_adjustment'");
$tampil_count_status = $sql_count_status->fetch_assoc();

$sql_count_barang = $koneksi_master->query("SELECT COUNT(kode_barang) 'jumlah' FROM pb_transaksi.tb_adjustment_detail WHERE status='A' AND status_adjustment<>'A' AND kode_adjustment='$kode_adjustment'");
$tampil_count_barang = $sql_count_barang->fetch_assoc();


$sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_adjustment) 'jumlah' FROM pb_transaksi.tb_adjustment_detail WHERE status='A' AND status_adjustment<>'A' AND kode_adjustment='$kode_adjustment'");
$tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
//echo $tampil_count_status_selain_a['jumlah'];

// $sql1 = $koneksi_master->query("SELECT COUNT(a.kode_permintaan) AS 'jumlah' FROM pb_transaksi.tb_permintaan_detail a INNER JOIN pb_transaksi.tb_permintaan b on a.kode_permintaan=b.kode_permintaan WHERE a.STATUS='A' AND b.STATUS='A'AND b.nik='$nik' AND b.kode_gudang='$kode_gudang' AND a.status_permintaan='Y' AND not exists (SELECT x.kode_permintaan, x.kode_barang FROM pb_transaksi.tb_adjustment_detail x WHERE x.kode_permintaan=a.kode_permintaan and x.kode_barang=a.kode_barang  AND x.status='A' AND a.status_permintaan='Y' AND x.kode_adjustment='$kode_adjustment') ORDER BY a.kode_permintaan");
// $tampil_sql1 = $sql1->fetch_assoc();

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            DAFTAR BARANG KELUAR
                            <?php echo $tampil['pemohon']; ?> <br>
                            <?php echo $tampil['kode_adjustment']; ?> (<?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($tampil['tanggal_adjustment']))); ?>)


                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (($tampil['status_adjustment'] == 'A') and ($tampil_count_status['jumlah'] == 0) and ($tampil_count_barang['jumlah'] <> 0)) { ?>
                            <a href="?page=adjustment&aksi=simpan_proses&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>
                        <?php } elseif (($tampil['status_adjustment'] == 'Y') or ($tampil['status_adjustment'] == 'X')) { ?>
                            <a href="?page=adjustment" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fa fa-undo"></i></i> Kembali</a>
                        <?php } else {
                        ?>
                            <a href="?page=adjustment" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i></i> Simpan</a>
                        <?php
                        } ?>

                        <?php
                        if (($level <> 'SUPERVISOR')) {
                            if (($tampil_count_status_selain_a['jumlah'] == 0) and (($_SESSION['s_kode_user'] == $tampil['create_by']))) { ?>

                                <!-- (($tampil_count_status_selain_a['jumlah'] == 0) and ($_SESSION['s_nik'] == $tampil['nik'])) -->

                                <a href="?page=adjustment&aksi=tambah_adjustment&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Barang</a>
                            <?php } ?>
                        <?php } ?>

                        <!-- <?php
                                if ($level <> 'SUPERVISOR') { ?>

                            <a href="?page=adjustment&aksi=tambah_adjustment&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Barang</a>

                        <?php } ?> -->

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Stok Keluar</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Stok Masuk</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Adjustment</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Validasi
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment_detail a WHERE a.STATUS='A' AND a.kode_adjustment='$kode_adjustment' ORDER BY a.kode_adjustment asc");

                                            while ($data = $sql->fetch_assoc()) {

                                                // perkondisian untuk status_adjustment
                                                $status_adjustment = '-';
                                                if ($data['status_adjustment'] == 'A') {
                                                    $status_adjustment = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_adjustment'] == 'Y') {
                                                    $status_adjustment = 'Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_adjustment'] == 'N') {
                                                    $status_adjustment = 'Ditolak' and $colortext = 'text-danger';
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
                                                        <?php echo $data['nama_barang']; ?>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if ($data['stok_in'] == '') { ?>
                                                            <?php echo $data['stok_out']; ?> <?php echo $data['nama_satuan']; ?>
                                                        <?php } else { ?>
                                                            <?php echo '-'; ?>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if ($data['stok_out'] == '') { ?>
                                                            <?php echo $data['stok_in']; ?> <?php echo $data['nama_satuan']; ?>
                                                        <?php } else { ?>
                                                            <?php echo '-'; ?>
                                                        <?php } ?>
                                                    </td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if ($status_adjustment == 'Perlu Persetujuan') {
                                                            $warna_status = 'badge badge-warning';
                                                        } else if ($status_adjustment == 'Disetujui') {
                                                            $warna_status = 'badge badge-success';
                                                        } else {
                                                            $warna_status = 'badge badge-danger';
                                                        } ?>
                                                        <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_adjustment; ?></span></h5>

                                                        <?php if ($status_adjustment == 'Ditolak') { ?>
                                                            <b><?php echo $data['keterangan']; ?></b>
                                                        <?php } ?>
                                                    </td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if ($data['status_adjustment'] == 'A') { ?>
                                                            <?php if ($level == 'SUPERVISOR') { ?>
                                                                <a href="?page=adjustment&aksi=proses_adjustment&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-success btn-md" style="margin-bottom: 5px; "><i class="fas fa-check-circle"></i> Disetujui</a>

                                                                <a href="?page=adjustment&tidak_disetujui&aksi=proses_adjustment&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fa fa-times-circle" aria-hidden="true"></i> Ditolak</a>
                                                            <?php } else {
                                                                echo '-';
                                                            } ?>
                                                        <?php } else {
                                                            echo '-';
                                                        } ?>

                                                    </td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php if (($tampil_count_status_selain_a['jumlah'] == 0) and ($level == 'USER') or ($level == 'ADMIN')) { ?>
                                                            <?php if ($_SESSION['s_kode_user'] == $tampil['create_by']) { ?>
                                                                <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=adjustment&aksi=hapus_barang&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true" title="Hapus Data"></i></a>
                                                            <?php } else {
                                                                echo '-';
                                                            } ?>
                                                        <?php } ?>

                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td></td> -->
                                        </tfoot>
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