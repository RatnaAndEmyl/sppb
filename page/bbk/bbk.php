<?php
$angka = date('Ymdhis');
// $level = $_SESSION['s_level'];

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$sql_count_gudang = $koneksi_master->query("SELECT COUNT(kode_gudang) 'jumlah' FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang WHERE a.status='A' AND kode_user='$kode_user' AND b.status='A'");
$tampil_count_gudang = $sql_count_gudang->fetch_assoc();
$jumlah_gudang =  $tampil_count_gudang['jumlah'];

// $sql_nama_gudang = $koneksi_master->query("SELECT c.nama_gudang FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang INNER JOIN pb_master.tb_gudang c ON a.kode_gudang=c.kode_gudang WHERE a.status='A' AND kode_user='$kode_user' AND b.status='A' AND c.status='A'");
// $tampil_nama_gudang = $sql_nama_gudang->fetch_assoc();
// $nama_gudang = $tampil_nama_gudang['nama_gudang'];

// $sql_jumlah_permintaan = $koneksi_master->query("SELECT b.jumlah_permintaan FROM pb_transaksi.tb_bbk_detail a INNER JOIN pb_transaksi.tb_permintaan_detail b ON a.kode_permintaan=b.kode_permintaan WHERE a.kode_bbk='$kode_bbk' AND b.status_permintaan='Y'");
// $tampil_jumlah_permintaan = $sql_jumlah_permintaan->fetch_assoc();
// $jumlah_permintaan =  $tampil_jumlah_permintaan['jumlah_permintaan'];

