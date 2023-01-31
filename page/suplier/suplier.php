<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Suplier</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>

                        <a href="?page=suplier&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">Kode</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Nama Suplier
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No. HP
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier where status='A'");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_suplier']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_suplier']; ?><br>
                                                        <b><?php echo $data['nama_suplier']; ?></b>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['no_hp_suplier']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=suplier&aksi=ubah&kode_suplier=<?php echo $data['kode_suplier']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_suplier'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=suplier&aksi=hapus&kode_suplier=<?php echo $data['kode_suplier']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_suplier'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


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