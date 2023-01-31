<?
include '..\..\koneksi.php';
error_reporting('E_ALL|E_WARNING');
ob_start(); ?>
<?php
if (isset($_POST['filter'])) {
    // untuk menjalankan yg ingin difilter

    $dari_tgl = $_POST['dari_tgl'];
    $sampai_tgl = $_POST['sampai_tgl'];
    $kode_gudangstok = $_POST['kode_gudangstok'];
    $kode_barang = $_GET['kode_barang'];

?>

    <style>
        th,
        td {
            white-space: nowrap;
        }

        div.dataTables_wrapper {
            /* width: 800px; */
            margin: 0 auto;

        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Laporan Stok Barang</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" target="_blank" action="page/laporan/laporan_stok.php">

                                <a href="?page=laporan&aksi=stok" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>

                                <input type="submit" class="btn btn-danger" name="cetak" value="Cetak Pdf">

                                <input type="submit" class="btn btn-success" name="cetak" value="Cetak Excel">

                                <input type="text" value="<?php echo $dari_tgl; ?>" name="dari_tgl" hidden>
                                <input type="text" value="<?php echo $sampai_tgl; ?>" name="sampai_tgl" hidden>
                                <input type="text" value="<?php echo $kode_gudangstok; ?>" name="kode_gudangstok" hidden>
                            </form>
                            <br>
                            <div class="table-responsive">
                                <table id="zero_config">
                                    <table class="table table-striped table-bordered datatable-select-inputs">
                                        <thead>
                                            <tr style="width: 100%;margin: auto;border-collapse: collapse; text-align: center;">
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 50px;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Tanggal</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Kode</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Gudang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Pemohon</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jabatan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jenis Modul</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">Nama Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Awal</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Masuk</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Keluar</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok AKhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            //                                 select * from (select a.tgl,a.kdregu,a.nik, c.nik_atasan1, e.nama 'atasan1', c.nik_atasan2, f.nama 'atasan2',a.kodejamkerja,b.nama_regu,c.nama, d.nmjam_kerja, a.jam_masuk, a.real_masuk, a.status_masuk, a.jam_pulang, a.real_pulang, a.status_pulang, a.jam_breafing, a.real_breafing, a.status_breafing, a.shift from db_transaksi.tb_cek_kehadiran a 
                                            //   join db_master.tb_regu b on a.kdregu=b.kdregu 
                                            //   join db_master.tb_karyawan c on a.nik=c.nik 
                                            //   join db_master.tb_jam_kerja d on a.kodejamkerja=d.kodejamkerja 
                                            //   join db_master.tb_karyawan e on c.nik_atasan1=e.nik
                                            //   join db_master.tb_karyawan f on c.nik_atasan2=f.nik
                                            //   where date_format(a.tgl,'%Y-%m')='$dari_tgl' and a.kodejamkerja<>'OFF' union all
                                            //   select a.tgl, a.kdregu,a.nik, c.nik_atasan1, e.nama 'atasan1', c.nik_atasan2, f.nama 'atasan2', a.kodejamkerja,b.nama_regu,c.nama, 'OFF KERJA', a.jam_masuk, a.real_masuk, a.status_masuk, a.jam_pulang, a.real_pulang, a.status_pulang, a.jam_breafing, a.real_breafing, a.status_breafing, a.shift 
                                            //   from db_transaksi.tb_cek_kehadiran a 
                                            //   join db_master.tb_regu b on a.kdregu=b.kdregu 
                                            //   join db_master.tb_karyawan c on a.nik=c.nik   
                                            //   join db_master.tb_karyawan e on c.nik_atasan1=e.nik
                                            //   join db_master.tb_karyawan f on c.nik_atasan2=f.nik
                                            //   where date_format(a.tgl,'%Y-%m')='$dari_tgl' and a.kodejamkerja='OFF') x where (x.nik='$nik' or x.nik_atasan1='$nik' or x.nik_atasan2='$nik') order by x.nama_regu, x.nik, x.nik_atasan1, x.nik_atasan2   and a.tgl between '$dari_tgl' and '$sampai_tgl'

                                            $sqltext = "SELECT a.pemohon, a.tgl_create, a.kode_gudang, a.kode, a.create_by, a.nama_barang, a.jenis_modul, b.nama_gudang, a.stok_awal, a.stok_masuk, a.stok_keluar, a.stok_akhir,
                                             e.nama_departemen, f.nama_subdepartemen, g.jabatan
                                             
                                              FROM pb_transaksi.tb_history_stok a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang 

                                              INNER JOIN pb_master.tb_karyawan c ON a.pemohon=c.nama_karyawan 

                                            INNER JOIN pb_master.tb_departemen_karyawan e ON e.kode_departemen=c.kode_departemen 
                                            INNER JOIN pb_master.tb_subdepartemen_karyawan f ON f.kode_subdepartemen=c.kode_subdepartemen 
                                            INNER JOIN pb_master.tb_jabatan_karyawan g ON g.kode_jabatan=c.kode_jabatan

                                            WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' AND a.status='A' AND b.status='A' ORDER BY  a.tgl_create ASC";

                                            // $sqltext = "SELECT a.pemohon, a.tgl_create, a.kode_gudang, a.kode, a.create_by, a.nama_barang, a.jenis_modul, b.nama_gudang, a.stok_awal, a.stok_masuk, a.stok_keluar, a.stok_akhir, c.kode_po, g.jabatan, e.nama_departemen, f.nama_subdepartemen FROM pb_transaksi.tb_history_stok a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang INNER JOIN pb_transaksi.tb_po c ON a.kode=c.kode_po INNER JOIN pb_master.tb_karyawan d ON c.nik=d.nik INNER JOIN pb_master.tb_departemen_karyawan e ON e.kode_departemen=d.kode_departemen INNER JOIN pb_master.tb_subdepartemen_karyawan f ON f.kode_subdepartemen=d.kode_subdepartemen INNER JOIN pb_master.tb_jabatan_karyawan g ON g.kode_jabatan=d.kode_jabatan
                                            // WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' AND a.status='A' AND b.status='A' AND c.status='A' AND d.status='A' AND f.status='A' AND g.status='A' ORDER BY  a.tgl_create ASC";
                                            $sql = $koneksi_master->query($sqltext);
                                            // echo $sqltext. '<br>';


                                            while ($data = $sql->fetch_assoc()) {
                                    

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"> <?php echo strftime("%d %B %Y", strtotime($data['tgl_create'])); ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_gudang']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['jabatan']; ?> <?php echo $data['nama_departemen']; ?> <?php echo $data['nama_subdepartemen']; ?></td>

                                                    <!-- <?php if ($jenis_modul == 'BBK') { ?>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen['jabatan']; ?> <?php echo $data_cari_departemen['nama_departemen']; ?> <?php echo $data_cari_departemen['nama_subdepartemen']; ?></td>
        <?php } elseif ($jenis_modul == 'BBM') { ?>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_po['jabatan']; ?> <?php echo $data_cari_departemen_po['nama_departemen']; ?> <?php echo $data_cari_departemen_po['nama_subdepartemen']; ?></td>
        <?php } elseif ($jenis_modul == 'ADJ IN') { ?>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['username']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['jabatan']; ?> <?php echo $data_cari_departemen_adj['nama_departemen']; ?> <?php echo $data_cari_departemen_adj['nama_subdepartemen']; ?></td>
        <?php } else { ?>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['username']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['jabatan']; ?> <?php echo $data_cari_departemen_adj['nama_departemen']; ?> <?php echo $data_cari_departemen_adj['nama_subdepartemen']; ?></td>
        <?php } ?> -->

                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['jenis_modul']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_barang']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_awal']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_masuk']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_keluar']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_akhir']; ?></td>

                                                </tr>


                                            <?php }  ?>

                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Kode Jam Kerja</th>
                                                <th>Kode Regu</th>
                                                <th>Kode Regu</th>
                                                <th>NO</th>
                                                <th>Kode Jam Kerja</th>
                                                <th>Kode Regu</th>
                                                <th>Kode Jam Kerja</th>
                                                <th>Kode Regu</th>
                                                <th>NO</th>
                                                <th>NO</th>
                                                <th>Kode Jam Kerja</th>
                                                <th>Kode Regu</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<?php } ?>

<!-- <?php
if ($_POST['cetak'] == 'Cetak Pdf') {
?><script type="text/javascript">
        window.print()
    </script>

<?php
} else
if ($_POST['cetak'] == 'Cetak Excel') {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename='LaporanStok'.xls");
}

?> -->