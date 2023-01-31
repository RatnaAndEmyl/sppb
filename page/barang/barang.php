<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body">

                        <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>

                        <?php if ($level == 'ADMIN') { ?>
                            <a href="?page=home&aksi=home_history_stok" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-history"></i> History Stok</a>
                        <?php } ?>

                        <a href="?page=barang&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Jenis Barang</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Harga Barang</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Detail</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Stok Barang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_barang a 
                                            INNER JOIN pb_master.tb_jenis_barang b ON a.id_jenis_barang=b.id_jenis_barang INNER JOIN pb_master.tb_satuan c ON a.kode_satuan=c.kode_satuan WHERE a.STATUS='A'");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['id_barang']; ?><br>
                                                        <b><?php echo $data['nama_barang']; ?></b>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nama_jenis_barang']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['detail']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <b><?php echo $data['onhandstok']; ?> <?php echo $data['nama_satuan']; ?></b></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=barang&aksi=ubah&id_barang=<?php echo $data['id_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['id_barang'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=barang&aksi=hapus&id_barang=<?php echo $data['id_barang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['id_barang'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

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
                                        </tfoot>
                                    </table>
                        </div>
                    </div>
</section>