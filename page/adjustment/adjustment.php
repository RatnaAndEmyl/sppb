<?php
$angka = date('Ymdhis');
// $level = $_SESSION['s_level'];

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$sql_count_gudang = $koneksi_master->query("SELECT COUNT(kode_gudang) 'jumlah' FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang WHERE a.status='A' AND kode_user='$kode_user' AND b.status='A'");
$tampil_count_gudang = $sql_count_gudang->fetch_assoc();
$jumlah_gudang =  $tampil_count_gudang['jumlah'];

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment");
$tampil = $sql->fetch_assoc();

// echo $tampil['create_by'];
// echo $nik_login;


?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">DAFTAR ADJUSTMENT</h4> <br>
                        <?php echo $tampil_jumlah_permintaan['jumlah_permintaan']; ?>
                    </div>
                    <div class="card-body">

                        <a href="?page=adjustment&aksi=home_adjustment" class="btn btn-secondary" style="margin-bottom: 5px; "><i class="fas fa-home"></i> Home adjustment</a>

                        <?php
                        if ($level == 'ADMIN') { ?>
                            <a href="?page=adjustment&aksi=history_adjustment" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-history"></i> History adjustment</a>
                        <?php } ?>

                        <?php if (($level == 'ADMIN') and ($jumlah_gudang > 0)) { ?>
                            <a href="?page=adjustment&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <?php } ?>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Adjustment</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Operator</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Gudang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Foto</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Adjustment</th>

                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $TextQuery = "SELECT a.kode_adjustment, a.tanggal_adjustment, c.nama, a.jabatan, b.nama_gudang, a.status_adjustment, a.create_by, a.file, a.tgl_create FROM pb_transaksi.tb_adjustment a 
                                            INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang
                                            INNER JOIN pb_role.tb_user c ON a.nik=c.nik WHERE a.status='A'";


                                            // "SELECT a.kode_adjustment, a.tanggal_adjustment, c.nama, a.jabatan, b.nama_gudang, a.status_adjustment FROM pb_transaksi.tb_adjustment a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN (SELECT x.kode_adjustment, COUNT(x.kode_adjustment) AS 'jumlah' FROM pb_transaksi.tb_adjustment_detail x WHERE x.status <> 'N' GROUP BY x.kode_adjustment ORDER BY x.kode_adjustment)xx ON a.kode_adjustment = xx.kode_adjustment WHERE a.status='A' AND xx.jumlah > 0"

                                            if ($level == 'USER') {
                                                // $TextQuery = $TextQuery . " AND a.nik='$nik_login'";
                                                $TextQuery = $TextQuery . " AND a.create_by='$kode_user'";
                                            } else if ($level == 'SUPERVISOR') {
                                                $TextQuery = "SELECT a.kode_adjustment, a.tanggal_adjustment, c.nama, a.jabatan, b.nama_gudang, a.status_adjustment, a.create_by, a.file, a.tgl_create FROM pb_transaksi.tb_adjustment a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.nik=c.nik INNER JOIN (SELECT x.kode_adjustment, COUNT(x.kode_adjustment) AS 'jumlah' FROM pb_transaksi.tb_adjustment_detail x WHERE x.status <> 'N' GROUP BY x.kode_adjustment ORDER BY x.kode_adjustment)xx ON a.kode_adjustment = xx.kode_adjustment WHERE a.status='A' AND xx.jumlah > 0 AND c.kode_departemen='$kode_departemen'";
                                            }

                                            $TextQuery = $TextQuery . " ORDER BY a.kode_adjustment ASC; ";
                                            $sql = $koneksi_master->query($TextQuery);
                                            while ($data = $sql->fetch_assoc()) {

                                                $file = $data['file'];
                                                $status_adjustment = '-';
                                                if ($data['status_adjustment'] == 'A') {
                                                    $status_adjustment = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_adjustment'] == 'Y') {
                                                    $status_adjustment = 'Sudah Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_adjustment'] == 'X') {
                                                    $status_adjustment = 'Ditolak' and $colortext = 'text-danger';
                                                } else {
                                                    $status_adjustment = 'Hangus' and $colortext = 'text-dark';
                                                }

                                                $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_adjustment) 'jumlah' FROM pb_transaksi.tb_adjustment_detail WHERE status='A' AND status_adjustment<>'A' AND kode_adjustment='" . $data['kode_adjustment'] . "'");
                                                $tampil_count_status = $sql_count_status->fetch_assoc();

                                                $sql_count = $koneksi_master->query("SELECT COUNT(kode_adjustment) 'jumlah' FROM pb_transaksi.tb_adjustment_detail WHERE status='A' AND kode_adjustment='" . $data['kode_adjustment'] . "'");
                                                $tampil_count = $sql_count->fetch_assoc();

                                                // $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment WHERE kode_adjustment='$kode_adjustment'");
                                                // $tampil = $sql->fetch_assoc();


                                            ?>
                                                <?php

                                                if ($level == 'ADMIN') {
                                                    if ($tampil_count_status['jumlah'] == 0) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?></td>
                                                            <td style="text-align:center; font-weight: bold; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> -
                                                                <?php echo $data['kode_adjustment']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_adjustment'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['file']; ?></td> -->
                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <?php if ($data['file'] == (strtoupper(substr($data['file'], -3)) <> 'JPG' and strtoupper(substr($data['file'], -4)) <> 'JPEG' and strtoupper(substr($data['file'], -3)) <> 'PNG')) { ?>

                                                                    <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>

                                                                <?php } elseif ($data['file'] == '') { ?>
                                                                    <?php echo "-"; ?>

                                                                <?php } else { ?>
                                                                    <a data-toggle="modal" data-target=<?php echo "#exampleModalPersetujuan" . $data['kode_adjustment']; ?>>Lihat Foto</a>

                                                                    <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>

                                                                    <div class="modal fade" id=<?php echo "exampleModalPersetujuan" . $data['kode_adjustment']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="exampleModalLabel1">FOTO<?php echo $file; ?></h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form>
                                                                                        <div>
                                                                                            <img src="dist/img_adjustment/<?php echo $data['file']; ?>" width="100%" height="100%"></a>

                                                                                            <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                                <?php
                                                                if ($status_adjustment == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_adjustment == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else if ($status_adjustment == 'Ditolak') {
                                                                    $warna_status = 'badge badge-danger';
                                                                } else {
                                                                    $warna_status = 'badge badge-dark';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_adjustment; ?></span></h5>
                                                            </td></b>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <a href="?page=adjustment&aksi=detail&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-success" title="Data Detail"><i class="fas fa-eye"></i></a>

                                                                <?php if (($tampil_count_status['jumlah'] == 0) and ($_SESSION['s_kode_user'] == $data['create_by'])) { ?>
                                                                    <a onclick="return confirm('Apakah anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=adjustment&aksi=hapus&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php  } ?>

                                                            </td>

                                                        </tr><?php }  ?>
                                                    </tr><?php } else {
                                                            if (($tampil_count_status['jumlah'] == 0) or ($tampil_count_status['jumlah'] <> 0)) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> - <?php echo $data['kode_adjustment']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_adjustment'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['file']; ?></td> -->
                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <?php if ($data['file'] == (strtoupper(substr($data['file'], -3)) <> 'JPG' and strtoupper(substr($data['file'], -4)) <> 'JPEG' and strtoupper(substr($data['file'], -3)) <> 'PNG')) { ?>

                                                                    <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>

                                                                <?php } elseif ($data['file'] == '') { ?>
                                                                    <?php echo "-"; ?>

                                                                <?php } else { ?>
                                                                    <a data-toggle="modal" data-target=<?php echo "#exampleModalPersetujuan" . $data['kode_adjustment']; ?>>Lihat Foto</a>

                                                                    <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>

                                                                    <div class="modal fade" id=<?php echo "exampleModalPersetujuan" . $data['kode_adjustment']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title" id="exampleModalLabel1">FOTO<?php echo $file; ?></h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form>
                                                                                        <div>
                                                                                            <img src="dist/img_adjustment/<?php echo $data['file']; ?>" width="100%" height="100%"></a>

                                                                                            <a href="download_file.php?filename=<?= $data['file'] ?>">Unduh Foto</a>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                                <?php
                                                                if ($status_adjustment == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_adjustment == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_adjustment; ?></span></h5>
                                                            </td></b>

                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <a href="?page=adjustment&aksi=detail&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-success" title="Lihat Detail Data"><i class="fa-regular fa-eye"></i></a>

                                                                <?php
                                                                if (($tampil_count_status['jumlah'] == 0) and ($level == 'USER')) { ?>

                                                                    <!-- <a href="?page=adjustment&aksi=ubah&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-info" title="Edit Data"><i class="fas fa-pencil-alt"></i></a> -->

                                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=adjustment&aksi=hapus&kode_adjustment=<?php echo $data['kode_adjustment']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_adjustment'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php } ?>
                                                            </td>
                                                    <?php }
                                                        } ?>
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