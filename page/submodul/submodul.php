<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Submodul</h4>
                    </div>
                    <div class="card-body">


                        <a href="?page=submodul&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i
                                class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Kode
                                                    Sub-Modul</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Modul
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Nama
                                                    Sub-Modul</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Jenis
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Link
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Status
                                                </th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                                $kode_submodul = 1;

                                                $sql = $koneksi_master->query("SELECT * FROM pb_role.tb_submodul a inner join pb_role.tb_modul b on a.kode_modul=b.kode_modul  where a.status='A' ORDER BY kode_submodul asc");
                                                while ($data = $sql->fetch_assoc()) {

                                                ?>
                                            <tr>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $kode_submodul++; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['kode_submodul']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['nama_modul']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['nama_submodul']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['jenis']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['link']; ?></td>
                                                <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['status']; ?></td>





                                                <td style="text-align:center; vertical-align:middle;">
                                                    <a href="?page=submodul&aksi=ubah&kode_submodul=<?php echo $data['kode_submodul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_submodul'] . $angka); ?>"
                                                        class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                    <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')"
                                                        href="?page=submodul&aksi=hapus&kode_submodul=<?php echo $data['kode_submodul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_submodul'] . $angka); ?>"
                                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                                </td>
                                            </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
</section>