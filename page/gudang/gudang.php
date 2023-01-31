<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Gudang</h4>
                    </div>
                    <div class="card-body">


                        <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>
                        <a href="?page=gudang&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama Gudang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Alamat Gudang</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A'");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_gudang']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_gudang']; ?><br>
                                                        <b><?php echo $data['nama_gudang']; ?></b>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['alamat_gudang']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=gudang&aksi=ubah&kode_gudang=<?php echo $data['kode_gudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_gudang'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=gudang&aksi=hapus&kode_gudang=<?php echo $data['kode_gudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_gudang'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td></td> -->
                                        </tfoot>
                                    </table>
                        </div>
                    </div>
</section>