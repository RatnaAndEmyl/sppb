<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];
// echo $kode_sppb;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_sppb . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php

}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb WHERE kode_sppb='$kode_sppb'");
$tampil = $sql->fetch_assoc();

$sql_count_status = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb='A' AND kode_sppb='$kode_sppb'");
$tampil_count_status = $sql_count_status->fetch_assoc();


$sql_count_barang = $koneksi_master->query("SELECT COUNT(kode_barang) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb<>'A' AND kode_sppb='$kode_sppb'");
$tampil_count_barang = $sql_count_barang->fetch_assoc();


$sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE status='A' AND status_sppb<>'A' AND kode_sppb='$kode_sppb'");
$tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();
// echo $tampil_count_status_selain_a['jumlah'];

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            DAFTAR PERMINTAAN PEMBELIAN BARANG
                            <?php echo $tampil['username']; ?> <br>
                            <?php echo $tampil['kode_sppb']; ?> (<?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($tampil['tanggal_sppb']))); ?>)

                            <!-- <?php echo $_SESSION['s_nik']; ?> -->
                            <!-- <?php echo $tampil['nik']; ?> -->
                            <!-- <?php echo $nik_login; ?> -->

                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- ini nah salah -->
                        <?php
                        if (($tampil['status_sppb'] == 'A') and ($tampil_count_status['jumlah'] == 0) and ($tampil_count_barang['jumlah'] <> 0)) { ?>
                            <a href="?page=sppb&aksi=simpan_proses&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>
                        <?php } elseif (($tampil['status_sppb'] == 'Y') OR ($tampil['status_sppb'] == 'X')) { ?>
                            <a href="?page=sppb" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fa fa-undo"></i></i> Kembali</a>
                        <?php } else {
                        ?>
                            <a href="?page=sppb" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i></i> Simpan</a>
                        <?php
                        } ?>


                        <?php
                        if ($level <> 'SUPERVISOR') {
                            if (($tampil_count_status_selain_a['jumlah'] == 0) and ($_SESSION['s_nik'] == $tampil['nik'])) { ?>
                                <a href="?page=sppb&aksi=tambah_sppb&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Barang</a>
                            <?php } ?>
                        <?php } ?>

                        <!-- <a href="?page=sppb&aksi=cetak_laporan_sppb&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fas fa fa-print"></i> Cetak</a> -->

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jumlah Permintaan Pembelian</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Spesifikasi Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Status Permintaan Pembelian Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb_detail a INNER JOIN pb_master.tb_barang b ON a.kode_barang=b.id_barang INNER JOIN pb_master.tb_satuan c ON b.kode_satuan=c.kode_satuan WHERE a.STATUS='A' AND a.kode_sppb='$kode_sppb' ORDER BY a.kode_sppb asc");
                                            while ($data = $sql->fetch_assoc()) {

                                                $status_sppb = '-';
                                                if ($data['status_sppb'] == 'A') {
                                                    $status_sppb = 'Perlu Persetujuan' and $colortext = 'text-orange';
                                                } elseif ($data['status_sppb'] == 'Y') {
                                                    $status_sppb = 'Disetujui' and $colortext = 'text-success';
                                                } elseif ($data['status_sppb'] == 'N') {
                                                    $status_sppb = 'Ditolak' and $colortext = 'text-danger';
                                                }

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <!-- <?php echo $data['kode_barang']; ?> <br>  -->
                                                        <?php echo $data['nama_barang']; ?>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['jumlah_permintaan']; ?> <?php echo $data['nama_satuan']; ?> </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['keterangan_barang']; ?> 
                                                    </td>
                                                    <td class=<?php echo $colortext ?> style="text-align:center; vertical-align:middle;">
                                                    <?php if ($status_sppb == 'Perlu Persetujuan') {
                                                            $warna_status = 'badge badge-warning';
                                                        } else if ($status_sppb == 'Disetujui') {
                                                            $warna_status = 'badge badge-success';
                                                        } else {
                                                            $warna_status = 'badge badge-danger';
                                                        } ?>
                                                        <h5><span class="<?php echo $warna_status; ?>"><?php echo $status_sppb; ?></span></h5>
                                                    </td></b>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php

                                                        if ($data['status_sppb'] == 'A') { ?>
                                                            <?php if ($level == 'SUPERVISOR') { ?>
                                                                <a href="?page=sppb&aksi=proses_sppb&kode_sppb=<?php echo $data['kode_sppb']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-success btn-md" style="margin-bottom: 5px; "><i class="fas fa-check-circle"></i> Disetujui</a>

                                                                <a href="?page=sppb&tidak_disetujui&aksi=proses_sppb&kode_sppb=<?php echo $data['kode_sppb']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fa fa-times-circle" aria-hidden="true"></i> Ditolak</a>

                                                                <?php } else {
                                                                if (($tampil_count_status_selain_a['jumlah'] == 0) and ($level == 'USER') or ($level == 'ADMIN')) { ?>
                                                                    <?php if ($_SESSION['s_nik'] == $tampil['nik']) { ?>
                                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=sppb&aksi=hapus_barang&kode_sppb=<?php echo $data['kode_sppb']; ?>&kode_barang=<?php echo $data['kode_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_sppb'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true" title="Hapus Data"></i></a>
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