<?php
$angka = date('Ymdhis');
// $level = $_SESSION['s_level'];

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

// $sql_count = $koneksi_master->query("SELECT x.kode_permintaan, COUNT(x.kode_permintaan) AS 'jumlah' FROM pb_transaksi.tb_permintaan_detail x WHERE x.status <> 'N' GROUP BY x.kode_permintaan ORDER BY x.kode_permintaan");

// $tampil_count = $sql_count->fetch_assoc();
// $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_permintaan");
// $tampil = $sql->fetch_assoc();

// echo $tampil['nik'];
// echo $nik_login;

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">DAFTAR PERMINTAAN BARANG</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($level == 'ADMIN') { ?>
                            <a href="?page=permintaan&aksi=history_permintaan" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-history"></i> History Permintaan</a>
                        <?php } ?>
                        <?php if ($level <> 'SUPERVISOR') { ?>
                            <a href="?page=permintaan&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <?php } ?>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Permintaan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Username</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Gudang</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Permintaan Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $TextQuery = "SELECT a.kode_permintaan, a.tanggal, c.nama, a.jabatan, b.nama_gudang, a.status_permintaan, a.nik FROM pb_transaksi.tb_permintaan a 
                                            INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang
                                            INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user WHERE a.status='A'";


                                            // "SELECT a.kode_permintaan, a.tanggal, c.nama, a.jabatan, b.nama_gudang, a.status_permintaan FROM pb_transaksi.tb_permintaan a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN (SELECT x.kode_permintaan, COUNT(x.kode_permintaan) AS 'jumlah' FROM pb_transaksi.tb_permintaan_detail x WHERE x.status <> 'N' GROUP BY x.kode_permintaan ORDER BY x.kode_permintaan)xx ON a.kode_permintaan = xx.kode_permintaan WHERE a.status='A' AND xx.jumlah > 0"

                                            if ($level == 'USER') {      /*untuk membatasi tampilan dilevel user. Dilevel user yang akan tampil tu data punya dia aja*/
                                                $TextQuery = $TextQuery . " AND a.nik='$nik_login' ";
                                            } else if ($level == 'SUPERVISOR') {      /*untuk membatasi tampilan dilevel supervisor. Dilevel supervisor yang akan tampil tu data permintaan punya departemen sisupervisornya aja*/
                                                $TextQuery = "SELECT a.kode_permintaan, a.tanggal, c.nama, a.jabatan, b.nama_gudang, a.status_permintaan FROM pb_transaksi.tb_permintaan a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN (SELECT x.kode_permintaan, COUNT(x.kode_permintaan) AS 'jumlah' FROM pb_transaksi.tb_permintaan_detail x WHERE x.status <> 'N' GROUP BY x.kode_permintaan ORDER BY x.kode_permintaan)xx ON a.kode_permintaan = xx.kode_permintaan WHERE a.status='A' AND xx.jumlah > 0 AND c.kode_departemen='$kode_departemen'";
                                            }

                                            $TextQuery = $TextQuery . " ORDER BY a.kode_permintaan ASC; ";
                                            $sql = $koneksi_master->query($TextQuery);
                                            while ($data = $sql->fetch_assoc()) {
                                                $status_permintaan = '-';
                                                if ($data['status_permintaan'] == 'A') {
                                                    $status_permintaan = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_permintaan'] == 'Y') {
                                                    $status_permintaan = 'Sudah Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_permintaan'] == 'X') {
                                                    $status_permintaan = 'Ditolak' and $colortext = 'text-danger';
                                                }

                                                $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan<>'A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                                $tampil_count_status = $sql_count_status->fetch_assoc();      /*untuk menghitung jumlah data permintaan berdasarkan status yang aktif aja(gk dihapus) dan status permintaannya yang sudah diberi tindakan, whether it's Y or N*/

                                                $sql_count = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                                                $tampil_count = $sql_count->fetch_assoc();


                                            ?>
                                                <?php

                                                if ($level == 'ADMIN') {          /*ini khusus si admin, jadi klo login sebagai admin, maka data permintaan yang ditampilkan tu CUMA  dan HANYA data yang belum berikan tindakan*/
                                                    if ($tampil_count_status['jumlah'] == 0) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?></td>
                                                            <td style="text-align:center; font-weight: bold; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> -
                                                                <?php echo $data['kode_permintaan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['jabatan']; ?></td> -->
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                            <?php
                                                                if ($status_permintaan == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_permintaan == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_permintaan; ?></span></h5>
                                                            </td></b>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <a href="?page=permintaan&aksi=detail&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>

                                                                <?php if (($tampil_count_status['jumlah'] == 0) and ($_SESSION['s_nik'] == $data['nik'])) { ?>
                                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=permintaan&aksi=hapus&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php  } ?>

                                                            </td>

                                                        </tr><?php }  ?>
                                                    </tr><?php } else {         /*untuk menampilkan semua data permintaan, dimana selain admin tu nah mil (user dan supervisor) akan menampilkan data permintaan dengan jumlah statusnya tu sama dengan 0 ataupun yang gk sama dengan 0. jadi semuaan data tu pang yang diambil mil ae, OK? */
                                                            if (($tampil_count_status['jumlah'] == 0) or ($tampil_count_status['jumlah'] <> 0)) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> - <?php echo $data['kode_permintaan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?></td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['jabatan']; ?></td> -->
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                            <?php
                                                                if ($status_permintaan == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_permintaan == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_permintaan; ?></span></h5>
                                                            </td>


                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <a href="?page=permintaan&aksi=detail&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-success" title="Lihat Detail Data"><i class="fa-regular fa-eye"></i></a>


                                                                <?php
                                                                if ($tampil_count_status['jumlah'] == 0) { ?>

                                                                    <?php if (($level <> 'SUPERVISOR')) { ?>
                                                                        <a href="?page=permintaan&aksi=ubah&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-info" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>

                                                                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=permintaan&aksi=hapus&kode_permintaan=<?php echo $data['kode_permintaan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_permintaan'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                    <?php } ?>
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