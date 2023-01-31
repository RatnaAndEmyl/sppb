<?php
$angka = date('Ymdhis');
// $level = $_SESSION['s_level'];

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

// $sql_count = $koneksi_master->query("SELECT x.kode_po, COUNT(x.kode_po) AS 'jumlah' FROM pb_transaksi.tb_po_detail x WHERE x.status <> 'N' GROUP BY x.kode_po ORDER BY x.kode_po");

// $tampil_count = $sql_count->fetch_assoc();
// $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_po");
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
                        <h4 class="card-title">DAFTAR PURCHASE ORDER</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=home" class="btn btn-secondary" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>
                        <?php
                        if ($level == 'ADMIN') { ?>
                            <a href="?page=po&aksi=history_po" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-history"></i> History Purchase Order</a>
                        <?php } ?>
                        <?php if ($level == 'ADMIN') { ?>
                            <a href="?page=po&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <?php } ?>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Pemesanan Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Suplier</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Gudang</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Pemesanan Barang</th>

                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $TextQuery = "SELECT a.kode_po, a.tanggal_po, c.nama, a.jabatan, b.nama_gudang, a.status_po, a.nik, d.nama_suplier FROM pb_transaksi.tb_po a 
                                            INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang
                                            INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN pb_master.tb_suplier d ON a.kode_suplier=d.kode_suplier WHERE a.status='A' AND b.status='A' AND c.status='A' AND d.status='A'";


                                            // "SELECT a.kode_po, a.tanggal_po, c.nama, a.jabatan, b.nama_gudang, a.status_po FROM pb_transaksi.tb_po a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN (SELECT x.kode_po, COUNT(x.kode_po) AS 'jumlah' FROM pb_transaksi.tb_po_detail x WHERE x.status <> 'N' GROUP BY x.kode_po ORDER BY x.kode_po)xx ON a.kode_po = xx.kode_po WHERE a.status='A' AND xx.jumlah > 0"

                                            if ($level == 'USER') {      /*untuk membatasi tampilan dilevel user. Dilevel user yang akan tampil tu data punya dia aja*/
                                                $TextQuery = $TextQuery . " AND a.nik='$nik_login' ";
                                            } else if ($level == 'SUPERVISOR') {      /*untuk membatasi tampilan dilevel supervisor. Dilevel supervisor yang akan tampil tu data po punya departemen sisupervisornya aja*/
                                                $TextQuery = "SELECT a.kode_po, a.tanggal_po, c.nama, a.jabatan, b.nama_gudang, a.status_po, a.nik, d.nama_suplier FROM pb_transaksi.tb_po a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_role.tb_user c ON a.kode_user=c.kode_user INNER JOIN pb_master.tb_suplier d ON a.kode_suplier=d.kode_suplier INNER JOIN (SELECT x.kode_po, COUNT(x.kode_po) AS 'jumlah' FROM pb_transaksi.tb_po_detail x WHERE x.status <> 'N' GROUP BY x.kode_po ORDER BY x.kode_po)xx ON a.kode_po = xx.kode_po WHERE a.status='A' AND b.status='A' AND c.status='A' AND d.status='A' AND xx.jumlah > 0 AND c.kode_departemen='$kode_departemen'";
                                            }

                                            $TextQuery = $TextQuery . " ORDER BY a.kode_po ASC; ";
                                            $sql = $koneksi_master->query($TextQuery);
                                            while ($data = $sql->fetch_assoc()) {
                                                $status_po = '-';
                                                if ($data['status_po'] == 'A') {
                                                    $status_po = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_po'] == 'Y') {
                                                    $status_po = 'Sudah Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_po'] == 'X') {
                                                    $status_po = 'Ditolak' and $colortext = 'text-danger';
                                                }



                                                $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_po) 'jumlah' FROM pb_transaksi.tb_po_detail WHERE status='A' AND status_po<>'A' AND kode_po='" . $data['kode_po'] . "'");
                                                $tampil_count_status = $sql_count_status->fetch_assoc();      /*untuk menghitung jumlah data po berdasarkan status yang aktif aja(gk dihapus) dan status ponya yang sudah diberi tindakan, whether it's Y or N*/

                                                $sql_count = $koneksi_master->query("SELECT COUNT(kode_po) 'jumlah' FROM pb_transaksi.tb_po_detail WHERE status='A' AND kode_po='" . $data['kode_po'] . "'");
                                                $tampil_count = $sql_count->fetch_assoc();


                                            ?>
                                                <?php

                                                if ($level == 'ADMIN') {          /*ini khusus si admin, jadi klo login sebagai admin, maka data po yang ditampilkan tu CUMA  dan HANYA data yang belum berikan tindakan*/
                                                    if ($tampil_count_status['jumlah'] == 0) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?>
                                                            </td>
                                                            <td style="text-align:center; font-weight: bold; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> -
                                                                <?php echo $data['kode_po']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_po'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_suplier']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?>
                                                            </td>
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                                <?php
                                                                if ($status_po == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_po == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_po; ?></span></h5>
                                                            </td>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <a href="?page=po&aksi=detail&kode_po=<?php echo $data['kode_po']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_po'] . $angka); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>

                                                                <?php if (($tampil_count_status['jumlah'] == 0) and ($_SESSION['s_nik'] == $data['nik'])) { ?>
                                                                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=po&aksi=hapus&kode_po=<?php echo $data['kode_po']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_po'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

                                                                <?php  } ?>

                                                            </td>

                                                        </tr><?php }  ?>
                                                    </tr><?php } else {         /*untuk menampilkan semua data po, dimana selain admin tu nah mil (user dan supervisor) akan menampilkan data po dengan jumlah statusnya tu sama dengan 0 ataupun yang gk sama dengan 0. jadi semuaan data tu pang yang diambil mil ae, OK? */
                                                            if (($tampil_count_status['jumlah'] == 0) or ($tampil_count_status['jumlah'] <> 0)) { ?>
                                                        <tr>

                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $no++; ?>
                                                            </td>
                                                            <td style="text-align:center; font-weight: bold; vertical-align:middle;">
                                                                <?php echo $tampil_count['jumlah']; ?> -
                                                                <?php echo $data['kode_po']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo strftime("%d %B %Y", strtotime($data['tanggal_po'])); ?></td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama']; ?> <br>
                                                                <?php echo $data['jabatan']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_suplier']; ?>
                                                            </td>
                                                            <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['nama_gudang']; ?>
                                                            </td>
                                                            <!-- <td style="text-align:center; vertical-align:middle;">
                                                                <?php echo $data['jabatan']; ?>
                                                            </td> -->
                                                            <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                                <?php
                                                                if ($status_po == 'Perlu Persetujuan') {
                                                                    $warna_status = 'badge badge-warning';
                                                                } else if ($status_po == 'Sudah Disetujui') {
                                                                    $warna_status = 'badge badge-success';
                                                                } else {
                                                                    $warna_status = 'badge badge-danger';
                                                                } ?>
                                                                <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_po; ?></span></h5>
                                                            </td>

                                                            <td style="text-align:center; vertical-align:middle;">

                                                                <a href="?page=po&aksi=detail&kode_po=<?php echo $data['kode_po']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_po'] . $angka); ?>" class="btn btn-success" title="Lihat Detail Data"><i class="fa-regular fa-eye"></i></a>


                                                                <?php
                                                                if ($tampil_count_status['jumlah'] == 0) { ?>

                                                                    <?php if (($level <> 'SUPERVISOR')) { ?>
                                                                        <a href="?page=po&aksi=ubah&kode_po=<?php echo $data['kode_po']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_po'] . $angka); ?>" class="btn btn-info" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>

                                                                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ke- <?php echo $tampil_count['jumlah']; ?> Barang Ini?')" href="?page=po&aksi=hapus&kode_po=<?php echo $data['kode_po']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_po'] . $angka); ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash"></i></a>

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