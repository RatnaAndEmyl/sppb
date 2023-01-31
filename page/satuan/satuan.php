<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar satuan</h4>
                    </div>
                    <div class="card-body">


                        <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>

                        <a href="?page=satuan&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Satuan</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_satuan WHERE STATUS='A'");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_satuan']; ?><br>
                                                        <b><?php echo $data['nama_satuan']; ?></b></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=satuan&aksi=ubah&kode_satuan=<?php echo $data['kode_satuan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_satuan'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=satuan&aksi=hapus&kode_satuan=<?php echo $data['kode_satuan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_satuan'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tfoot> 
                                    </table>
                        </div>
                    </div>
</section>