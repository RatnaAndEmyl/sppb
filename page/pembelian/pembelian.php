<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pembelian</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=pembelian&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i>Tambah Data Pembelian</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Kode Pembelian</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Pembelian</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Departemen</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Subdepartemen</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Info</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jenis Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jumlah Pembelian</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Harga Satuan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Total Harga</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama Suplier</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pembelian 
                                            INNER JOIN pb_master.tb_barang ON pb_transaksi.tb_pembelian.id_barang = pb_master.tb_barang.id_barang 
                                            INNER JOIN pb_master.tb_jenis_barang ON pb_transaksi.tb_pembelian.id_jenis_barang = pb_master.tb_jenis_barang.id_jenis_barang 
                                            INNER JOIN pb_master.tb_suplier ON pb_transaksi.tb_pembelian.kode_suplier = pb_master.tb_suplier.kode_suplier 
                                            -- INNER JOIN pb_role.tb_user ON pb_transaksi.tb_pembelian.kode_user = pb_role.tb_user.kode_user 
                                            -- INNER JOIN pb_master.tb_jabatan ON pb_transaksi.tb_pembelian.kode_jabatan = pb_master.tb_jabatan.kode_jabatan 
                                            
                                            WHERE pb_transaksi.tb_pembelian.status='A' ORDER BY kode_pembelian asc");
                                            while ($data = $sql->fetch_assoc()) {

                                                $sqlnik = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan a 
                                                INNER JOIN pb_master.tb_departemen b ON a.kode_departemen=b.kode_departemen 
                                                INNER JOIN pb_master.tb_jabatan c ON a.kode_jabatan=c.kode_jabatan 
                                                INNER JOIN pb_master.tb_subdepartemen d ON a.kode_subdepartemen=d.kode_subdepartemen 
                                                WHERE a.status='A' AND a.nik='$data[nik]'");
                                                $datanik = $sqlnik->fetch_assoc();

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_pembelian']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['user']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['tanggal']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $datanik['jabatan']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $datanik['nama_departemen']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $datanik['nama_subdepartemen']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nama_jenis_barang']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nama_barang']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['jumlah_pembelian']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['harga_satuan']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['total_harga']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nama_suplier']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=pembelian&aksi=ubah&kode_pembelian=<?php echo $data['kode_pembelian']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_pembelian'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=pembelian&aksi=hapus&kode_pembelian=<?php echo $data['kode_pembelian']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_pembelian'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


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
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tfoot>
                                    </table>
                        </div>
                    </div>
</section>