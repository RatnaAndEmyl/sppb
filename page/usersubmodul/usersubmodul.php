<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">NO</th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Kode User</th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Nama User</th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Username</th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Sub-Departemen
                                        </th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Tanggal Daftar
                                        </th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">Level</th>
                                        <th scope="col" style="text-align:center; vertical-align:middle;">AKSI</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kode_user = 1;

                                    $sql = $koneksi_master->query("SELECT * FROM pb_role.tb_user where status='A' ORDER BY level, kode_user asc ");
                                    while ($data = $sql->fetch_assoc()) {

                                    ?>
                                    <tr>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $kode_user++; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['kode_user']; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['nama']; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['username']; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['kode_subdepartemen']; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['tgl_daftar']; ?></td>
                                        <td style="text-align:center; vertical-align:middle;">
                                            <?php echo $data['level']; ?></td>



                                        <td style="text-align:center; vertical-align:middle;">
                                            <a href="?page=usersubmodul&aksi=detail&kode_user=<?php echo $data['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_user'] . $angka); ?>"
                                                class="btn btn-success"><i class="fas fa-plus"></i></a>

                                        </td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama karyawan</th>
                                        <th></th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>