// echo $jumlah_gudang;
// echo $nama_gudang;
// echo $tampil_jumlah_permintaan['jumlah_permintaan'];

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk");
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
                        <h4 class="card-title">DAFTAR BARANG KELUAR</h4> <br>
                        <?php echo $tampil_jumlah_permintaan['jumlah_permintaan']; ?>
                    </div>
                    <div class="card-body">

                        <!-- <a href="?page=bbk&aksi=home_bbk" class="btn btn-secondary" style="margin-bottom: 5px; "><i class="fas fa-home"></i> Home BBK</a> -->

                        <?php
                        if ($level == 'ADMIN') { ?>
                            <a href="?page=bbk&aksi=history_bbk" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-history"></i> History BBK</a>
                        <?php } ?>

                        <?php if (($level == 'ADMIN') and ($jumlah_gudang > 0)) { ?>
                            <a href="?page=bbk&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <?php } ?>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Barang Keluar</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Pemohon</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Gudang</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Barang Keluar</th>

                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $TextQuery = "SELECT a.kode_bbk, a.tanggal_bbk, c.nama, a.jabatan, b.nama_gudang, a.status_bbk, a.create_by FROM pb_transaksi.tb_bbk a 
                                            INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang
                                            INNER JOIN pb_role.tb_user c ON a.nik=c.nik WHERE a.status='A'";


                                            // "SELECT a.kode_bbk, a.tanggal_bbk, c.nama, a.jabatan, b.nama_gudang, a.status_bbk FROM pb_transaksi.tb_bbk a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN (SELECT x.kode_bbk, COUNT(x.kode_bbk) AS 'jumlah' FROM pb_transaksi.tb_bbk_detail x WHERE x.status <> 'N' GROUP BY x.kode_bbk ORDER BY x.kode_bbk)xx ON a.kode_bbk = xx.kode_bbk WHERE a.status='A' AND xx.jumlah > 0"

                                            if ($level == 'USER') {
                                                // $TextQuery = $TextQuery . " AND a.nik='$nik_login'";
                                                $TextQuery = $TextQuery . " AND a.create_by='$kode_user'";
                                            } else if ($level == 'SUPERVISOR') {
                                                $TextQuery = "SELECT a.kode_bbk, a.tanggal_bbk, c.nama, a.jabatan, b.nama_gudang, a.status_bbk, a.create_by FROM pb_transaksi.tb_bbk a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.nik=c.nik INNER JOIN (SELECT x.kode_bbk, COUNT(x.kode_bbk) AS 'jumlah' FROM pb_transaksi.tb_bbk_detail x WHERE x.status <> 'N' GROUP BY x.kode_bbk ORDER BY x.kode_bbk)xx ON a.kode_bbk = xx.kode_bbk WHERE a.status='A' AND xx.jumlah > 0 AND c.kode_departemen='$kode_departemen'";
                                            }

                                            $TextQuery = $TextQuery . " ORDER BY a.kode_bbk ASC; ";
                                            $sql = $koneksi_master->query($TextQuery);
                                            while ($data = $sql->fetch_assoc()) {
                                                $status_bbk = '-';
                                                if ($data['status_bbk'] == 'A') {
                                                    $status_bbk = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_bbk'] == 'Y') {
                                                    $status_bbk = 'Sudah Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_bbk'] == 'X') {
                                                    $status_bbk = 'Ditolak' and $colortext = 'text-danger';
                                                } else {
                                                    $status_bbk = 'Hangus' and $colortext = 'text-dark';
                                                }

                                                $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_bbk) 'jumlah' FROM pb_transaksi.tb_bbk_detail WHERE status='A' AND status_bbk<>'A' AND kode_bbk='" . $data['kode_bbk'] . "'");
                                                $tampil_count_status = $sql_count_status->fetch_assoc();

                                                $sql_count = $koneksi_master->query("SELECT COUNT(kode_bbk) 'jumlah' FROM pb_transaksi.tb_bbk_detail WHERE status='A' AND kode_bbk='" . $data['kode_bbk'] . "'");
                                                $tampil_count = $sql_count->fetch_assoc();

                                                // $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk WHERE kode_bbk='$kode_bbk'");
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
                                                                <?php echo $data['kode_bbk']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_bbk'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['jabatan']; ?></td> -->
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                            <?php
                                                                if ($status_bbk == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_bbk == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else if ($status_bbk == 'Ditolak') {
                                                                    $warna_status = 'badge badge-danger';
                                                                } else {
                                                                    $warna_status = 'badge badge-dark';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_bbk; ?></span></h5>
                                                            </td></b>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <a href="?page=bbk&aksi=detail&kode_bbk=<?php echo $data['kode_bbk']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbk'] . $angka); ?>" class="btn btn-success" title="Data Detail"><i class="fas fa-eye"></i></a>

                                                                <?php if (($tampil_count_status['jumlah'] == 0) AND ($_SESSION['s_kode_user'] == $data['create_by'])) { ?>
                                                                    <a onclick="return confirm('Apakah anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=bbk&aksi=hapus&kode_bbk=<?php echo $data['kode_bbk']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbk'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php  } ?>

                                                            </td>

                                                        </tr><?php }  ?>
                                                    </tr><?php } else {
                                                            if (($tampil_count_status['jumlah'] == 0) or ($tampil_count_status['jumlah'] <> 0)) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> - <?php echo $data['kode_bbk']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_bbk'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['jabatan']; ?></td> -->
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                            <?php
                                                                if ($status_bbk == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_bbk == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_bbk; ?></span></h5>
                                                            </td></b>

                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <a href="?page=bbk&aksi=detail&kode_bbk=<?php echo $data['kode_bbk']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbk'] . $angka); ?>" class="btn btn-success" title="Lihat Detail Data"><i class="fa-regular fa-eye"></i></a>

                                                                <?php
                                                                if (($tampil_count_status['jumlah'] == 0) AND ($level == 'USER')) { ?>

                                                                    <!-- <a href="?page=bbk&aksi=ubah&kode_bbk=<?php echo $data['kode_bbk']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbk'] . $angka); ?>" class="btn btn-info" title="Edit Data"><i class="fas fa-pencil-alt"></i></a> -->

                                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=bbk&aksi=hapus&kode_bbk=<?php echo $data['kode_bbk']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_bbk'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php } ?>
                                                            </td>
                                                    <?php }
                                                        } ?>
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